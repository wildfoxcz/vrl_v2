@extends('admin.layout.layout')

@section('title', 'Seznam okruhů')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Okruhy</h3>

        <div class="card-tools">
            <a class="btn btn-primary btn-sm" href="{{ url('admin/circuits/create') }}">
                Přidat okruh
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
            @foreach($circuits as $circuit)
            <tr>
                <td>
                    #{{ $circuit->id }}
                </td>
                <td>
                    {{ $circuit->name }}
                </td>
                <td>
                    <a>
                        {{ $circuit->slug }}
                    </a>
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('circuits').'/'.$circuit->slug }}">
                        <i class="fas fa-folder">
                        </i>
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.circuits.edit', $circuit) }}">
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
