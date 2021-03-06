@extends('admin.layout.layout')

@section('title', 'Seznam závodů')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Závody</h3>

        <div class="card-tools">

            <a class="btn btn-primary btn-sm" href="{{ url('admin/races/create') }}">
                <i class="fas fa-folder">
                </i>
                Přidat závod
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
                    Název závodu
                </th>
                <th style="width: 20%">
                    Šampionát
                </th>
                <th style="width: 20%">
                    Datum začátku
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($races as $race)
            <tr>
                <td>
                    #{{ $race->id }}
                </td>
                <td>
                    {{ $race->name }}
                </td>
                <td>
                    <a>
                        {{ $race->championship->name ?? '' }}
                    </a>
                </td>
                <td>
                    <a>
                        {{ \Carbon\Carbon::parse($race->started_at)->format('d.m.Y - h:m:s') }}
                    </a>
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('races').'/'.$race->slug }}">
                        <i class="fas fa-folder">
                        </i>
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.races.edit', $race) }}">
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
