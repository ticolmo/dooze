<?php
namespace App\Api;

use App\Api\Nomequipe;
use App\Api\Nomcompetition;
use Illuminate\Support\Facades\Http;



class ResultatsJour
{   
    private $europeleague = [3,2,848,531,525];
    /* FA Cup supprimé */
    private $englandleague = [39,48,528,670,698,44]; 
    private $spainleague = [140,142,143,556]; 
    private $italyleague = [135,137,139,547]; 
    private $germanyleague = [78,81,82,529,947]; 
    private $franceleague = [61,64,66,526]; 
    private $switzerlandleague = [207,209,739]; 
    private $matchsamicauxcode = 667;

    /* pour appeler qu'une seule fois l'API */
    private $apiresult = null;
      
    public $datechoisie;

    public function __construct($datechoisie)
    {
			$this->datechoisie = $datechoisie;
    }

    private function apifootball(){
        $api = new Apifootball(); 
        return $api;
    }

    private function apimatchs()
    {
        if ($this->apiresult === null){
            $response = $this->apifootball()->header()->get("https://v3.football.api-sports.io/fixtures",[
            'season' => 2023,
            'date' => $this->datechoisie
            ]);                 
 
            $rencontres = $response->json();  

            $error = $rencontres['errors'];
            if(!empty($error)) {
                die;
            };
            
            $matchsdujour = [];
            foreach ($rencontres['response'] as $match){               

                if (in_array($match['league']['id'], $this->europeleague)){
                    $matchsdujour['europematch'][] = $match;
                    }
                if (in_array($match['league']['id'], $this->englandleague)){
                    $matchsdujour['englandmatch'][] = $match;
                    }
                if (in_array($match['league']['id'], $this->spainleague)){
                    $matchsdujour['spainmatch'][] = $match;
                    }
                if (in_array($match['league']['id'], $this->italyleague)){
                    $matchsdujour['italymatch'][] = $match;
                    }
                if (in_array($match['league']['id'], $this->germanyleague)){
                    $matchsdujour['germanymatch'][] = $match;
                    }
                if (in_array($match['league']['id'], $this->franceleague)){
                    $matchsdujour['francematch'][] = $match;
                    }
                if (in_array($match['league']['id'], $this->switzerlandleague)){
                    $matchsdujour['switzerlandmatch'][] = $match;
                    }
                if ($match['league']['id'] == $this->matchsamicauxcode){
                    $matchsdujour['matchsamicaux'][] = $match;;
                    }

            };

            $this->apiresult = $matchsdujour;
        };
       
       
        return $this->apiresult;
    }

    /* pour appeler qu'une seule fois l'API */
    private function matchsdujour(){

        return $this->apimatchs();

    }

    private function correctionIntitule(&$match){
        $check = new Nomequipe();       
        $match['teams']['home']['name'] = $check->setnom($match['teams']['home']['name']); 
        $match['teams']['away']['name'] = $check->setnom($match['teams']['away']['name']);
        $check2 = new Nomcompetition();
        $match['league']['name'] = $check2->setnom($match['league']['name']);   
        return;   
    }
    
    public function europa(){

        $matchsdujour = $this->matchsdujour();

       if(isset($matchsdujour['europematch'])){ 
            foreach ($matchsdujour['europematch'] as &$match){

                $this->correctionIntitule($match);    
            };        
            
            return $matchsdujour['europematch'];
        }
    }

    public function angleterre(){

        $matchsdujour = $this->matchsdujour();

       if(isset($matchsdujour['englandmatch'])){
            foreach ($matchsdujour['englandmatch'] as &$match){

                $this->correctionIntitule($match);     
                    
            };        
            return $matchsdujour['englandmatch'];
            
       }
    }

    public function espagne(){

        $matchsdujour = $this->matchsdujour();
        
        if(isset($matchsdujour['spainmatch'])){
            foreach ($matchsdujour['spainmatch'] as &$match){

                $this->correctionIntitule($match);            
                    
            };                    
            return $matchsdujour['spainmatch'];
        }
    }

    public function italie(){

        $matchsdujour = $this->matchsdujour();

        if(isset($matchsdujour['italymatch'])){
            foreach ($matchsdujour['italymatch'] as &$match){

                $this->correctionIntitule($match); 
            };        
            
            return $matchsdujour['italymatch'];
        }
    }

    public function allemagne(){

        $matchsdujour = $this->matchsdujour();
        
        if(isset($matchsdujour['germanymatch'])){
            foreach ($matchsdujour['germanymatch'] as &$match){

                $this->correctionIntitule($match); 
            };        
            
            return $matchsdujour['germanymatch'];
        }
    }

    public function frankreich(){

        $matchsdujour = $this->matchsdujour();
        
        if(isset($matchsdujour['francematch'])){
            foreach ($matchsdujour['francematch'] as &$match){

                $this->correctionIntitule($match); 
                    
            };        
            
            return $matchsdujour['francematch'];
        }
    }
    public function suisse(){

        $matchsdujour = $this->matchsdujour();
        
       if(isset($matchsdujour['switzerlandmatch'])){
            foreach ($matchsdujour['switzerlandmatch'] as &$match){

                $this->correctionIntitule($match);             
                
            }; 
            return $matchsdujour['switzerlandmatch'];        
       }
       
    }
    public function getmatchsamicaux(){

        $matchsdujour = $this->matchsdujour();
        
        if(isset($matchsdujour['matchsamicaux'])){
            foreach ($matchsdujour['matchsamicaux'] as &$match){

                $this->correctionIntitule($match);         
                    
            };     
            return $matchsdujour['matchsamicaux'];
        }
    }

    

}
