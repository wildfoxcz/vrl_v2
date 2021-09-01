@extends('admin.layout.layout')

@section('title', 'Seznam stránek')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Stránky</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
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
                    Název stránky
                </th>
                <th style="width: 20%">
                    Slug
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
            <tr>
                <td>
                    #{{ $page->id }}
                </td>
                <td>
                    {{ $page->title }}
                </td>
                <td>
                    <a>
                        {{ $page->slug }}
                    </a>
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('pages').'/'.$page->slug }}">
                        <i class="fas fa-folder">
                        </i>
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.pages.edit', $page) }}">
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
