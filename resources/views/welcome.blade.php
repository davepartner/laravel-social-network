@extends('layouts.master')

    @section('title')
        Welcome blade
    @endsection

    @section('content')
        <div class="row">
                <!-- /resources/views/post/create.blade.php -->


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-12">
            <h2>Sign up</h2>

              <form method="post" action="/signup">
              {{csrf_field()}}
                <div class="form-group ">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group ">
                  <label for="fullname">Full Name</label>
                  <input type="text" class="form-control" name="fullname" placeholder="Full name" value="{{Request::old('fullname')}}">
                </div>
                <div class="form-group">
                  <label for="email">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-default">Sign up</button>
              </form>
            </div>

            <div class="col-md-6 col-xs-12 col-lg-6 col-sm-12">
            <h2>Sign in</h2>
              <form  method="post" action="/signin">
               {{csrf_field()}}
                <div class="form-group  ">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-default">Sign in</button>
              </form>
            </div>
        </div>
    @endsection