@extends('admin.admin_master')

@section('main')
<br><br><br>

<div class="container">

@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
<p>{{ session::get('error') }}</p>
</div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
<p>{{ session::get('success') }}</p>
</div>
@endif

<h1>ABOUT US </h1>
    <!-- ABOUT FIRTS PARAGRAPH -->
@foreach ($data as $items )
<form method="POST"  action={{ route('update.about', $items->id )}}>
    @csrf
    @method('PUT')
    <br><br>
<div class="input-group ">
</label><strong class="input-group-text bg-info text-dark">ABOUT</strong></label>
  <textarea class="form-control" name="content" value="content" placeholder="add new">{{$items->content}}</textarea>
  <button type="submit" name="update" class="btn btn-primary">UPDATE</button>

</div>
</form>

<br>
<form method="POST"  action={{ route('update.about1', $items->id )}}>
    @csrf
    @method('PUT')
    <br><br>
<div class="input-group ">
</label><strong class="input-group-text bg-info text-dark">ABOUT</strong></label>
  <textarea class="form-control" name="content2" value="content2" placeholder="add new">{{$items->content2}}</textarea>
  <button type="submit" name="update" class="btn btn-primary">UPDATE</button>

</div>
</form>
<h1>VISION AND MISSION</h1>
<br>

<br>
<form method="POST"  action={{ route('update.vision', $items->id )}}>
    @csrf
    @method('PUT')
    <br><br>
<div class="input-group ">
</label><strong class="input-group-text bg-info text-dark">VISION</strong></label>
  <textarea class="form-control" name="vision" value="vision" placeholder="add new">{{$items->vision}}</textarea>
  <button type="submit" name="update" class="btn btn-primary">UPDATE</button>

</div>
</form>

<br>
<form method="POST"  action={{ route('update.mission', $items->id )}}>
    @csrf
    @method('PUT')
    <br><br>
<div class="input-group ">
</label><strong class="input-group-text bg-info text-dark">MISSION</strong></label>
  <textarea class="form-control" name="mission" value="mission" placeholder="add new">{{$items->mission}}</textarea>
  <button type="submit" name="update" class="btn btn-primary">UPDATE</button>

</div>
</form>


<a href="{{ route('about.add')}}" class="btn btn-primary">BACK</a>
</div>
@endforeach



@endsection
