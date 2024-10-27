<?php

namespace App\Livewire;

use App\Features\ValidatedSignedUrl;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use const OPENSSL_ALGO_SHA256;

class QrScannerComponent extends Component
{
    public string $qrCodeUrl = '';
    public string $qrCountry = '';
    public string $qrCompany = '';
    public bool $isValid = false;

    #[On('processQrCode')]
    public function processQrCode($url)
    {
        $this->qrCodeUrl = $url;
        $parsedUrl = parse_url($url, PHP_URL_QUERY);
        parse_str($parsedUrl, $params);
        $this->qrCountry = Arr::get($params, 'qrCountry', '');
        $this->qrCompany = Arr::get($params, 'qrCompany', '');

        $this->isValid = resolve(ValidatedSignedUrl::class)($url);
    }

    public function render()
    {
        return view('livewire.qr-scanner-component');
    }
}
