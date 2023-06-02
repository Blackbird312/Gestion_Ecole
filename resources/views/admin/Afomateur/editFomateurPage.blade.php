@extends('layouts.contentNavbarLayout')

@section('title' , "update Prof")

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> update Formateur</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">update Formateur</h5>
      </div>
      <div class="card-body">
        <form action="{{ route("update.formateurs" , $formateur->id )}}" method="POST">
          @csrf
          @method('put')
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input value="{{ $formateur->nom}}" name="nom" type="text" class="form-control" id="basic-icon-default-fullname" placeholder="hathout" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />

              </div>
              @error('nom')
                {{$message}}
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Prenom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input value="{{ $formateur->prenom}}" name="prenom" type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Mohammed Taha" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
              </div>
              @error('prenom')
                {{$message}}
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input value="{{ $formateur->email}}" name="email" type="text" id="basic-icon-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
              </div>
              @error('email')
                {{$message}}
              @enderror
              <div class="form-text"> You can use letters, numbers & periods </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Password</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-lock"></i></span>
                <input name="password" type="password" id="basic-icon-default-email" class="form-control" placeholder="password" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
              </div>
              @error('pass')
                {{$message}}
              @enderror
            </div>
          </div>




          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10 mb-4">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
