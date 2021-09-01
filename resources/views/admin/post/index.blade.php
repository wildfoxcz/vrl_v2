@extends('admin.layout.layout')

@section('title', 'Seznam článků')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Závody</h3>

        <div class="card-tools">

            <a class="btn btn-primary btn-sm" href="{{ url('admin/posts/create') }}">
                <i class="fas fa-folder">
                </i>
                Přidat článek
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 20%">
                    Název článku
                </th>
                <th style="width: 20%">
                    Kategorie
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <td>
                    #{{ $post->id }}
                </td>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    <a>
                        {{ $post->postcategory->name }}
                    </a>
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('posts').'/'.$post->slug }}">
                        <i class="fas fa-folder">
                        </i>
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.posts.edit', $post) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Upravit
                    </a>
<!--                    <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>-->
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
