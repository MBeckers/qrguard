<?php

use App\Features\GenerateSignedUrl;
use App\Features\ValidatedSignedUrl;

it('generates a signed url', function () {
    $url = 'https://qr.foundation';
    $generateSignedUrl = resolve(GenerateSignedUrl::class);

    $signedUrl = $generateSignedUrl($url);

    expect($url != $signedUrl)->toBe(true);

    expect(resolve(ValidatedSignedUrl::class)($signedUrl))->toBe(true);
});
