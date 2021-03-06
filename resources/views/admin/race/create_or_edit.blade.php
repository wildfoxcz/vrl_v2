<?php
    if(isset($race))
        $mode = 'edit';
    else
        $mode = 'create';

    $actionText = ($mode == 'edit' ? 'Upravit' : 'Vytvořit').' závod';
?>

@extends('admin.layout.layout')

@section('title', $actionText)

@section('content')
<!-- Default box -->
@if($mode == 'edit')
<form action="{{ route('admin.races.update', $race) }}" method="post">
@method('patch')
@else
<form action="{{ route('admin.races.store') }}" method="post">
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
                    {{ $errors }}

                    <div class="form-group">
                        <label for="inputName">Název závodu</label>
                        <input type="text" id="inputName" class="form-control" name="name" value="{{ old('name', $mode == 'edit' ? $race->name : null) }}">
                    </div>
                    @if ($errors->has("name"))
                        @foreach ($errors->get("name") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputDescription">Popis závodu</label>
                        <textarea id="inputDescription" class="ckeditor form-control" rows="4" name="description">{{ old('description', $mode == 'edit' ? $race->description : null) }}</textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('description', {
                                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form'
                            });
                        </script>
                    </div>
                    @if ($errors->has("description"))
                        @foreach ($errors->get("description") as $error)
                            <div class="errorMessage">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputStartTime">Začátek závodu</label>
                        <div class="input-group date" id="startdatetime" data-target-input="nearest">
                            <input type="text"
                                   class="form-control datetimepicker-input"
                                   data-target="#startdatetime"
                                   id="inputStartTime"
                                   name="started_at"
                                   value="{{ old('started_at', $mode == 'edit' ? $race->started_at : null) }}"
                            />
                            <div class="input-group-append" data-target="#startdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                @if ($errors->has("started_at"))
                        @foreach ($errors->get("started_at") as $error)
                            <div class="errorMessage">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif

                    <div class="form-group">
                        <label for="inputStatus">Šampionát</label>
                        <select id="inputStatus" class="form-control custom-select" name="championship_id">
                            <option value="">Vybrat</option>
                            @foreach($championships as $championship)
                                <option
                                    value="{{$championship->id}}"
                                    {{ old('championship_id', $mode == 'edit' ? $race->championship_id : null) == $championship->id ? 'selected' : '' }}
                                >{{$championship->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has("championship_id"))
                        @foreach ($errors->get("championship_id") as $error)
                            <div class="errorMessage">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputStatus">Okruh</label>
                        <select id="inputStatus" class="form-control custom-select" name="circuit_id">
                            <option disabled value="">Vybrat</option>
                            @foreach($circuits as $circuit)
                                <option
                                    value="{{$circuit->id}}"
                                    {{ old('circuit_id', $mode == 'edit' ? $race->circuit_id : null) == $circuit->id ? 'selected' : '' }}
                                >{{$circuit->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has("circuit_id"))
                        @foreach ($errors->get("circuit_id") as $error)
                            <div class="errorMessage">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif

                    @if($mode == 'edit')
                    <table>
                        @foreach($race->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td><input type="number" name="users[{{$user->id}}][points]" value="{{ $user->pivot->points }}" /></td>
                            </tr>
                        @endforeach
                    </table>
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

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.css') }}">
@endsection

@section('scripts')
    <!-- InputMask -->
    <script src="{{ asset('/js/moment/moment.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/js/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    $(function () {
        $('#startdatetime').datetimepicker({
            icons: { time: 'far fa-clock' },
            format: 'YYYY-MM-DD kk:mm:ss'
        });
    });
</script>
@endsection
