<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\HeaderSetting;
use App\Models\JumbotronSetting;
use App\Models\SubscriptionPackage;
use Livewire\Component;

class LandingPage extends Component
{
    public $logo;
    public $website_title;
    public $description;
    public $subscriptionPackages;

    public $countries;
    public $language_code;
    public $country_code;
    public function mount($country_code, $language_code)
    {

        $this->country_code = $country_code;
        $this->language_code = $language_code;

        // Cari country berdasarkan country_code
        $this->countries = Country::where('country_code', $country_code)->firstOrFail();


//        dd($this->country);

        // Ambil pengaturan dari database
        $headerSettings = HeaderSetting::all();

        foreach ($headerSettings as $headerSetting) {
            $this->logo = $headerSetting->logo ?? 'default_logo.png'; // Ambil logo
            $this->website_title = $headerSetting->website_title ?? 'Default Website Title'; // Ambil judul website
        }

        $jumbotronSettings = JumbotronSetting::all();

        foreach ($jumbotronSettings as $jumbotronSetting) {
            //$this->logo = $jumbotronSetting->logo ?? 'default_logo.png'; // Ambil logo
            $this->description = $jumbotronSetting->description ?? ''; // Ambil judul website
        }



        $this->subscriptionPackages = SubscriptionPackage::with(['prices' => function($query) {
            $query->where('country_id', $this->countries->id);
        }])->get();


        // Set locale bahasa
        app()->setLocale($language_code);
    }

    public function render()
    {
        return view('livewire.landing-page', [
//            'country' => $this->country,
            'subscriptionPackages' => $this->subscriptionPackages,

        ]);
    }
}
