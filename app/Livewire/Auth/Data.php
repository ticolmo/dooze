<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class Data extends Component
{
    public $form = false;
    public $bio; 
    public $titrelienone;
    public $lienone; 
    public $titrelientwo;
    public $lientwo;
    public $user;
    public $test;

    public function mount()
    {
        $this->test = uniqid();
        $this->bio = auth()->user()->bio; 
        $this->titrelienone = auth()->user()->titrelien1; 
        $this->lienone = auth()->user()->lien1; 
        $this->titrelientwo = auth()->user()->titrelien2; 
        $this->lientwo = auth()->user()->lien2; 
        $this->user = User::findOrFail(auth()->user()->id);
    } 

    public function rules(){
        return [
            'bestmemory' => ['nullable', 'string', 'max:255'],
            'worsememory' => ['nullable', 'string', 'max:255'],
            'bestplayer' => ['nullable', 'string', 'max:40'],
            'bio' => ['nullable', 'string', 'max:255'],
            'titrelienone' => ['nullable', 'string', 'max:50'],
            'lienone' => ['nullable', 'string', 'max:100'],
            'titrelientwo' => ['nullable', 'string', 'max:50'],
            'lientwo' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function boot()
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                $count = 0;
    
                if (empty($this->bestmemory)) {
                    $count++;
                }
                if (empty($this->worsememory)) {
                    $count++;
                }
                if (empty($this->bestplayer)) {
                    $count++;
                }
                if (empty($this->bio)) {
                    $count++;
                }
                if ($count > 2){
                    $validator->errors()->add('minimum', 'foo');
                }
            });
        });
    }

    public function update()
    {
        $this->validate(); 
 
        $this->user->update($this->all());

        $this->form = false;

        $this->reset();
       
    }
    
    public function render()
    {
        return view('livewire.auth.data');
    }
}
