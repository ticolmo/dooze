@extends('layouts.home')

@section('navbar')
  <livewire:partials.navbar />
@endsection

@section('content')

<div class="w-75 m-auto">
    
    <x-api-dooze /> 

</div>



@endsection