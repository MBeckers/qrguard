<?php

namespace App\Livewire;

use App\Features\ValidatedSignedUrl;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use const OPENSSL_ALGO_SHA256;
use const PHP_URL_HOST;
use const PHP_URL_PATH;
use const PHP_URL_QUERY;
use const PHP_URL_SCHEME;

class QrScannerComponent extends Component
{
    public string $qrCodeUrl = '';
    public string $qrCountry = '';
    public string $qrCompany = '';
    public string $baseDomain = '';
    public bool $isValid = false;

    #[On('processQrCode')]
    public function processQrCode($url)
    {
        $url = Str::startsWith($url, 'http') ? $url : 'https://' . $url;
        $this->qrCodeUrl = $this->extractUrl($url);

        $parsedUrl = parse_url($url, PHP_URL_QUERY);
        parse_str($parsedUrl, $params);

        $this->qrCountry = Arr::get($params, 'qrCountry', '');
        $this->qrCompany = Arr::get($params, 'qrCompany', '');
        $this->baseDomain = parse_url($url, PHP_URL_HOST);

        $this->isValid = resolve(ValidatedSignedUrl::class)($url);
    }

    public function clear()
    {
        $this->qrCodeUrl = '';
        $this->qrCountry = '';
        $this->qrCompany = '';
        $this->baseDomain = '';
    }

    protected function extractUrl(string $url): string
    {
        $parsedUrl = parse_url($url, PHP_URL_QUERY);
        parse_str($parsedUrl, $params);
        Arr::forget($params, ['qrCountry', 'qrCompany', 'signature']);

        $params = empty($params) ? '' : '?'. http_build_query($params);

        $schema = parse_url($url, PHP_URL_SCHEME) ? parse_url($url, PHP_URL_SCHEME) . '://' : '//';

        return $schema
            . parse_url($url, PHP_URL_HOST)
            . parse_url($url, PHP_URL_PATH)
            . $params;
    }

    public function render()
    {
        return view('livewire.qr-scanner-component');
    }
}
