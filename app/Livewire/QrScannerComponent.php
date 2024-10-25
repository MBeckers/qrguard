<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class QrScannerComponent extends Component
{
    public string $qrCodeUrl = '';

    #[On('processQrCode')]
    public function processQrCode($url)
    {
        $this->qrCodeUrl = $url;
        // You can process the URL here, such as saving it to a database or performing another action
        // For now, we'll just log the URL
       dd('QR Code URL scanned: ' . $url);
    }
    public function render()
    {
        return view('livewire.qr-scanner-component');
    }
}
