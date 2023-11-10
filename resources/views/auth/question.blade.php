@extends('layouts.home')

@section('content')

      <main id="" class="form-signin w-50 m-auto" >
        <div style="text-align: center"> 
          <img src="{{Storage::url('divers/corleone.jpg')}}" style="width:30%; height:auto" alt="">
          <h1 class="h3 mb-3 fw-normal m-auto entete"> {{$questionnaire->club->nom}} </h1>
        </div>
        <!-- QUESTION -->
        <form action="{{route('validation')}}" method="post">
          @csrf
          
          

          <div class="h5 mb-3 fw-normal" > {{$questionnaire->question}} </div>

          <div class="form-check" >
            <input class="form-check-input" type="radio" name="questionhonneur" id="flexRadioDefault1" 
              value="{{$questionnaire->prop_0}}">
            <label class="form-check-label" for="flexRadioDefault1"> {{$questionnaire->prop_0}}</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="questionhonneur" id="flexRadioDefault2"
              value="{{$questionnaire->prop_1}}">
            <label class="form-check-label" for="flexRadioDefault2">{{$questionnaire->prop_1}}</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="questionhonneur" id="flexRadioDefault3"
              value="{{$questionnaire->prop_2}}">
            <label class="form-check-label" for="flexRadioDefault3">{{$questionnaire->prop_2}}</label>
            
          </div>      
          <div class="">
          @if (isset($message))
          <div style="margin: 30px; text-align:center"> {{ $message }}</div>
          @endif

          @if (isset($bouton) && $bouton==true)
          <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
          @endif
        </form>
        
       
        
        
        </div>
        <div class="">
          @if (isset($suivant) && $suivant==true)
          <a class="w-100 btn btn-lg btn-primary" href="{{ route('register') }}" class="bouton-suivant">Suivant</a>
        @endif
        
        </div>




    </main>




@endsection