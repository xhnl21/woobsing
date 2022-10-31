@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Permissions
                    <a href="{{ route('configP') }}" class="btn btn-success" style="float: right;">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('configPU') }}">
                        @csrf
                        <div class="col-md-12">                            
                            @foreach ($r as $item)
                                        <br>
                                        <label for="{{ $item->id }}">{{ $item->name }}</label>                                        
                                        <input type="checkbox" name="permiso[]" id="{{ $item->id }}" value="{{ $item->id }}" {{ ( $item->bool) ? 'checked' : '' }}>
                            @endforeach 
                            <input type="hidden" name="id" value="{{ $id }}">
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
