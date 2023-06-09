@extends('layouts.contentNavbarLayout')

@section('title', 'Dashboard - Seance')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Seance
</h4>

<div class="text-center">
  @if (session()->has('success'))
  <x-alert type="success"  >
    {{ session('success') }}
  </x-alert>
@endif

</div>




<div class="card">
  <h5 class="card-header">Table des Seance</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>formateur </th>
          <th>groupe</th>
          <th>module</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($seancess as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->nomF }}</td>
          <td>{{ $item->nomG }}</td>
          <td>{{ $item->nom }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <form action="{{ route('delete.seance' , $item->id)}}" method="POST">
                  @csrf
                  @method("delete")
                  <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
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

