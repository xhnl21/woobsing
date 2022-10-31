@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Rol
                    <a href="{{ route('configR') }}" class="btn btn-success" style="float: right;">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('configRU') }}">
                        @csrf
                        <div class="col-md-12">
                            <select class="form-control" name="rol" id="rolName">
                                <option>Select Rol</option>
                                @foreach ($r as $item)
                                    <option value="{{ $item->id }}" {{ ( $item->id == $existingRecordId) ? 'selected' : '' }}> {{ $item->name }} </option>
                                @endforeach    
                            </select>
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
