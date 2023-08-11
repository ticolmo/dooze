@extends('layouts.home')

@section('content') 

    <main id="" class="form-signin w-50 m-auto ">
      <div style="margin-bottom:30px"><a href="{{route('profilpublic', auth()->user()->id)}}">Retour à ton profil public</a></div>
      {{-- FORMULAIRE --}}
      <form action="{{route('updateprofilpublic')}}" method="post" class="needs-validation" enctype='multipart/form-data'>
        @csrf
        

        @if ($errors->any())
            <div class="alert alert-danger">
              Veuillez compléter le(s) champ(s) manquant(s)
            </div>
        @endif
        

        <div class="h5"style="text-align: center"> Complète ton profil public</div>
        

        {{-- AVATAR --}}

        
        <input type="file" id="fileInput" name="avatar" style="display: none">
        <div class="close"><i class="bi bi-x-circle-fill"></i></div>
        <div id="previewContainer">
          @if (auth()->user()->photoprofil != null) 
            <img src="{{Storage::url("users/".auth()->user()->id."/avatar\/".auth()->user()->photoprofil)}}" alt="" style="border-radius:9999px;">
          @else
            <i class="bi bi-person-circle text-secondary" style="font-size: 4rem"></i>
          @endif

          <div id="telechargement"></div> 
        </div> 

        <label style="text-align:center" for="fileInput" class="mb-3"><i class="bi bi-camera"></i> photo de profil</label>

        {{-- HASHTAG --}}
        
        <div class="form-floating @error('hashtag') is-invalid @enderror">
          <input type="text" class="form-control @error('hashtag') is-invalid @enderror" id="floatingInput" placeholder="Ecris ton premier hashtag !" name="hashtag" value="{{ old('hashtag') ?? $user->hashtag }}">
          <label for="floatingInput"> # hashtag !</label>
          @error('hashtag')
            <div class="invalid-feedback"> {{$message}} </div>
          @enderror
        </div>
      

        {{-- BIO --}}
        <div class="form-floating @error('bio') is-invalid @enderror">
          <textarea class="form-control @error('bio') is-invalid @enderror" placeholder="" id="floatingTextarea2" name="bio" value=""style="height: 100px">{{ old('bio') ?? $user->bio}}</textarea>
          <label for="floatingTextarea2"> <i class="bi bi-chat"></i> Bio !</label>
          @error('bio')
            <div class="invalid-feedback"> {{$message}} </div>
          @enderror
        </div>
        <br>

        <hr>
        <br>
        {{-- LIEN --}}
       <div> <i class="bi bi-link-45deg"></i> lien(s) externe(s)</div>
        <br>
        <div class="row mb-2">
          <div class="col-md-4" >
            <input type="text" class="col-md-12 titrelien" placeholder="Titre :" style="height:58px" name="titrelien1" value="{{ old('titrelien1') ?? $user->titrelien1}}">
          </div>
          <div class="col-md-8">
              <div class="form-floating @error('lien1') is-invalid @enderror">
                <input type="text"   class="form-control @error('lien1') is-invalid @enderror" id="floatingInput" placeholder="Ajoute un lien" name="lien1" value="{{ old('lien1') ?? $user->lien1}}">
                <label for="floatingInput"> (http://example.com) </label>
                @error('lien1')
                  <div class="invalid-feedback"> {{$message}} </div>
                @enderror
              </div>   
          </div>
        
        </div> 

        <div class="row mb-2">
          <div class="col-md-4" >
            <input type="text" class="col-md-12 titrelien" placeholder="Titre :" style="height:58px" name="titrelien2" value="{{ old('titrelien2') ?? $user->titrelien2}}">
          </div>
          <div class="col-md-8">
              <div class="form-floating @error('lien2') is-invalid @enderror">
                <input type="text"   class="form-control @error('lien2') is-invalid @enderror" id="floatingInput" placeholder="Ajoute un lien" name="lien2" value="{{ old('lien2') ?? $user->lien2}}">
                <label for="floatingInput">  (http://example.com) </label>
                @error('lien2')
                  <div class="invalid-feedback"> {{$message}} </div>
                @enderror
              </div>   
          </div>
        
        </div> 
        <br>
        
        <br>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>

      </form>
    </main>
  
</div>

@endsection