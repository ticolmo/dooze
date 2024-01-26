<?php

namespace App\View\Components\Scores;

use App\Models\Competition;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Scoresclub extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $lastmatch, public $nextmatch)
    {
        //
    }
    public function hasPageCompetition($rencontre){
        $foo = [];
        if(isset($rencontre) && !empty($rencontre)){            
            $id = $rencontre['league']['id'];
            if (Competition::where('id',$id)->exists()){
                $bar = Competition::find($id);
                $foo['page'] = $bar->has_page_competition;
                $foo['url'] = $bar->url;
            }else{
                $foo['page'] = false;
                $foo['url'] = false;
            }  
        }        
        return $foo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scores.scoresclub', [
            'pageCompetLastMatch' => $this->hasPageCompetition($this->lastmatch),
            'pageCompetNextMatch' => $this->hasPageCompetition($this->nextmatch),
        ]);
    }
}
