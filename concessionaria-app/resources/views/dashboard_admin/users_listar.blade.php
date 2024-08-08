@extends('dashboard_admin.layouts.dashboard')


@section('content')
  

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0">
        <h5 class="card-title">Usuários</h5>
        <hr>
    </div>    
    <div class="card-body">

        <div class="table-responsive">
          
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection