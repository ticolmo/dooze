@extends('layouts.live')

@section('content')

<x-live.encart-club />

<div id="posts">Liste des posts

</div>
<div id="form">
  
   <input type="text" name="" id="message" > <button id="submit"><i class="bi bi-send"></i></button>
   <input type="hidden" name="" id="name" value="{{auth()->user()->name}}"> 
   <input type="hidden" name="" id="liveid" value="{{$live->id}}"> 

  
</div>
@endsection