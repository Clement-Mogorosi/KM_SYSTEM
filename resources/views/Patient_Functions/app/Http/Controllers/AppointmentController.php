<?php

namespace App\Http\Controllers;
use App\appointments;
use App\users;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Appointment.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $data)
    {
            
        $appointment_date = [];
          
        $appointment_service = [];
        $appointment_end_time = [];
        $appointment_start_time = [];
        $system_end_time = DB::select("Select NOW()"); 
        //dd($system_end_time);

        $appointment_dates = DB::select('select date FROM appointments ORDER BY id ASC');
        $appointment_statuses = DB::select('select status FROM appointments ORDER BY id ASC');
        
        //$system_end_time =DB::select("select ADDTIME('2017-06-15 09:34:21', '2')");
        $appointment_start_times = DB::select('select start_time FROM appointments ORDER BY id ASC');
        $appointment_services = DB::select('select service FROM appointments ORDER BY id ASC');

        //dd($appointment_end_times);
        
        

        //appointment dates retrieve from db;
        foreach ($appointment_dates as $key => $appointment_date1) {
            foreach ($appointment_date1 as $key => $appointment_date_value) {
                //$appointment_date = $appointment_date_value;
                array_push($appointment_date, $appointment_date_value);
                //array_push($appointment_date, "appointment_date_value");
            }
        }

        //appointment service retrieve from db;
        foreach ($appointment_services as $key => $appointment_services1) {
            foreach ($appointment_services1 as $key => $appointment_service_value) {
                //$appointment_date = $appointment_date_value;
                array_push($appointment_service, $appointment_service_value);
                //array_push($appointment_date, "appointment_date_value");
            }
        }

        //appointment start times retrieve from db;
        foreach ($appointment_start_times as $key => $appointment_start_times1) {
            foreach ($appointment_start_times1 as $key => $appointment_start_time_value) {
                //$appointment_end = DB::select('select ADDTIME($appointment_start_time_value, 3000)');
                array_push($appointment_start_time, $appointment_start_time_value);
                //array_push($appointment_end_time, $appointment_end);
                
            }
        }

        //appointment start times retrieve from db;
        foreach ($appointment_dates as $key => $appointment_dates1) {
            foreach ($appointment_dates1 as $key => $appointment_date_value) {
                //$appointment_end = DB::select('select ADDTIME($appointment_start_time_value, 3000)');
                array_push($appointment_date, $appointment_start_time_value);
                //array_push($appointment_end_time, $appointment_end);
                
            }
        }
        //dd($appointment_end_time);
        //get end time
        //appointment end time ap ends after 30 minutes;
        //$end_time_holder = "";
        for ($i=0; $i < count($appointment_start_time) ; $i++) { 
            //$sDate = date($appointment_start_time[$i],"H:i:s");
            $x = $appointment_start_time[$i];
            $appointment_end = DB::select("select ADDTIME('$x', 3000)");
            foreach ($appointment_end as $key => $value) {
                foreach ($value as $key => $value_1) {
                     //$end_time_holder = $value_1;
                     array_push($appointment_end_time, $value_1);
                }
               
            }
            //$appointment_end = DB::select('select DATE_ADD("$x", INTERVAL 10 MINUTE);');
            //dd($appointment_end_time);
        }
        
       //dd($appointment_end_time);
        $time_now = "";
        $current_times = DB::select("Select current_time()");
        //dd($current_times);
        foreach ($current_times as $key => $current_time) {
            foreach ($current_time as $key => $current_time_value) {
                $time_now = $current_time_value;
            }
        }

        $date_now = "";
        $current_dates = DB::select("Select CURDATE()");
        foreach ($current_dates as $key => $current_date) {
            foreach ($current_date as $key => $current_date_value) {
                $date_now = $current_date_value;
            }
        }
        $service_from_form = $data['service'];
        $start_time_from_form = $data['start_time'];
        $new_ap_end_time ="";
        $new_ap_ends = DB::select("select ADDTIME('$start_time_from_form', 3000)");

        $date_from_form = $data['date'];

        foreach ($new_ap_ends as $key => $new_ap_end) {
            foreach ($new_ap_end as $key => $new_ap_end_value) {
                $new_ap_end_time = $new_ap_end_value;
            }
        }
        //dd($new_ap_end_time);
         $date_counter=0;
         $qp=0;
         for($qp=0;$qp< count($appointment_service);$qp=$qp+1) {          
            //
            $cap =$appointment_service[$qp];
            //dd($cap);
            if ($service_from_form == $cap) {
                 if ($date_from_form<=$date_now) {

                    return redirect()->back()->with('danger','Error !Appointment may not be available for the date selected');

                   
                   
                } elseif($date_from_form>=$date_now) {
                    //loop through the start nd end time if our ap time from form causes clashes error message is returned
                    //dd($appointment_start_time[0]);

                    for ($t=0; $t < count($appointment_date) ; $t++) { 

                        if ($appointment_date[$t] == $date_from_form) {
                          for ($tp=0; $tp < count($appointment_start_time) ; $tp++) { 
                             //dd($new_ap_end_time);
                            if ($new_ap_end_time<=$appointment_end_time[$tp] || $start_time_from_form<=$appointment_end_time[$tp]) {
                                //dd("um in ");
                                if ($new_ap_end_time>$appointment_start_time[$tp] || $start_time_from_form>$appointment_start_time[$tp]) {
                                    //dd("u made it");
                                     return redirect()->back()->with('danger','Error !Time clashes have occured check available slots');
                                            
                                } 
                                
                            }
                            
                        } 
                        //if there is no error then we add the ap
                        $logged_in_user = Auth::user()->email;
                        $appointments = new appointments([
                                'service' => $data['service'],   
                                'start_time' => $data['start_time'],
                                'date' => $data['date'],
                                'date' => $data['date'],
                                'user_email' => $logged_in_user,
                                'description' => $data['description'],
                                ]);
                                $appointments->save();
                                return redirect()->back()->with('success','Appointment has been successfully booked');
                    }
                        
                    }
                    //dd("mama i made");
                    $logged_in_user = Auth::user()->email;
                    $appointments = new appointments([
                            'service' => $data['service'],   
                            'start_time' => $data['start_time'],
                            'date' => $data['date'],
                            'date' => $data['date'],
                            'user_email' => $logged_in_user,
                            'description' => $data['description'],
                            ]);
                            $appointments->save();
                            return redirect()->back()->with('success','Appointment has been successfully booked');
                    
                }
                
            } 
            //dd($service_from_form);       
            $date_counter++;    
                   
        }


                if ($date_from_form<=$date_now) {

                    return redirect()->back()->with('danger','Error !Appointment may not available for the date selected');

                   
                   
                } elseif($date_from_form>=$date_now) {
                   $logged_in_user = Auth::user()->email;
                    $appointments = new appointments([
                    'service' => $data['service'],   
                    'start_time' => $data['start_time'],
                    'date' => $data['date'],
                    'date' => $data['date'],
                    'user_email' => $logged_in_user,
                    'description' => $data['description'],
                    ]);
                    $appointments->save();
                    return redirect()->back()->with('success','Appointment has been successfully booked');
            }                 
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
