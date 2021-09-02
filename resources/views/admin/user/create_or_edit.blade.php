<?php
    if(isset($page))
        $mode = 'edit';
    else
        $mode = 'create';

    $actionText = ($mode == 'edit' ? 'Upravit' : 'Vytvořit').' stránku';
?>

@extends('admin.layout.layout')

@section('title', $actionText)

@section('content')
<!-- Default box -->
@if($mode == 'edit')
<form action="{{ route('admin.pages.update', $page) }}" method="post">
@method('patch')
@else
<form action="{{ route('admin.pages.store') }}" method="post">
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
                        <label for="inputName">Název stránky</label>
                        <input type="text" id="inputName" class="form-control" name="title" value="{{ old('title', $mode == 'edit' ? $page->title : null) }}">
                    </div>
                    @if ($errors->has("title"))
                        @foreach ($errors->get("title") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputDescription">Obsah stránky</label>
                        <textarea id="inputDescription" class="ckeditor form-control" rows="4" name="content">{{ old('content', $mode == 'edit' ? $page->content : null) }}</textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('content', {
                                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form'
                            });
                        </script>
                       </div>
                    @if ($errors->has("content"))
                        @foreach ($errors->get("content") as $error)
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
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Zrušit</a>
            <input type="submit" value="{{ $actionText }}" class="btn btn-success float-right">
        </div>
    </div>
</form>
@endsection
