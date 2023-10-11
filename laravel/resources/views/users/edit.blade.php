@extends('layouts.default')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit {{$user->first_name}} {{$user->last_name}}</h1>
                
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{route('users.update', ['user' => $user])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" value="{{$user->first_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{$user->last_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$user->email}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
                    </div>
                    <div class="mb-3">
                        <label for="company_id" class="form-label">Company</label>
                        <select name="company_id" class="form-control" id="company_id">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}" {{($company->id == $user->campaign_id) ? 'selected' : ''}}>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection