<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ServiceCategory;

class AdminEditServiceComponent extends Component
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

    public $newThumbnail;
    public $newImage;
    public $service_id;

    public $featured;

    public function mount($service_slug) {
        $service = Service::where('slug', $service_slug)->first();

        $this->service_id           = $service->id;
        $this->name                 = $service->name;
        $this->slug                 = $service->slug;
        $this->tagline              = $service->tagline;
        $this->service_category_id  = $service->service_category_id;
        $this->price                = $service->price;
        $this->discount             = $service->discount;
        $this->discount_type        = $service->discount_type;
        $this->featured             = $service->featured;
        $this->image                = $service->image;
        $this->thumbnail            = $service->thumbnail;
        $this->description          = $service->description;
        $this->inclusion = str_replace("\n", "|", trim($service->inclusion));
        $this->exclusion = str_replace("\n", "|", trim($service->exclusion));
    }

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
            'description'=> 'required',
            'inclusion'=> 'required',
            'exclusion'=> 'required',
        ]);

        if ($this->newThumbnail) {
            $this->validateOnly($fields, [
                'newThumbnail'=> 'required|mimes:jpeg,png,jpg,webp',
            ]);
        }

        if ($this->newImage) {
            $this->validateOnly($fields, [
                'newImage'=> 'required|mimes:jpeg,png,jpg,webp',
            ]);
        }
    }

    public function updateService() {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline'=> 'required',
            'service_category_id'=> 'required',
            'price'=> 'required',
            'description'=> 'required',
            'inclusion'=> 'required',
            'exclusion'=> 'required',
        ]);

        if ($this->newThumbnail) {
            $this->validate([
                'newThumbnail'=> 'required|mimes:jpeg,png,jpg,webp',
            ]);
        }

        if ($this->newImage) {
            $this->validate([
                'newImage'=> 'required|mimes:jpeg,png,jpg,webp',
            ]);
        }

        $service = Service::find($this->service_id);

        $service->name                  = $this->name;
        $service->slug                  = $this->slug;
        $service->tagline               = $this->tagline;
        $service->service_category_id   = $this->service_category_id;
        $service->price                 = $this->price;
        $service->discount              = $this->discount;
        $service->discount_type         = $this->discount_type;
        $service->featured              = $this->featured;
        $service->description           = $this->description;
        $service->inclusion             = str_replace("\n", "|", trim($this->inclusion));
        $service->exclusion             = str_replace("\n", "|", trim($this->exclusion));

        if ($this->newThumbnail) {
            // delete the old thumbnail first
            unlink('images/services/thumbnails'.'/'.$service->thumbnail);

            // generate unique name for new [thumbnail]
            $imageName = Carbon::now()->timestamp . '.' . $this->newThumbnail->extension();

            // store the new [thumbnail] as a file
            $this->newThumbnail->storeAs('services/thumbnails', $imageName);

            // save its url in the database
            $service->thumbnail = $imageName;
        }

        if ($this->newImage) { // if there is new image selected
            // delete the old thumbnail first
            unlink('images/services'.'/'.$service->image);

            // generate unique name for the new [image]
            $imageName2 = Carbon::now()->timestamp . '.' . $this->newImage->extension();

            // then store it as file
            $this->newImage->storeAs('services', $imageName2);

            // then save its url to the db
            $service->image = $imageName2;
        }

        $service->save();

        session()->flash('message', 'Service has been updated successfuly');
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service-component', ['categories' => $categories])->layout('layouts.base');
    }
}
