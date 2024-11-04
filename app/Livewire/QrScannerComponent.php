<?php

namespace App\Livewire;

use App\Features\ValidatedSignedUrl;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

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

    public function simulateInvalid()
    {
        $this->processQrCode('https://speekly.de');
    }
    public function simulateValid()
    {
        $this->processQrCode('https://speekly.de?qrCountry=de&qrCompany=Speekly+GmbH&signature=MEUCIQCeQF%2FmHULkRvHTvgRqorntw1C1DVDQ1DlUoDy0VE7I7AIgYVDIO3C9%2FdrhZ3wiu7jexxELKgrU%2FIyfX%2Fxe4uY8uWw%3D
 ');
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
