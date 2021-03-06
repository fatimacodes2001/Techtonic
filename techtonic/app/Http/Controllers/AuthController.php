<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function registerAddr()
    {
        return view('auth.registerAddr');
    }

    function verify(Request $request)
    {
        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
            'select-file' => 'image|mimes:jpeg,png,jpg,gif|max:12048'
        ]);
        $first_name = $request->get('first-name');
        $last_name = $request->get('last-name');
        $image = $request->file('select-file');
        $email = $request->email;
        if ($image) {
            $newpfp = $email . '.' . $image->getClientOriginalExtension();
            $end_path = 'img/' . $email;
            $image->move(public_path($end_path), $newpfp);
        } else {
            $newpfp = 'default_pfp.jpg';
            $end_path = 'img/default_pfp.jpg';
        }

        $request->session()->put('email', $email);
        $request->session()->put('first_name', $first_name);
        $request->session()->put('last_name', $last_name);
        $request->session()->put('password', $request->password);
        $request->session()->put('select_file', $newpfp);



        session(["pass" => Hash::make($request->get('password'))]);


        return redirect()->route('auth.registerAddr')->with(['first_name' => $first_name])->with(['last_name' => $last_name])->with(['email' => $email])->with(['password' => $request->password])->with(['select-file' => $newpfp]);
    }



    function save(Request $request)
    {
        // return $request->input();
        // validating requests
        $request->validate([
            'street-address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postal-code' => 'required|size:6',
        ]);
        $address = new Address;
        $address->street_address = $request->get('street-address');
        $address->country = $request->country;
        $address->city = $request->city;
        $address->postal_code = $request->get('postal-code');
        $save = $address->save();
        if ($save) {

            $user = new User;
            $user->first_name = $request->get('first-name');
            $user->last_name = $request->get('last-name');
            $email = $request->get('email');
            $user->email = $email;
            $user->password = $request->pass;
            $user->address_id = $address->id;




            $newpfp = $request->get('select-file');
            // $user->profile_pic = $request->get('select-file');
            if ($newpfp == 'default_pfp.jpg') {
                $user->profile_pic = '/img' . '/' . $newpfp;
            } else {
                $user->profile_pic = '/img' . '/' . $email . '/' . $newpfp;
            }
            $save_user = $user->save();
            if ($save_user) {
                $request->session()->put('logged_user', $email);

                $cart = new Cart;
                $cart->customer_email = $request->get('email');
                $cart->save();

                session(['email' => $email]);

                return redirect('/');
            } else {
                return back()->with('fail', 'Something did not go well, Kindly try again');
            }
        } else {
            return back()->with('fail', 'Something did not go well, Kindly try again');
        }
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);

        $user_info = User::where('email', '=', $request->email)->first();
        if (!$user_info) {
            return back()->with('fail', 'User with this email does not exist, Kindl-y try again');
        } else {
            $pw = $request->password;
            $hashed = $user_info->password;

            if (Hash::check($pw, $hashed)) {

                session(['email' => $user_info->email]);
                $request->session()->put('logged_user', $user_info->email);

                if ($user_info->is_admin) {
                    session(['is_admin' => true]);
                    return redirect('/admin');
                }

                return redirect('/');
            } else {

                return back()->with('fail', 'Incorrect password, Kindly try again');
            }
        }
    }

    function edit(Request $request)
    {
        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'select-file' => 'image|mimes:jpeg,png,jpg,gif|max:12048'
        ]);

        $user_info = User::where('email', '=', $request->get('current-user'))->first();

        if ($request->get('current-user') != $request->get('email')) {
            $request->validate([
                'email' => 'required|email|unique:users',
            ]);
            $user_info->email = $request->get('email');
        }
        $user_info->first_name = $request->get('first-name');
        $user_info->last_name = $request->get('last-name');

        $image = $request->file('select-file');

        if ($request->password != '' || $request->password_confirmation != '') {
            if (Hash::check($request->get('old-password'), $user_info->password)) {
                $request->validate([
                    'password' => 'required|confirmed|min:6|max:20',
                ]);
                $user_info->password = Hash::make($request->get('password'));
            } else {
                return back()->with('fail', 'Incorrect password, Kindly try again');
            }
        }

        $new_email = $request->get('email');

        if ($image) {
            $newpfp = $new_email . '.' . $image->getClientOriginalExtension();
            $end_path = 'img/' . $new_email;
            $image->move(public_path($end_path), $newpfp);
            if ($user_info->profile_pic != '/img/default_pfp.jpg' && is_file(public_path() . $user_info->profile_pic)) {
                unlink(public_path() . $user_info->profile_pic);
            }
            $user_info->profile_pic = '/img' . '/' . $new_email . '/' . $newpfp;
        }

        $save_user = $user_info->save();

        if ($save_user) {

            session(['email' => $user_info->email]);
            $request->session()->put('logged_user', $user_info->email);
            $mail = $user_info->email;

            $user = User::find($mail);

            $placed = Order::where("status", "=", "Placed")->where("customer_email", "=", session("email"))->get();
            $processing = Order::where("status", "=", "Processing")->where("customer_email", "=", session("email"))->get();
            $shipped = Order::where("status", "=", "Shipped")->where("customer_email", "=", session("email"))->get();
            $delivered = Order::where("status", "=", "Delivered")->where("customer_email", "=", session("email"))->get();
            return view("myaccount", ["user" => $user, "placed" => $placed, "mail" => $mail, "processing" => $processing, "shipped" => $shipped, "delivered" => $delivered]);
        }
    }
}
