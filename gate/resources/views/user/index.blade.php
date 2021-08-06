@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <a class="btn btn-success float-right" style="margin-bottom:20px" href="{{route('user.add')}}" role="button">Thêm</a>
        </div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($listUser as $user)
    <tr> 
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        <a class="btn btn-primary" href="{{route('user.edit',['id'=>$user->id])}}">Sửa</a>
        <a class="btn btn-danger" href="">Xóa</a>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
<div class="col-sm-12">
{{ $listUser->onEachSide(5)->links() }}
</div>
</div>
</div>
@endsection
