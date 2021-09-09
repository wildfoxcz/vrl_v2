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
        <form action="{{ route('admin.circuits.update', $circuit) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @else
                <form action="{{ route('admin.circuits.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="image">Logo okruhu</label>
                                        @if($mode == 'edit')
                                            <a target="_blank" href="{{ url('images/circuits_logos') }}/{{ old('logo', $mode == 'edit' ? $circuit->logo : null) }}">(zobrazit aktuální)</a>
                                        @else
                                        @endif
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="logo" name="logo">
                                                <label class="custom-file-label" for="exampleInputFile">vyberte soubor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Mapa okruhu</label>
                                        @if($mode == 'edit')
                                            <a target="_blank" href="{{ url('images/minimaps') }}/{{ old('minimap', $mode == 'edit' ? $circuit->minimap : null) }}">(zobrazit aktuální)</a>
                                        @else
                                        @endif
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="minimap" name="minimap">
                                                <label class="custom-file-label" for="exampleInputFile">vyberte soubor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Obrázek okruhu</label>
                                        @if($mode == 'edit')
                                            <a target="_blank" href="{{ url('images/circuits_logos') }}/{{ old('logo', $mode == 'edit' ? $circuit->logo : null) }}">(zobrazit aktuální)</a>
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
                                        <label for="inputDescription">Popis okruhu</label>
                                        <textarea id="inputDescription" class="ckeditor form-control" rows="3" name="description">{{ old('description', $mode == 'edit' ? $circuit->description : null) }}</textarea>
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
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ostatní informace</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputStatus">Lokalita</label>
                                        <select id="inputStatus" class="form-control custom-select" name="country">
                                            <option value="">Vybrat</option>
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->country_code}}"
                                                    {{ old('country', $mode == 'edit' ? $circuit->country : null) == $country->country_code ? 'selected' : '' }}
                                                >{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has("country"))
                                        @foreach ($errors->get("country") as $error)
                                            <div class="errorMessage">
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
                                    <div class="form-group">
                                        <label for="inputName">Počet zatáček</label>
                                        <input type="text" id="inputName" class="form-control" name="turns" value="{{ old('turns', $mode == 'edit' ? $circuit->turns : null) }}">
                                    </div>
                                    @if ($errors->has("turns"))
                                        @foreach ($errors->get("turns") as $error)
                                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="inputName">Nejrychlejší čas</label>
                                        <textarea id="inputDescription" class="form-control" rows="3" name="fastest_time">{{ old('fastest_time', $mode == 'edit' ? $circuit->fastest_time : null) }}</textarea>
                                    </div>
                                    @if ($errors->has("fastest_time"))
                                        @foreach ($errors->get("fastest_time") as $error)
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
