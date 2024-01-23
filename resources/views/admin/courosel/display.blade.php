@extends('admin.admin_master')

 <!-- Header -->

 @section('main')

 <div class="container">

    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1>CRUD</h1>
                    <h2>CELECT - READ - UPDATE - DELETE</h2>
                </div>
                <div class="pull-right" style="margin-bottom:10px;">
                <a class="btn btn-success" href="{{ route('create') }}"> Add New Courosel</a>
                </div>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Details</th>
                <th>Image</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($courosels as $items)
            <tr>
                <td>{{ $items->id}}</td>
                <td>{{ $items->title}}</td>
                <td>{{ $items->details}}</td>
                <td><img src="/images/{{ $items->image }}" width="100px"></td>
                <td>
                    <form action="{{ route('destroy', $items->id)}}" method="POST">
                        <a class="btn btn-primary" href="{{route('edit',$items->id )}}">Edit</a>
                        <a class="btn btn-info" href="show/{{$items->id}}">Show</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

 </div>

 
@endsection





    
       
   