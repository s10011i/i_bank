@extends('layouts.main')

@section('title','Todos Page')   

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
          <div class="alert alert-success">
            {{Session::get('message')}}
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading"><h3>Individual Todo Item</h3></div>
          <div class="panel-body">
            <h3>{{$todo->name}}</h3>
            <p>{{$todo->description}}</p>
          </div>
        </div>
      </div>
    </div>
    <a href="/admin"><button type="button" style="float: right; margin-left: 25px; margin-top: 20px" class="btn btn-secondary">Back</button></a>
  </div>

@endsection