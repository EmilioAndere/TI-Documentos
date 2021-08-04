<?php

namespace App\View\Components;

use Illuminate\View\Component;

class list_descargas extends Component
{
    public $descargas;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($descargas)
    {
        $this->descargas = $descargas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-descargas');
    }
}
