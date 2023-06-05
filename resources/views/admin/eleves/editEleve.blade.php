@extends('layouts.contentNavbarLayout')

@section('title' , "edit eleve")

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> edit eleve</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">edit eleve</h5>
      </div>
      <div class="card-body">
        <form action="{{ route("update.eleve" , $eleve->id)}}" method="POST">
          @csrf
          @method("put")
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input value="{{$eleve->nom}}" name="nom" type="text" class="form-control" id="basic-icon-default-fullname" placeholder="hathout" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
              </div>
              <p class="text-danger">
                @error('nom')
                {{$message}}
              @enderror
              </p>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Prenom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input value="{{$eleve->prenom}}" name='prenom' type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Mohammed Taha" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
              </div>
              <p class="text-danger">
                @error('prenom')
                {{$message}}
              @enderror
              </p>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input value="{{$eleve->email}}" name="email" type="text" id="basic-icon-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-icon-default-email2" />
              </div>
              <p class="text-danger">
                @error('email')
                {{$message}}
              @enderror
              </p>
            </div>
          </div>


          <div class="row mb-3">
            <div class="col-2 ">
              <label for="exampleFormControlSelect1" class="form-label col-form-label ">Example select</label>
            </div>

            <div class="col-10 ">

              <select name="groupe" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                <option selected >select Groupe Pour ce eleve</option>
                @foreach ($groupes as $item)
                <option {{ $item->id == $eleve->groupe_id ? "Selected" : "" }} value="{{$item->id  }}">{{$item->nom  }} </option>
                @endforeach

              </select>

            </div>

            <p class="text-danger">
              @error('formateur')
              {{$message}}
            @enderror
            </p>
          </div>


          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10 mb-4">
              <button type="submit" class="btn btn-primary">update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
