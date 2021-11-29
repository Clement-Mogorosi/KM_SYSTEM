<?php

namespace App\Http\Controllers;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Requests\UserRequest;
//use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = DB::select('select * FROM users ORDER BY id ASC');
        //dd($users);
        return view('ManageUser.manageUser',compact(array('users')));
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
    public function store(UserRequest $request)
    {
            //
    }
      public function search(Request $request)
    {
            $search = $request->get('search');
            $users = DB::table('users')->where('name', 'like', '%'.$users.'%') ->pagination(5);
            return view('index', ['users'=>$users]);
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
    public function edit(users $id)
    {
       //$users = DB::select('select * from users where id=?',[$id]);
      // return view('edit', ['users'=>$users]);
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
        
        $id = $request->keys();
        foreach ($id as $ids => $x) {
            DB::table('users')->where('id',$x)->delete();
            return redirect('ManageUser.manageUser')->with('success','User has been deleted');
         }
        
     }

}
