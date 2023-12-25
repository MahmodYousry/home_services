<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddSlideComponent extends Component
{

    use WithFileUploads;

    public $title;
    public $image;
    public $status=0;

    public function updated($fields) {
        $this->validateOnly($fields, [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,webp,jpeg,gif',
        ]);
    }

    public function addNewSlide()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,webp,jpeg,gif',
        ]);

        $slide = new Slider();
        $slide->title = $this->title;

        // generate image name using time stamp from now time
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        // store the image using generated name in slider folder
        $this->image->storeAs('slider', $imageName);
        // store image name in db
        $slide->image = $imageName;
        $slide->status = $this->status;
        $slide->save();
        session()->flash('message', 'Slide Has been created successfuly');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-slide-component')->layout('layouts.base');
    }
}
