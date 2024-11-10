<?php

namespace App\Livewire;

use App\Data\SelectionType;
use Livewire\Component;
use Livewire\Attributes\On;

class QrGuard extends Component
{
    public string $selection = SelectionType::Website->name;

    #[On('selected-type')]
    public function switchSelection($selection)
    {
        $this->selection = $selection;
    }

    public function render()
    {
        return view('livewire.qr-guard');
    }
}
