<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class DataForm extends Form
{    

    #[Validate('nullable|string|max:255')]
    public $name;

    #[Validate('nullable|string|max:255')]
    public $pseudo;

    #[Validate('nullable|string|max:200')]
    public $bio; 

    #[Validate('nullable|string|max:10')]
    public $categorie;

    #[Validate('nullable|string|max:50')]
    public $titrelienone;

    #[Validate('nullable|string|max:100')]
    public $lienone; 

    #[Validate('nullable|string|max:50')]
    public $titrelientwo;

    #[Validate('nullable|string|max:100')]
    public $lientwo;



    public function __construct()
    {
        $this->name = auth()->user()->name; 
        $this->pseudo = auth()->user()->pseudo; 
        $this->categorie = auth()->user()->categorie; 
        $this->bio = auth()->user()->bio; 
        $this->titrelienone = auth()->user()->titrelien1; 
        $this->lienone = auth()->user()->lien1; 
        $this->titrelientwo = auth()->user()->titrelien2; 
        $this->lientwo = auth()->user()->lien2; 
    }

}