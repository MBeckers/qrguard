<?php

namespace App\Features;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class GenerateSignedUrl
{
    public function __invoke(string $url, array $params = []): string
    {
        $privateKey = $this->getPrivateKey();

        $params = URL::formatParameters($params);
        if (!empty($params)) {
            $url = $url . (Str::contains($url, '?') ? '&' : '?') . http_build_query($params);
        }

        openssl_sign($url, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $encodedSignature = base64_encode($signature);

        $params = URL::formatParameters(['signature' => $encodedSignature]);

        return $url
            . (Str::contains($url, '?') ? '&' : '?')
            . http_build_query($params);
    }

    protected function getPrivateKey(): string
    {
        if ($privateKey = Storage::get('private.key')) {
            return $privateKey;
        }
        resolve(GenerateKeyPair::class)();

        return Storage::get('private.key');
    }

}
