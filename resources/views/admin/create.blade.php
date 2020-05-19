@extends('layouts.main')

@section('title','Show Room')
    

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading"><h3>Adding Todo Item</h3></div>
          <div class="panel-body">
            <form action="/todos" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Name of the todo item</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                {{-- <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') }}" name="description"> --}}
                <textarea cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') }}" name="description"></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Add</button>
            </form>
            <a href="/admin"><button type="button" style="float: right; margin-left: 25px; margin-top: 20px" class="btn btn-secondary">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

