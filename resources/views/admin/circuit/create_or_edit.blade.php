<?php
    if(isset($circuit))
        $mode = 'edit';
    else
        $mode = 'create';

    $actionText = ($mode == 'edit' ? 'Upravit' : 'Vytvořit').' okruh';
?>

@extends('admin.layout.layout')

@section('title', $actionText)

@section('content')
<!-- Default box -->
@if($mode == 'edit')
<form action="{{ route('admin.circuits.update', $circuit) }}" method="post">
@method('patch')
@else
<form action="{{ route('admin.circuits.store') }}" method="post">
@endif
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Obecné</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Název okruhu</label>
                        <input type="text" id="inputName" class="form-control" name="name" value="{{ old('name', $mode == 'edit' ? $circuit->name : null) }}">
                    </div>
                    @if ($errors->has("name"))
                        @foreach ($errors->get("name") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputName">Youtube URL</label>
                        <input type="text" id="inputName" class="form-control" name="youtube" value="{{ old('youtube', $mode == 'edit' ? $circuit->youtube : null) }}">
                    </div>
                    @if ($errors->has("youtube"))
                        @foreach ($errors->get("youtube") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputName">Délka okruhu</label>
                        <input type="text" id="inputName" class="form-control" name="circuit_length" value="{{ old('circuit_length', $mode == 'edit' ? $circuit->circuit_length : null) }}">
                    </div>
                    @if ($errors->has("circuit_length"))
                        @foreach ($errors->get("circuit_length") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Zrušit</a>
            <input type="submit" value="{{ $actionText }}" class="btn btn-success float-right">
        </div>
    </div>
</form>
@endsection
