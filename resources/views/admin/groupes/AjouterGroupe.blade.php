@extends('layouts.contentNavbarLayout')

@section('title' , "Ajouter groupe")

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Ajouter groupe</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Ajouter groupe</h5>
      </div>
      <div class="card-body">
        <form action="{{ route("store.groupe")}}" method="POST">
          @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-group"></i></span>
                <input name="nom" type="text" class="form-control" id="basic-icon-default-fullname" placeholder="DEVWFS201" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
              </div>
              <p class="text-danger">
                @error('nom')
                {{$message}}
              @enderror
              </p>
            </div>

          </div>

          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10 mb-4">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
