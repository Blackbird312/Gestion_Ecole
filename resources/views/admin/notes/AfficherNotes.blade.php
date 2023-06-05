@extends('layouts.contentNavbarLayout')

@section('title', 'Dashboard - Notes')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span>Notes
</h4>





<div class="row mb-4">

@foreach ($eleves as $item)
<div class="col-md-6 col-lg-4">
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">{{ $item->nom}} {{ $item->prenom }}</h5>
      <a href="{{route('note' , $item->id )}}" class="btn btn-primary">Afficher Note </a>
    </div>
  </div>
</div>

@endforeach





</div>








@endsection

