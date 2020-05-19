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
          <div class="panel-heading"><h3>Simple Todos Application</h3></div>
          <div class="panel-body">
            <table class="table">
              <tr>
                <th>Name</th>
                <th>Action</th>
              </tr>
              @foreach($todo_items as $todo_item)
                <tr>
                  <td><a href="/todos/{{$todo_item['id']}}">{{$todo_item->name}}</a></td>
                  <td>
                    <a href="/todos/{{$todo_item['id']}}/edit"><button style="float: left; margin-right: 25px;" class="btn btn-outline-primary btn-sm"><small>Edit</small></button></a> |
                    <form action="/todos/{{$todo_item->id}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-outline-danger btn-sm" style="margin-left: 30px; margin-top: -45px;"><small>Delete</small></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    <a href="{{Route('todos.create')}}"><button type="button" style="margin-top: 20px" class="btn btn-primary">Add Todo Item</button></a>
  </div>

@endsection