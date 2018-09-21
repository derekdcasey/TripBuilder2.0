@extends('layouts.master')

@section('content')
@include('includes.message-block')
<div class="row">
    <div class="col">
        <h3>Add Trip</h3>
    <form action="{{ route('trip.create')}}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" />
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button type="submit" class="btn btn-primary">Create Trip</button>
        </form>
    </div>
</div>


@foreach($trips as $trip)
<div class="card" style="width: 18rem;">
    <div class="card-header">
        <p>{{ $trip->name }}{{ $trip->id }}</p>
        <div>{{ $trip->updated_at }}</div>
    </div>
    <ul class="list-group list-group-flush">
      @foreach($trip->flights() as $f)
      <li class="list-group-item"> {{$f->airport}} <a class="btn">X</a></li>
      @endforeach
    </ul>
  </div>
  @endforeach


      @endsection

