<div>
    <main id="" class="form-signin w-50 m-auto" >
        <div style="text-align: center"> 
          <img src="{{Storage::url('divers/corleone.jpg')}}" style="width:30%; height:auto" alt="">
          <h1 class="h3 mb-3 fw-normal m-auto entete"> {{$questionnaire->club->nom}} </h1>
        </div>
        <!-- QUESTION -->
        <form wire:submit="save">
         
          <div class="h5 mb-3 fw-normal" > {{$questionnaire->question}} </div>

          <div class="form-check" >
            <input class="form-check-input" type="radio" name="questionhonneur" id="flexRadioDefault1" wire:model="reponse"
              value="{{$questionnaire->prop_0}}">
            <label class="form-check-label" for="flexRadioDefault1"> {{$questionnaire->prop_0}}</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="questionhonneur" id="flexRadioDefault2" wire:model="reponse"
              value="{{$questionnaire->prop_1}}">
            <label class="form-check-label" for="flexRadioDefault2">{{$questionnaire->prop_1}}</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="questionhonneur" id="flexRadioDefault3" wire:model="reponse"
              value="{{$questionnaire->prop_2}}">
            <label class="form-check-label" for="flexRadioDefault3">{{$questionnaire->prop_2}}</label>
            
          </div>      
          <div class="">
          @if ($mauvaiseReponse==true)
          <div style="margin: 30px; text-align:center"> Désolé ! Réponse fausse !!</div>
          @endif

          @if ($bouton==true)
          <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
          @endif
        </form>
        
       
        
        
        </div>
        <div class="">
          @if ($bonneReponse==true)
          <div style="margin: 30px; text-align:center"> 'Bravo ! Tu peux continuer!'</div>
          <a class="w-100 btn btn-lg btn-primary" href="{{ route('bio') }}" wire:navigate class="bouton-suivant">Suivant</a>
        @endif
        
        </div>




    </main>
</div>
