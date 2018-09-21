@extends('layouts.master')

@section('content')
@include('includes.message-block')
<div class="row">
    <div class="col">
        <h3>Add Trip</h3>
    <form action="{{ route('flight')}}" method="POST">
            <div class="form-group">
            <input type="text" class="form-control" name="airport" id="airport" />
        </div>
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button type="submit" class="btn btn-primary">Add Flight</button>
        </form>
    </div>
</div>



<div class="card" style="width: 18rem;">
    <div class="card-header">
        <p>{{ $trip->name }}</p>
        <div>{{ $trip->updated_at }}</div>
    </div>
    <ul class="list-group list-group-flush">
      @foreach($trip->flights as $f)
      <li class="list-group-item"> {{$f->airport}} <a class="btn btn-primary">X</a></li>
      @endforeach
    </ul>
  </div>


      @endsection
{{-- 
      @section('scripts')
<script>
    var token = '{{ Session::token() }}'
    var url = '{{ route('edit') }}'
    var urlLike = '{{ route('like') }}'
    var postId = 0;
    var postBodyElement = null;
</script>

      @endsection --}}