<?php

namespace App\Livewire;

use App\Data\SelectionType;
use Illuminate\Support\Arr;
use Livewire\Component;

class QrSelection extends Component
{
    public array $options;

    public function mount()
    {
        $this->init();
        Arr::set($this->options, SelectionType::Website->name.'.selected', true);
    }

    public function init()
    {
        $this->options = [
            SelectionType::Website->name => [
                'icon' => 'icons.link',
                'title' => 'Website (Url)',
                'selected' => false
            ],
            SelectionType::VCard->name => [
                'icon' => 'icons.user-3-line',
                'title' => 'vCard Plus',
                'selected' => false
            ],
            SelectionType::BusinessPage->name => [
                'icon' => 'icons.briefcase-line',
                'title' => 'Business Page',
                'selected' => false
            ],
            SelectionType::Menu->name => [
                'icon' => 'icons.restaurant-line',
                'title' => 'Speisekarte',
                'selected' => false
            ],
            SelectionType::Media->name => [
                'icon' => 'icons.image-2-line',
                'title' => 'Medien',
                'selected' => false
            ],
            SelectionType::File->name => [
                'icon' => 'icons.file-upload-line',
                'title' => 'File',
                'selected' => false
            ],
            SelectionType::Location->name => [
                'icon' => 'icons.apps-2-line',
                'title' => 'Location',
                'selected' => false
            ],
            SelectionType::WiFi->name => [
                'icon' => 'icons.wifi-line',
                'title' => 'Wifi',
                'selected' => false
            ],
            SelectionType::Email->name => [
                'icon' => 'icons.mail-line',
                'title' => 'Business Page',
                'selected' => false
            ],
            SelectionType::AppStore->name => [
                'icon' => 'icons.apps-2-line',
                'title' => 'App Store',
                'selected' => false
            ],
            SelectionType::Text->name => [
                'icon' => 'icons.text',
                'title' => 'Text',
                'selected' => false
            ],
            SelectionType::Bitcoin->name => [
                'icon' => 'icons.bit-coin-line',
                'title' => 'Bitcoin',
                'selected' => false
            ],
        ];

    }

    public function select($option)
    {
        $this->init();
        Arr::set($this->options, $option.'.selected', true);

        $this->dispatch('selected-type', selection: $option);
    }

    public function render()
    {
        return view('livewire.qr-selection');
    }
}
