@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Config Permissions</div>
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
                                            <a href="configPE/{{$user->id}}" class="btn btn-danger">Add Permissions</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="5">
                                        <div style="text-align: center;">all role have permissions</div>                                    
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
                                <th scope="col">Permissions</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($u) > 0)
                                @foreach ($u as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if (count($user->permiso) > 0)
                                                @foreach ($user->permiso as $up)  
                                                    <a href="#" class="btn btn-info">{{ $up->name }}</a>
                                                @endforeach
                                            @else 
                                                no tiene permiso
                                            @endif                                                                                         
                                        </td>
                                        <td>
                                            <a href="configPE/{{$user->id}}" class="btn btn-danger">Change Permissions</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="5">
                                        <div style="text-align: center;">roles do not have permissions assigned</div>                                    
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