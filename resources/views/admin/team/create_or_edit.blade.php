<?php
if(isset($team))
    $mode = 'edit';
else
    $mode = 'create';

$actionText = ($mode == 'edit' ? 'Upravit' : 'Vytvořit').' tým';
?>

@extends('admin.layout.layout')

@section('title', $actionText)

@section('content')
    <!-- Default box -->
    @if($mode == 'edit')
        <form action="{{ route('admin.teams.update', $team) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @else
                <form action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Základní informace</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>
                                {{ $errors }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Název týmu</label>
                                        <input type="text" id="inputName" class="form-control" name="name" value="{{ old('name', $mode == 'edit' ? $team->name : null) }}">
                                    </div>
                                    @if ($errors->has("name"))
                                        @foreach ($errors->get("name") as $error)
                                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="image">Obrázek týmu</label>
                                        @if($mode == 'edit')
                                            <a target="_blank" href="{{ url('images/teams') }}/{{ old('image', $mode == 'edit' ? $team->image : null) }}">(zobrazit aktuální)</a>
                                        @else
                                        @endif
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="exampleInputFile">vyberte soubor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gametype_id">Hra</label>
                                        <select id="gametype_id" class="form-control custom-select" name="gametype_id">
                                            <option value="">Vybrat</option>
                                            @foreach($gametypes as $gametype)
                                                <option
                                                    value="{{$gametype->id}}"
                                                    {{ old('category_id', $mode == 'edit' ? $team->gametype_id : null) == $gametype->id ? 'selected' : '' }}
                                                >{{$gametype->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has("gametype_id"))
                                        @foreach ($errors->get("gametype_id") as $error)
                                            <div class="errorMessage">
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="description">Popis</label>
                                        <textarea id="description" class="form-control" rows="4" name="description">{{ old('description', $mode == 'edit' ? $team->description : null) }}</textarea>
                                    </div>
                                    @if ($errors->has("description"))
                                        @foreach ($errors->get("description") as $error)
                                            <div class="errorMessage">
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div><div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Doplňující informace</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="max_users">Limitace</label>
                                        <select id="max_users" class="form-control custom-select" name="max_users">
                                            <option value="">Neomezený</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
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

            @section('styles')
                <link rel="stylesheet" href="{{ asset('/css/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.css') }}">
        @endsection

        @section('scripts')
            <!-- InputMask -->
                <script src="{{ asset('/js/moment/moment.min.js') }}"></script>
                <!-- Tempusdominus Bootstrap 4 -->
                <script src="{{ asset('/js/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js') }}"></script>

