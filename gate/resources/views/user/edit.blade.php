@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<form class="col-md-12" action="{{ route('user.update', ['id'=>$user->id]) }}" method="post" enctype=" multipart/form-data" >
  @csrf
  <div class="form-group">
  <label for="name">Name:</label>
    <input type="text" class="form-control " name="name" value={{$user->name}}>
  </div>
  <div class="form-group">
  <label for="text">Email:</label>
    <input type="text" class="form-control" name="email"  value={{$user->email}}>
  </div>
 
  <select class="form-control"  style="margin-bottom:20px;"name="roles[]" multiple="multiple">
  
      @foreach($roles as $role)
      <option
          {{$listRoleOfUser->contains($role->id) ? ' selected' : ''}}
                             value="{{$role->id}}">
                    {{$role->display_name}}
    </option>
      @endforeach
      
  </select>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
</div>
</div>

@endsection
