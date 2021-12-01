@extends('layouts.master')


@section('title')
        Dashboard | Administration
@endsection



@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Doctor Table </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>FullName</th>
                      <th>DoctorID</th>
                      <th>Speciality</th>
                      <th>City</th>
                      <th>PostalCode</th>
                      <th>Contact</th>
                      <th>Email</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Clement Mogorosi</td>
                        <td>201701505</td>
                        <td>Neurosurgeon</td>
                        <td>Gaborone, Botswana</td>
                        <td>P O Box 943 Tonota, Botswana</td>
                        <td>+26772156909</td>
                        <td>clementmogorosi7@gmail.com</td>
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
