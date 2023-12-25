<?php

namespace App\View\Components\Scores;

use Closure;
use App\Models\Competition;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Livescore extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $livescore)
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
            }  
        }        
        return $foo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scores.livescore', [
            'pageCompetMatch' => $this->hasPageCompetition($this->livescore)
        ]);
    }
}
