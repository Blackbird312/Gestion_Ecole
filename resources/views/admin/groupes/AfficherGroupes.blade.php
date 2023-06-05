@extends('layouts.contentNavbarLayout')

@section('title', 'Dashboard - Groupes')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Groupes
</h4>

<div class="text-center">
  @if (session()->has('success'))
  <x-alert type="success"  >
    {{ session('success') }}
  </x-alert>
@endif

</div>




<div class="card">
  <h5 class="card-header">Table des groupes</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr >
          <th>id</th>
          <th>Nom </th>
          <th class="text-end">Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($groupes as $item)
        <tr >
          <td>{{  $item->id}}</td>
          <td>{{ $item->nom}}</td>
          <td class="text-end">
            <span>
              <form action="{{route('delete.groupe' , $item->id)}}" method="post">
                @csrf
                @method("delete")
                <button class="btn btn-danger">
                  <i class=" bx bx-trash me-1"></i>
                </button>
              </form>
               </span>
          </td>
        </tr>
        @endforeach



      </tbody>
    </table>
  </div>
</div>









@endsection

