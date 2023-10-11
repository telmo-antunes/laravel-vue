@extends('layouts.default')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Companies list</h1>
            </div>
            <div class="col-sm-auto">
                <a href="{{route('companies.create')}}" class="btn btn-dark">ADD NEW COMPANY</a>
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
                            <th scope="col">Logo</th>
                            <th scope="col">Website</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <th scope="row">{{$company->id}}</th>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td><img src="{{asset('storage/'. $company->logo)}}" class="img-fluid" width="200" alt="{{$company->name}}"></td>
                            <td>{{$company->website}}</td>
                            <td><a href="{{route('companies.edit', ['company' => $company])}}" class="btn btn-link">Edit</a>|<form action="{{route('companies.delete', ['company' => $company])}}" method="post" class="d-inline-block">
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