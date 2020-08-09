<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Faker\Provider\Image;
use Session;

use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function index_admin()
    {

      //  User::where('')
        return view('admin_home');
    }

    public function edit($id)
    {

        $data = User::find($id);
        return view('profileDetail',compact('data'));
    }

    public function update(Request $request,$id){
      // dd($request->all(),$id);
           $data = $request->all();
           $validator = $this->validator( $data,$id);
         //  dd($validator->fails());

           if ($validator->fails()) {
            return redirect()->route('user.profileDetail',$id)
                        ->withErrors($validator)
                        ->withInput();
        }
            $data = User::find($id);
          // Check if a profile image has been uploaded

            $data->email = $request->email;
            $data->address= $request->address;
          if ($request->has('image')) {
            // Get image file
             $image = $request->file('image');
      
             $name = "pro_".$id.'_'.time().".".$image->getClientOriginalExtension();
            //path in database to filePath
            //upload the image
            $image->move(public_path('images'),$name);
            $data->image = $name;
          
        }
        $data->save();
        Session::flash('message', 'User Profile Update Successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        
        return redirect()->route('user.profile',$id);   
    }


    public function show($id)
    {

        $data = User::find($id);
        return view('profile',compact('data'));
    }

    protected function validator(array $data,$id)
    {
        //dd($data);
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            //pName' => 'required|unique:profiles,name,' . ($id ? "$id" : 'NULL') . ',id,organization_id,' . $data['pOrganizationId']];

            'email' => 'required|string|email|max:255|unique:users,email,'. ($id ? "$id" : 'NULL') . ',id',
            'address' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]); 
    }



}
