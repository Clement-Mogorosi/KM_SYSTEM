@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                          <nav class="navbar navbar-expand-lg navbar-light bg-success">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="/home">Dashboard</a>
                              </li>
                              <li class="nav-item">
                               <a class="nav-link" href="/parkings">add parking</a> 
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/manageParking">manage parking</a>  
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="/users"><span class="sr-only">(current)</span>add user</a> 

                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="#">edit user</a> 
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#">remove user</a> 
                              </li>
                            </ul>
                           
                          </div>
                        </nav>
                <div class="card-body">
                    
                  {!! Form::model($users, array('route' =>['users.destroy', $users->id], 'method' =>'get')) !!}
                      <div class='form-group'>
                      {!! Form::label('name', 'Name') !!}
                      {!! Form::text('name',$users, ['class'=>'form-control']) !!}
                    </div>

                     <div class='form-group'>
                      {!! Form::label('email', 'Email') !!}
                      {!! Form::text('email','null', ['class'=>'form-control']) !!}
                    </div>
                    
                      <div class='form-group'>
                      {!! Form::button('Delete',['type'=>'submit','class'=>'btn btn-danger']) !!}
                     
                    </div>
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
