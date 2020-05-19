@extends('layouts.main')

@section('title','Todos Page')   

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        
        <div class="panel panel-default">
          <div class="panel-heading"><h3>Edit Todo Item</h3></div>
          <div class="panel-body">
            <form action="/todos/{{$todo['id']}}" method="post">  
        {{-- @method('DELETE')
            @csrf --}}
                {{method_field('PATCH')}}
                {{csrf_field()}}
                <div class="field">
                    <label for="name" class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" name="name" value="{{$todo['name']}}"> 
                    </div>
                </div>
                <div class="field">
                    <label for="description" class="label">Description</label>
                    <div class="control">
                        <textarea name="description" id="" cols="35" rows="7">{{$todo['description']}}</textarea> 
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="btn btn-secondary is-link">Update</button>
                    </div>
                </div> 
            </form>

          </div>
        </div>
      </div>
    </div>
    <a href="/admin"><button type="button" style="float: right; margin-left: 25px; margin-top: 20px" class="btn btn-secondary">Back</button></a>
  </div>

@endsection