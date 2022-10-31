@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Config Roles</div>
                <div class="card-body">
                <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="configRE/{{$user->id}}" class="btn btn-danger">Add Rol</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="5">
                                        <div style="text-align: center;">all users have role</div>                                    
                                    </th>
                                </tr>                            
                            @endif
                        </tbody>
                    </table>

                    <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($u) > 0)
                                @foreach ($u as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->rol }}</td>
                                        <td>
                                            <a href="configRE/{{$user->id}}" class="btn btn-danger">Change Rol</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="5">
                                        <div style="text-align: center;">none of the users have an assigned role</div>                                    
                                    </th>
                                </tr>                            
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection