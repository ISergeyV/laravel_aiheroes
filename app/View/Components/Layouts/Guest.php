<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;

class Guest extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * This method tells Laravel to use the 'layouts.guest' view file
     * when it encounters the <x-layouts.guest> component tag.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
