<?php

use App\Features\GenerateKeyPair;
use Illuminate\Support\Facades\Storage;


it('generates a key pair', function () {
    $generateKeyPair = resolve(GenerateKeyPair::class);
    $generateKeyPair();

    assertTrue(Storage::exists('private.key'));
});
