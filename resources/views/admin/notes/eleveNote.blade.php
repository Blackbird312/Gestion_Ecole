@extends('layouts.contentNavbarLayout')

@section('title', 'Dashboard - Notes')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span>Notes / {{ $eleve->nom }} {{ $eleve->prenom }}
</h4>





<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>Module </th>
          <th>Coef</th>
          <th>Note</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($notes as $item)
        <tr>
          <td>{{ $item->id}}</td>
          <td>{{ $item->nomM}}</td>
          <td>{{ $item->coef}}</td>
          <td>{{  $item->note}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <form action="{{ route("delete.note" , $item->id)}}" method="POST">
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

