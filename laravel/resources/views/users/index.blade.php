@extends('layouts.default')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Users list</h1>
            </div>
            <div class="col-sm-auto">
                <a href="{{route('users.create')}}" class="btn btn-dark">ADD NEW USER</a>
            </div>
            <div class="col-12">
                @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Company</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{isset($user->company->name) ? $user->company->name : ''}}</td>
                            <td><a href="{{route('users.edit', ['user' => $user])}}" class="btn btn-link">Edit</a>|<form action="{{route('users.delete', ['user' => $user])}}" method="post" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection