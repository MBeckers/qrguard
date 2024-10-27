<?php

namespace App\Features;

use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use const OPENSSL_ALGO_SHA256;
use const PHP_URL_QUERY;

class ValidatedSignedUrl
{
    public function __invoke(string $url): bool
    {
        $parsedUrl = parse_url($url, PHP_URL_QUERY);
        parse_str($parsedUrl, $params);
        $signature = rawurldecode(Arr::get($params, 'signature', ''));

        return $signature ? openssl_verify(
            Str::contains($url, '&signature') ? Str::before($url, '&signature') : Str::before($url, '?signature'),
            base64_decode($signature),
            Storage::get('public.key'),
            OPENSSL_ALGO_SHA256
        ) : false;
    }
}
