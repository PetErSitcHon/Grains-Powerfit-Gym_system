@extends('admin.admin_master')

@section('main')

<br>

@foreach($about as $items)
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">First Paragraph</h5>
        <p class="card-text">{{$items->content}}</p>
        <a href="{{ route('display.about')}}"class="btn btn-primary">Show Data</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Second Paragraph</h5>
        <p class="card-text">{{$items->content2}}</p>
        <a href="{{ route('display.about')}}"class="btn btn-primary">Show Data</a>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Vision</h5>
        <p class="card-text">{{$items->vision}}</p>
        <a href="{{ route('display.about')}}"class="btn btn-primary">Show Data</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Mission</h5>
        <p class="card-text">{{$items->mission}}</p>
        <a href="{{ route('display.about')}}"class="btn btn-primary">Show Data</a>
      </div>
    </div>
  </div>
</div>
@endforeach


@endsection