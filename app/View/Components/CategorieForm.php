<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategorieForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $libelle;
    public $btnType;
    public $postUrl;
    public function __construct($libelle,$btnType,$postUrl)
    {
       $this->libelle = $libelle;
       $this->postUrl = $postUrl;
       $this->btnType = $btnType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.categorie-form');
    }
}
