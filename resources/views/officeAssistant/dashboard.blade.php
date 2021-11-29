@extends('layouts.master')

@section('title')
    Dashboard | Office Assistant
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Task Manager</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th> Name</th>
                <th> Country</th>
                <th>City</th>
                <th class="text-right">Salary</th>
              </thead>
              <tbody>
                <tr>
                  <td> Dakota Rice</td>
                  <td>Niger </td>
                  <td>Oud-Turnhout</td>
                  <td class="text-right">$36,738</td>
                </tr>
                <tr>
                  <td> Jon Porter</td>
                  <td>   Portugal</td>
                  <td>Gloucester </td>
                  <td class="text-right"> $98,615</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
    
@endsection

@section('scripts')
    
@endsection