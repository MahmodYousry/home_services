<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        // get random 18 item of categories from database
        $scategories = ServiceCategory::inRandomOrder()->take(18)->get();

        // get random 18 item of featured services from database
        $fservices = Service::where('featured', 1)->inRandomOrder()->take(8)->get();

        // get 8 featured services categories only
        $fsCategories = ServiceCategory::where('featured', 1)->take(8)->get();

        //
        $sid = ServiceCategory::whereIn('slug', ['ac', 'tv', 'Laundry', 'geyser', 'water-purifier'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id', $sid)->inRandomOrder()->take(8)->get();

        return view('livewire.home-component',
        [
            'scategories' => $scategories,
            'fservices' => $fservices,
            'fsCategories' => $fsCategories,
            'aservices'=> $aservices
        ])->layout('layouts.base');
    }
}
