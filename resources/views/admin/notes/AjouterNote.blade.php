@extends('layouts.contentNavbarLayout')

@section('title', 'Ajouter note')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Ajouter note</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Ajouter note</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.note') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">étudiant</label>
                            <div class="col-10 ">

                              <select name="eleve" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected >------------- select eleve -------------</option>
                                @foreach ($eleves as $item)
                                <option value="{{$item->id  }}">{{$item->nom  }} {{$item->prenom  }}  </option>
                                @endforeach

                              </select>
                              <p class="text-danger">
                                @error('eleve')
                                {{$message}}
                              @enderror
                              </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">module</label>
                            <div class="col-10 ">

                              <select name="module" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected >------------- select Module -------------</option>
                                @foreach ($modules as $item)
                                <option value="{{$item->id  }}">{{$item->nom  }} </option>
                                @endforeach

                              </select>
                              <p class="text-danger">
                                @error('module')
                                {{$message}}
                              @enderror
                              </p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Note</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="fa-solid fa-book"></i></span>
                                    <input name="note" type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="20" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" />
                                </div>
                                <p class="text-danger">
                                  @error('note')
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
