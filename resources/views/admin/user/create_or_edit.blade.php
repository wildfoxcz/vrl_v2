<?php
    if(isset($user))
        $mode = 'edit';
    else
        $mode = 'create';

    $actionText = ($mode == 'edit' ? 'Upravit' : 'Vytvořit').' uživatele';
?>

@extends('admin.layout.layout')

@section('title', $actionText)

@section('content')
<!-- Default box -->
@if($mode == 'edit')
<form action="{{ route('admin.users.update', $user) }}" method="post">
@method('patch')
@else
<form action="{{ route('admin.useres.store') }}" method="post">
@endif
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Základní informace</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Jméno uživatele</label>
                        <input type="text" id="inputName" class="form-control" name="name" value="{{ old('name', $mode == 'edit' ? $user->name : null) }}">
                    </div>
                    @if ($errors->has("title"))
                        @foreach ($errors->get("title") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputName">E-mail uživatele</label>
                        <input type="text" id="inputName" class="form-control" name="email" value="{{ old('email', $mode == 'edit' ? $user->email : null) }}">
                    </div>
                    @if ($errors->has("email"))
                        @foreach ($errors->get("email") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputName">Heslo uživatele</label>
                        <input type="password" id="inputName" class="form-control" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Heslo uživatele </label><i> &nbsp;(znovu)</i>
                        <input type="password" id="inputName" class="form-control" name="verify_password" value="">
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
