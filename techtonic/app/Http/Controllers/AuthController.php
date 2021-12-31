<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;
class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function registerAddr(){
        return view('auth.registerAddr');
    }

    function verify(Request $request){
        $request->validate([
            'first-name'=>'required',
            'last-name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6|max:20',
            'select-file'=>'image|mimes:jpeg,png,jpg,gif|max:12048'
        ]);
        $first_name = $request->get('first-name');
        $last_name = $request->get('last-name');
        $image = $request->file('select-file');
        $email = $request->email;
        $newpfp = $email.'.'.$image->getClientOriginalExtension();
        $end_path = 'img/'.$email;
        $image->move(public_path($end_path),$newpfp);
        $password = Hash::make($request->password);

      
        return redirect()->route( 'auth.registerAddr' )->with( [ 'first_name' => $first_name ] )->with( [ 'last_name' => $last_name ] )->with( [ 'email' => $email ] )->with( [ 'password' => $password ] )->with(['select-file'=>$newpfp]);

    }

    function save(Request $request){
        // return $request->input();
        // validating requests
        $request->validate([
            'street-address'=>'required',
            'country'=>'required',
            'city'=>'required',
            'postal-code'=>'required|size:6',
        ]);
        $address = new Address;
        $address->street_address = $request->get('street-address');
        $address->country = $request->country;
        $address->city = $request->city;
        $address->postal_code = $request->get('postal-code');
        $save = $address->save();
        if($save){
            
            $user = new User;
            $user->first_name = $request->get('first-name');
            $user->last_name = $request->get('last-name');
            $email = $request->get('email');
            $user->email = $email;
            $user->password = Hash::make($request->get('password'));
            $user->address_id = $address->id;

            
            
            
            $newpfp = $request->get('select-file');
            // $user->profile_pic = $request->get('select-file');
            $user->profile_pic = '/img'.'/'.$email.'/'.$newpfp;
            $save_user = $user->save();
            if($save_user){
                return back()->with('success','New user created, Welcome');
                
            }else{
                return back()->with('fail','Something did not go well, Kindly try again');
            }            
        }else{
            return back()->with('fail','Something did not go well, Kindly try again');
        }
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:20',
        ]);

        $user_info = User::where('email','=',$request->email)->first();
        if(!$user_info){
            return back()->with('fail','User with this email does not exist, Kindlly try again');
        }else{
            if(Hash::check($request->password,$user_info->password)){
                $request->session()->put('logged_user',$user_info->email);
                return redirect('/home');
            }else{
                return back()->with('fail','Incorrect password, Kindlly try again');
            }
        }

    }
}
