@extends('layouts.app')
<style>
    .alert-danger {
    margin-top: 7px !important;
  }
</style>
@section('content')
<div class="container">
    <div class="row">
<form class="col-md-12" method="post" action="">
  @csrf
  <div class="form-group">
  <label for="name">Name:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Enter Name">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
  <label for="text">Email:</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Enter Email: 'abc@gmail.com'">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Enter Password">
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
  <div class="form-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"name="confirm_password"  placeholder="Confirm Password">
    @error('confirm_password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <select class="form-control "  style="margin-bottom:20px;"name="roles[]" multiple="multiple">
  
      @foreach($roles as $role)
      <option value="{{$role->id}}">{{$role->display_name}}</option>
      @endforeach
      
  </select>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
</div>
</div>

@endsection
