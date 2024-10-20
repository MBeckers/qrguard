<?php

namespace App\Livewire;

use App\Features\GenerateSignedUrl;

use chillerlan\QRCode\QRCode;
use Livewire\Component;

class QrGenerator extends Component
{
    public string $url = 'https://speekly.de';
    public string $company = 'Speekly GmbH';
    public string $country = 'de';
    public string $signedUrl = '';
    public string $qrCode = '';

    public function generateQrCode(GenerateSignedUrl $generateSignedUrl, QRCode $QRCode)
    {
        $this->signedUrl = $generateSignedUrl(
            $this->url,
            ['qrCountry' => $this->country, 'qrCompany' => $this->company]
        );
        $this->qrCode = $QRCode->render('https://speekly.de&qrCountry=de&qrCompany=Speekly+GmbH&signature=MEUCIC7G6l9ADST2');
    }

    public function render()
    {
        return view('livewire.qr-generator');
    }
}
