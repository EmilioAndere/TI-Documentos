<?php

namespace App\View\Components;

use Illuminate\View\Component;

class list_documents extends Component
{

    public $documentos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($documentos)
    {
        $this->documentos = $documentos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-documents');
    }
}
