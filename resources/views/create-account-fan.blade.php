@extends('layouts.home')

@section('navbar')
  <livewire:partials.navbar />
@endsection

@section('content')

<livewire:auth.choix-club />

@endsection