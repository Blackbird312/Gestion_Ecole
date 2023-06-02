@props(['type' , "slot"])



<div class="w-50 mx-auto text-center alert alert-{{$type}} alert-dismissible" role="alert">
   <h5 class="p-2 m-0">{{ $slot }}</h5>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
</div>
