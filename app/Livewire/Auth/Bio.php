<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Session;

class Bio extends Component
{
    #[Session(key: 'bio.bestmemory')] 
    public $bestmemory; 
    #[Session(key: 'bio.worsememory')] 
    public $worsememory; 
    #[Session(key: 'bio.bestplayer')] 
    public $bestplayer; 
    #[Session(key: 'bio.bio')] 
    public $bio;
    
    public function rules(){
        return [
            'bestmemory' => ['nullable', 'string', 'max:255'],
            'worsememory' => ['nullable', 'string', 'max:255'],
            'bestplayer' => ['nullable', 'string', 'max:40'],
            'bio' => ['nullable', 'string', 'max:255']
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
    public function save()
    {
        $this->validate();

        return $this->redirect('/register', navigate: true);
    }
    public function render()
    {
        return view('livewire.auth.bio');
    }
}
