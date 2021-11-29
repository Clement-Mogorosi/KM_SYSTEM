@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="/home" style="color:white;">Dashboard<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                               <a class="nav-link" href="/feeds.feeds" style="color:white;">Add Feeds</a> 
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/ManageUser.manageFeeds" style="color:white;">Manage Feeds</a> 
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="/users" style="color:white;">Add User</a> 

                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="/ManageUser.manageUser" style="color:white;">Manage User</a> 
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="/manageBooking" style="color:white;">Received Docs</a> 
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="/ContactUs.view" style="color:white;">Alerts</a> 
                              </li>
                             
                            </ul>
                           
                          </div>
                        </nav>

                <div class="card-body">

                @foreach($users as $row)
                            <h1>Edit User</h1>
                            <form action="{{action('UserController@update', $row->id)}}" method="POST" class="container justify-content-center">
                                @csrf
                                @method('PUT')
                                <div class="container justify-content-center">
                                <div class="row">
                                <div class="co-lmd-6">
                                <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>

                                <input type="text" name="name" id="name" class="form-control" value="{{ $row ->name }}">
                                </div>
                                </div>

                                <div class="row">
                                <div class="co-lmd-6">
                                <label for="email" class="col-md-6 col-form-label text-md-right"autofocus>{{ __('Email') }}</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $row ->email }}">
                                </div>
                                </div>

                              <div class="form-group row mb-0">
                               <div class="col-md-6 offset-md-4">
                                <input type="submit" id="Register" value="Update" class="btn btn-primary"/>
                              </div>
                             </div></div>
                            </form>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
