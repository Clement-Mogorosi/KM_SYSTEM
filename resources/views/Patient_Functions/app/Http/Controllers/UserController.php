<?php

namespace App\Http\Controllers;
use App\users;
use App\User;
use App\consultations;
use App\newsfeeds;
use Auth;
use Illuminate\Http\Request;
//use App\Http\Controllers\Session; 
use Illuminate\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.create'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $request)
    {
        $this-> Validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        
        //start of the add free consultation script
        $check = $data['check'];
        $check_news = $data['news_delete'];
        $topic = $data['topic'];
        $user_role = $data['user_role'];
        //dd("we here!");

        if ($user_role =="patient") {
            //start of add user script

            //dd("here1");
            $users = new users([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'user_role' => $data['user_role'],
            //'balance' => 0,
            'password' => Hash::make($data['password'])]);

              
               if ($data['password'] == $data['con_password']) {
                    // dd("chere");
                    $users ->save();
                    return redirect()->back()->with('success','The account was successfully created...');
               }
               else{
              
                    return redirect()->back()->with('danger','Error occured! The password and confirm password should match.');
               }
              
            
        }
        //check if the delete newsfeed has been provoked
         if ($check_news =="true") {
            //dd($news_id);
            DB::table('newsfeeds')->where('topic',$topic)->delete();
            return redirect()->back()->with('success','The newsfeed has been deleted successfully!');
        }

      

        $status = $data['status'];
        $id = $data['id'];

        //delete received consultationn text
        if ($status =="delete") {
            if (Auth::user()->role =="staff") {
                return redirect()->back()->with('danger','You do not have rights to perform the action!');
            } else {
                 DB::table('consultations')->where('id',$id)->delete();
                 return redirect()->back()->with('success','Consultation has been deleted successfully!');
            }
            
            
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
    public function edit( $id)
    {
        $users = DB::select('select * from users where id=?',[$id]);
        return view('users.edit', ['users'=>$users]);
    
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
        $name = $request->get('name');
        $email = $request->get('email');

        $users = DB::update('update users set name=?, email=? where id=?',[$name,$email,$id]);

        if($users){
            $movePage = redirect('ManageUser.manageUser')->with('success','User has been updated');
        }else{
            $movePage = redirect('edit'.$id)->with('danger','Error update in updating, Please try again'); 
        }
            return $movePage;
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       //
    }
   }

