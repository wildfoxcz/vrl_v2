<?php
if(isset($post))
    $mode = 'edit';
else
    $mode = 'create';

$actionText = ($mode == 'edit' ? 'Upravit' : 'Vytvořit').' článek';
?>

@extends('admin.layout.layout')

@section('title', $actionText)

@section('content')
    <!-- Default box -->
    @if($mode == 'edit')
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
            @method('patch')
            @else
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
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

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Název článku</label>
                                        <input type="text" id="inputName" class="form-control" name="title" value="{{ old('title', $mode == 'edit' ? $post->title : null) }}">
                                    </div>
                                    @if ($errors->has("title"))
                                        @foreach ($errors->get("title") as $error)
                                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="image">Obrázek</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="exampleInputFile">vyberte soubor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Kategorie</label>
                                        <select id="inputStatus" class="form-control custom-select" name="category_id">
                                            <option value="">Vybrat</option>
                                            @foreach($postcategories as $postcategory)
                                                <option
                                                    value="{{$postcategory->id}}"
                                                    {{ old('category_id', $mode == 'edit' ? $post->category_id : null) == $postcategory->id ? 'selected' : '' }}
                                                >{{$postcategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has("category_id"))
                                        @foreach ($errors->get("category_id") as $error)
                                            <div class="errorMessage">
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="inputDescription">Stručný popis</label>
                                        <textarea id="inputDescription" class="form-control" rows="4" name="short_desc">{{ old('short_desc', $mode == 'edit' ? $post->short_desc : null) }}</textarea>
                                    </div>
                                    @if ($errors->has("short_desc"))
                                        @foreach ($errors->get("short_desc") as $error)
                                            <div class="errorMessage">
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="inputDescription">Celý text</label>
                                        <textarea id="inputDescription" class="ckeditor form-control" rows="4" name="long_desc">{{ old('long_desc', $mode == 'edit' ? $post->long_desc : null) }}</textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('long_desc', {
                                                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                                                filebrowserUploadMethod: 'form'
                                            });
                                        </script>
                                    </div>
                                    @if ($errors->has("long_desc"))
                                        @foreach ($errors->get("long_desc") as $error)
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
                                    <h3 class="card-title">Základní informace</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Stávající obrázek</label>
                                        <div class="input-group">
                                            <img src="{{ url('images/posts')}}/{{ old('image', $mode == 'edit' ? $post->image : null) }}" alt="">
                                        </div>
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

