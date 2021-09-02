@extends('admin.layout.layout')

@section('title', 'Seznam uživatelů')

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
                    Jméno uživatele
                </th>
                <th style="width: 20%">
                    E-mail
                </th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <img width="25" src="{{asset('/img/flags') }}/{{ $user->user_detail->country }}.png" alt="">
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    <a>
                        {{ $user->email }}
                    </a>
                </td>
                <td class="project-actions text-right">

                   <a class="btn btn-primary btn-sm" href="{{ url('page').'/'.$user->slug }}">
                        Zobrazit
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.users.edit', $user) }}">
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
