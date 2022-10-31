@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Permissions</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('permisoS') }}">
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
                            @if (count($p) > 0)
                                @foreach ($p as $pr)
                                    <tr>
                                        <th scope="row">{{ $pr->id }}</th>
                                        <td>{{ $pr->name }}</td>
                                        <td>
                                            <a href="permisoD/{{$pr->id}}" class="btn btn-danger">Delete</a>
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