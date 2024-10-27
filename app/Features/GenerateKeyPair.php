<?php

namespace App\Features;

use Exception;
use Illuminate\Support\Facades\Storage;

class GenerateKeyPair
{
    public function __invoke(): void
    {
        if (Storage::exists('private.key')) {
            throw new Exception('Keys already created');
        }

        $privateKeyResource = openssl_pkey_new([
            "curve_name" => "prime256v1",
            'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_EC,
        ]);

        // Extract the private key from the key pair
        openssl_pkey_export($privateKeyResource, $privateKey);

        // Extract the public key from the key pair
        $keyDetails = openssl_pkey_get_details($privateKeyResource);
        $publicKey = $keyDetails['key'];

        Storage::put('private.key', $privateKey);
        Storage::put('public.key', $publicKey);
    }
}
