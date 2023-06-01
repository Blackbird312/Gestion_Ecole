@extends('layouts.contentNavbarLayout')

@section('title', 'Dashboard - Modules')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Admin /</span> Modules
</h4>





<div class="card">
  <h5 class="card-header">Table des Module</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr >
          <th>id</th>
          <th>Nom </th>
          <th>Coef</th>
          <th class="text-end">Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr >
          <td>1</td>
          <td>Laravel</td>
          <td>3</td>
          <td class="text-end">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-envelope"></i> Send Mail</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td>React.js</td>
          <td>3</td>
          <td class="text-end">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-envelope"></i> Send Mail</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td>3</td>
          <td>PHP</td>
          <td>3</td>
          <td class="text-end">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-envelope"></i> Send Mail</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td>4</td>
          <td>MongoDB</td>
          <td>3</td>
          <td class="text-end">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="fa-solid fa-envelope"></i> Send Mail</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>









@endsection

