@extends('layouts.default')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Edit {{$company->name}}</h1>
            </div>
            <div class="col-sm-auto">
                <a href="{{route('companies.index')}}" class="btn btn-dark">CANCEL</a>
            </div>
            <div class="col-12">
                
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{route('companies.update', ['company' => $company])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$company->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$company->email}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-1">
                        <label for="logo" class="form-label">Logo</label>
                    </div>
                    <div class="mb-3">
                        <img src="{{asset('storage/'. $company->logo)}}" class="img-fluid mb-2" width="200" alt="Current image">
                        <input type="file" name="logo" class="form-control" id="logo">
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" name="website" class="form-control" id="website" value="{{$company->website}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection