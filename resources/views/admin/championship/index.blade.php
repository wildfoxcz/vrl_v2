@extends('admin.layout.layout')

@section('title', 'Seznam šampionátů')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Šampionáty</h3>

        <div class="card-tools">
            <a class="btn btn-primary btn-sm" href="{{ url('admin/championship/create') }}">
                Přidat šampionát
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
                    Název šampionátu
                </th>
                <th style="width: 20%">
                    Slug
                </th>
                <th style="width: 20%">
                    Status
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($championships as $championship)
            <tr>
                <td>
                    #{{ $championship->id }}
                </td>
                <td>
                    {{ $championship->name }}
                </td>
                <td>
                    <a>
                        {{ $championship->slug }}
                    </a>
                </td>
                <td>
                    <a>
                        @if($championship->is_active == "1")
                            Aktivní
                        @else
                            Neaktivní
                        @endif
                    </a>
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('pages').'/'.$championship->slug }}">
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.championship.edit', $championship) }}">
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
