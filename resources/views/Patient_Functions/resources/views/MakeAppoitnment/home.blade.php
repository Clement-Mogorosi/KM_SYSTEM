@extends('layouts.userDashboard')

@section('content')

      <div class="row justify-content-center" style="max-width:1350px">

        <div class="col-md-10">

            <div class="card justify-content-center" >
                         <nav class="navbar navbar-expand-lg navbar-light bg-success">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                               <a class="nav-link" href="/parkings">My Booking</a> 
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/manageParking">Make bookings</a> 
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="/users">Check Status</a> 

                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="#">edit</a> 
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#">remove</a> 
                              </li>
                            </ul>
                           
                          </div>
                        </nav>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="alert alert-success" role="alert">
                        <p> You are logged in as Staff</p>
                    </div>
                </div>
                <div class="container">
                <div class="row">
                <div class="card col-3 ">
                   
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                               <a class="nav-link" href="/parkings">add parking</a> 
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/manageParking">manage parking</a> 
                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="/users">add user</a> 

                              </li>
                              
                              <li class="nav-item">
                                <a class="nav-link" href="#">edit user</a> 
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="#">remove user</a> 
                              </li>
                            </ul>
                 </div>
                <div class="card col-6">
                  <form name="form1" id="check" method="post" action="home.php">

                    @foreach($users as $user)
                          @foreach($parking as $row)
                            <?php 
                              $id = $row['parking_id'];
                              if($id=$user['parking_id']){
                                $t_rows = $row['totalRows'];
                                $t_cols = $row['totalColumns'];
                                $crtable = '';
                                $crform = '';
                                        
                                $crtable .= '<table border="1">';
                                for ($i = 0; $i <$t_rows; $i++) {
                                  $crtable .= '<tr>';
                                  for ($j = 0; $j < $t_cols; $j++) {
                                    $crtable .= '<td width="50">';
                                    $crtable .= '<form name="form1" method="post" action="home.php">';
                                     $crtable .= "<input type='checkbox' name='ckb' value='1' onclick='chkcontrol(0)';> Value = 5";
                                     //'check';
                                    $crtable .= '</form>';
                                    $crtable .= '<script type="text/javascript">';
                                  
                                    $crtable .= '</script>';
                                    $crtable .= '</td>';
                                    
                                  }
                                  $crtable .= '</tr>';
                                }
                                $crtable .= '</table>';
                                $crtable .= '<div id=msg></div>';
                                break;
                      }

                      ?>
                            @endforeach
                    @endforeach
                    </form>
                        <?php
                          echo "$crtable";
                        ?>

<script type="text/javascript">
function chkcontrol(j) {
//var total=0;
if(typeof chkcontrol.total == 'undefined'){
  chkcontrol.total = 0;
}
for(var i=0; i < document.form1.ckb.length; i++){
if(document.form1.ckb[i].checked){
total =total +1;}
if(total > 3){
alert("Please Select only three") 
document.form1.ckb[j].checked = false ;
return false;
}
}
} </script>

     </div>
                    <div class="card col-3">
                    <ul class="nav flex-column ">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li>
                    </ul>

                 </div>
             </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
