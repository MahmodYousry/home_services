<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditSlideComponent extends Component
{
    use WithFileUploads;

    public $slide_id;
    public $title;
    public $image;
    public $status;

    public $newImage;

    public function mount($slide_id) {
        // using the slide id from the get method
        // get the slider and update public variables using it
        $slide = Slider::find($slide_id);

        $this->slide_id = $slide->id;
        $this->title    = $slide->title;
        $this->image    = $slide->image;
        $this->status   = $slide->status;
    }

    public function updated($fields) {
        $this->validateOnly($fields, [
            'title' => 'required'
        ]);

        if ($this->newImage) {
            $this->validateOnly($fields, [
                'newImage' => 'required|mimes:png,jpg,webp,jpeg,gif',
            ]);
        }
    }

    public function updateSlide()
    {
        $this->validate([
            'title' => 'required'
        ]);

        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:png,jpg,webp,jpeg,gif',
            ]);
        }

        $slide = Slider::find($this->slide_id);

        $slide->title = $this->title;

        if ($this->newImage) { // if there is new image selected
            // delete the old image
            unlink('images/slider/'.$slide->image);
            // generate image name using time stamp from now time
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            // store the image using generated name in slider folder
            $this->newImage->storeAs('slider', $imageName);
            // store image name in db
            $slide->image = $imageName;
        }

        $slide->status = $this->status;
        $slide->save();
        session()->flash('message', 'Slide Has been updated successfully');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-slide-component')->layout('layouts.base');
    }
}
