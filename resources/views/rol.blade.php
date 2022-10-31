@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Roles</div>
                <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('rolS') }}">
                            Add
                        </a>
                    <br>
                    <br>
                    <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($r) > 0)
                                @foreach ($r as $rol)
                                    <tr>
                                        <th scope="row">{{ $rol->id }}</th>
                                        <td>{{ $rol->name }}</td>
                                        <td>
                                            <a href="rolD/{{$rol->id}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th scope="row" colspan="5">
                                        <div style="text-align: center;">No Record</div>                                    
                                    </th>
                                </tr>                            
                            @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection