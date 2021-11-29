@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              
                <div class="card-header">
                    
                <div class="card-body">
                    @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <cetner><p>{{$message}}</p></cetner>
                </div>
                @endif
                @if($message = Session::get('danger'))
                <div class="alert alert-danger" role="alert">
                    <cetner><p>{{$message}}</p></cetner>
                </div>
                @endif
                    
                    <div class="alert alert-success" role="alert">
                        <p> You are logged in as Administrator</p>
                    </div>
                    <img src="images/c3.jpg" style="width: 800px;">
                    <!-- Material unchecked -->
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
