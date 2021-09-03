@extends('admin.layout.layout')

@section('title', 'Články')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Seznam článků</h3>

        <div class="card-tools">

            <a class="btn btn-primary btn-sm" href="{{ url('admin/posts/create') }}">
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
                <th style="width: 10%">
                    Kategorie
                </th>
                <th style="width:10%">
                    Vytvořeno
                </th>
                <th style="width: 20%">
                    Slug
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
                        {{ $post->postcategories->name }}
                    </a>
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y h:m') }}
                </td>
                <td>
                    {{ $post->slug }}
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('posts').'/'.$post->slug }}">
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.posts.edit', $post) }}">
                        Upravit
                    </a>
               <a class="btn btn-danger btn-sm" href="#">
                        Smazat
                    </a>
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
