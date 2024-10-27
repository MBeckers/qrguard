<?php

use App\Features\GenerateSignedUrl;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertTrue;

it('generates a signed url', function () {
    $url = 'https://qr.foundation';
    $generateSignedUrl = resolve(GenerateSignedUrl::class);

    $signedUrl = $generateSignedUrl($url);
    $publicKey = Storage::get('public.key');

    $queryString = parse_url($signedUrl, PHP_URL_QUERY);
    $receivedSignature = rawurldecode(Str::before(Str::after($queryString, 'signature='), '&'));

    expect($url != $signedUrl)->toBe(true);

    expect(openssl_verify(
        Str::before($signedUrl, '?'),
        base64_decode($receivedSignature),
        $publicKey,
        OPENSSL_ALGO_SHA256
    ))->toBe(1);
});
