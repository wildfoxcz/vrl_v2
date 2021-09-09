@extends('admin.layout.layout')

@section('title', 'Seznam týmů')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Týmy</h3>

        <div class="card-tools">
            <a class="btn btn-primary btn-sm" href="{{ url('admin/teams/create') }}">
                <i class="fas fa-folder">
                </i>
                Přidat tým
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
                <th style="width: 60%">
                    Název týmu
                </th>
                <th style="width: 1%">
                    Limit
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
            <tr>
                <td>
                    #{{ $team->id }}
                </td>
                <td>
                    {{ $team->name }}
                </td>
                <td>
                    <a>
                        {{ $team->limit }}
                    </a>
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('teams').'/'.$team->slug }}">
                        <i class="fas fa-folder">
                        </i>
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.teams.edit', $team) }}">
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
