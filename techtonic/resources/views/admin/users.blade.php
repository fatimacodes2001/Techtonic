@extends('layouts.admin')

@section('title', 'Users')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">Users</h1>

    <div class="wrapper">
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
                    <th>Orders</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($users as $user)

                    <tr>
                        <td><img class="img-x-sm" src="{{ $user->profile_pic }}"></td>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address->street_address }}</td>
                        <td>{{ $user->address->city }}</td>
                        <td>{{ $user->address->country }}</td>
                        <td>{{ $user->address->postal_code }}</td>
                        <td>
                            <form class="d-inline" method="POST" action="{{route('admin.users.show')}}">
                                @csrf
                                <input type="eamil" id="email" name="email" value="{{ $user->email }}" hidden>
                                <button class="btn btn-link">View Orders</button>
                            </form>
                        </td>
                     
                    </tr>  

                @empty
                    <div class="alert alert-primary" role="alert">
                        <p class="mb-0">No users have registered yet.</p> 
                    </div>
                @endforelse
                    
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    @parent
@endsection