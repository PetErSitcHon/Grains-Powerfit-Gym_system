@extends('admin.admin_master')
<br><br><br><br>
 <!-- Header -->
    <div class="container">
            @foreach($data as $items)
            <div class="card text-center">
        <div class="card-header">
        <h5 class="card-title">First Paragraph</h5>
        
        </div>
        <div class="card-body">
            <p class="card-text">{{$items->content}}</p>  
        </div>
        <div class="card-footer text-muted">
        <a href="/update/{{$items->id}}" Class="btn btn-success">update</a>
        </div>
        </div>
        <br><br>
        <div class="card text-center">
        <div class="card-header">
        <h5 class="card-title">Second Paragraph</h5>
        
        </div>
        <div class="card-body">
            <p class="card-text">{{$items->content2}}</p>
        </div>
        <div class="card-footer text-muted">
        <a href="/update/{{$items->id}}" Class="btn btn-success">update</a>
        </div>

        <br><br>
        <div class="card text-center">
        <div class="card-header">
            <strong>MISSION</strong>
        
        </div>
        <div class="card-body">
            <p class="card-text">{{$items->mission}}</p>
        
        </div>
        <div class="card-footer text-muted">
        <a href="/update/{{$items->id}}" Class="btn btn-success">update</a>
        </div>

        <br><br>
        <div class="card text-center">
        <div class="card-header">
            <strong> VISION</strong>
        
        </div>
        <div class="card-body">
            <p class="card-text">{{$items->vision}}</p>
        
        </div>
        <div class="card-footer text-muted">
        <a href="/update/{{$items->id}}" Class="btn btn-success">update</a>
        </div>

        
        </div>
        <br><br>
 
@endforeach
<a href="{{ route('about.add')}}" class="btn btn-primary">BACK</a>
    </div>
   
       
    </div>

    
       
   