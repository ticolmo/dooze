<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class Data extends Component
{
    public $form = false;
    public $name;
    #[Validate]
    public $pseudo;
    public $bio; 
    public $categorie;
    public $titrelienone;
    public $lienone; 
    public $titrelientwo;
    public $lientwo;
    public $user;

    public function mount()
    {
        $this->name = auth()->user()->name; 
        $this->pseudo = auth()->user()->pseudo; 
        $this->categorie = auth()->user()->categorie; 
        $this->bio = auth()->user()->bio; 
        $this->titrelienone = auth()->user()->titrelien1; 
        $this->lienone = auth()->user()->lien1; 
        $this->titrelientwo = auth()->user()->titrelien2; 
        $this->lientwo = auth()->user()->lien2; 
        $this->user = User::findOrFail(auth()->user()->id);
    } 

    public function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'bio' => ['nullable', 'string', 'max:200'],
            'categorie' => ['nullable', 'string', 'max:10'],
            'titrelienone' => ['nullable', 'string', 'max:50'],
            'lienone' => ['nullable', 'string', 'max:100'],
            'titrelientwo' => ['nullable', 'string', 'max:50'],
            'lientwo' => ['nullable', 'string', 'max:100'],
        ];
    }
    public function update()
    {
        $this->validate(); 
 
        $this->user->update($this->all());

        $this->form = false;
       
    }
    public function selectParams()
    {
        $parametre = "settings";
        $this->dispatch('page', selection: $parametre)->to(Index::class);
       
    }


    public function render()
    {
        return view('livewire.auth.data');
    }
}
