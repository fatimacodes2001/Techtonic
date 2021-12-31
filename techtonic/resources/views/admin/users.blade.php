@extends('layouts.admin')

@section('title', 'Users')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">Users</h1>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Profile Pic</th>
                <th>Name</th>
                <th>Email</th>
                <th>Street Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Postal Code</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)

                <tr>
                    <td><img width='65px' height='70px' src="{{ $user->profile_pic }}"></td>
                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address->street_address }}</td>
                    <td>{{ $user->address->city }}</td>
                    <td>{{ $user->address->country }}</td>
                    <td>{{ $user->address->postal_code }}</td>
                    <td><a href="">Edit</a> | <a href="">Delete</a</td>
                </tr>  

            @endforeach
                
        </tbody>
    
    </table>
   
@endsection

@section('scripts')
    @parent
@endsection