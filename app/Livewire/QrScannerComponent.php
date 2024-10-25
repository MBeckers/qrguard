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
    }
    public function render()
    {
        return view('livewire.qr-scanner-component');
    }
}
