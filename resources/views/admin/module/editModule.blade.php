@extends('layouts.contentNavbarLayout')

@section('title' , "edit module")

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> edit module</h4>




<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">edit module</h5>
      </div>
      <div class="card-body">
        <form action="{{ route("upadate.module" , $module->id)}}" method="POST">
          @csrf
          @method("put")
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nom</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-brands fa-python"></i></span>
                <input value="{{ $module->nom }}" name="nom" type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Python" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />

              </div>
              <p class="text-danger">
                @error('nom')
                {{$message}}
              @enderror
              </p>

            </div>
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Coefficient</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-book"></i></span>
                <input value="{{ $module->coef }}" name="cof" type="text" class="form-control" id="basic-icon-default-fullname" placeholder="3" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />

              </div>
              <p class="text-danger">
                @error('cof')
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

              <select name="formateur" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                @foreach ($formateurs as $item)
                <option {{ $item->id == $module->formateur_id ? "Selected" : "" }}  value="{{$item->id  }}">{{$item->nom  }} --  {{$item->prenom  }}</option>
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
