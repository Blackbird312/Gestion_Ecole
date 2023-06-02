@extends('layouts.contentNavbarLayout')

@section('title', 'Dashboard - Formateur')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Fomateurs
</h4>




@if (session()->has('success'))
  <x-alert type="success"  >
    {{ session('success') }}
  </x-alert>
@endif




<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>Nom </th>
          <th>Pernom</th>
          <th>email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($formateurs as $item)
        <tr>
          <td>{{ $item->id}}</td>
          <td>{{ $item->nom}}</td>
          <td>{{ $item->prenom}}</td>
          <td>{{  $item->email}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-envelope"></i> Send Mail</a>
                <a class="dropdown-item" href="{{route("edit.formateurs" , $item->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <form action="{{ route("delete.formateurs" , $item->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  <button  class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
      @endforeach

      </tbody>
    </table>
  </div>
</div>









@endsection

