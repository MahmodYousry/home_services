<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;

    public function deleteSlide($slide_id) {
        // find the slider using the id
        $slide = Slider::find($slide_id);

        // delete the slide image file first
        unlink('images/slider/'.$slide->image);

        // then delete everything from db
        $slide->delete();

        // message alert
        session()->flash('message', 'Slide Deleted Successfully');
    }

    public function render()
    {
        $slides = Slider::paginate(10);
        return view('livewire.admin.admin-slider-component', ['slides' => $slides])->layout('layouts.base');
    }
}
