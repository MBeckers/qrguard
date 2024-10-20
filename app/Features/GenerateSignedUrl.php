<?php

namespace App\Features;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use const OPENSSL_ALGO_MD2;

class GenerateSignedUrl
{
    public function __invoke(string $url, array $params = []): string
    {
        $privateKey = Storage::get('private.key');

        openssl_sign($url, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $encodedSignature = base64_encode($signature);

        $params = URL::formatParameters(array_merge($params, [
            'signature' => $encodedSignature
        ]));

        return $url . '&' . http_build_query($params);
    }
}
