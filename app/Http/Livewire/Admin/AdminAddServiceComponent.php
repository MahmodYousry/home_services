<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\ServiceCategory;
use Livewire\WithFileUploads;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $discount;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $description;
    public $inclusion;
    public $exclusion;

    public function generateSlug() {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields) {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'tagline'=> 'required',
            'service_category_id'=> 'required',
            'price'=> 'required',
            'discount'=> 'required',
            'discount_type'=> 'required',
            'image'=> 'required|mimes:jpeg,png,jpg,webp',
            'thumbnail'=> 'required|mimes:jpeg,png,jpg,webp',
            'description'=> 'required',
            'inclusion'=> 'required',
            'exclusion'=> 'required',
        ]);
    }

    public function createService() {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline'=> 'required',
            'service_category_id'=> 'required',
            'price'=> 'required',
            'discount'=> 'required',
            'discount_type'=> 'required',
            'image'=> 'required|mimes:jpeg,png,jpg,webp',
            'thumbnail'=> 'required|mimes:jpeg,png,jpg,webp',
            'description'=> 'required',
            'inclusion'=> 'required',
            'exclusion'=> 'required',
        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->price = $this->price;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->description = $this->description;
        $service->inclusion = str_replace("\n", "|", trim($this->inclusion));
        $service->exclusion = str_replace("\n", "|", trim($this->exclusion));

        // generate unique name for [thumbnail] then store it as file
        $imageName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails', $imageName);
        $service->thumbnail = $imageName;

        // generate unique name for [image] then store it as file
        $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('services', $imageName2);
        $service->image = $imageName2;

        $service->save();

        session()->flash('message', 'Service has been created successfuly');

    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service-component', ['categories'=> $categories])->layout('layouts.base');
    }
}
