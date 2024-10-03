<?php

namespace App\Livewire;



use App\Models\SubscriptionPackage;
use Livewire\Component;

class SubscriptionPackages extends Component
{
//    public $packages;
//
//    public function mount()
//    {
//        // Retrieve all subscription packages
//        $this->packages = SubscriptionPackage::with('prices')->get();
//    }

    public function render()
    {
        return view('livewire.contact');
    }
}
