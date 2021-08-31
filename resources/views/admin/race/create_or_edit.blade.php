@extends('admin.layout.layout')

@section('title', 'Vytvořit závod')

@section('content')
<!-- Default box -->
<form action="{{ route('admin.races.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
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
                        <label for="inputName">Název závodu</label>
                        <input type="text" id="inputName" class="form-control" name="name">
                    </div>
                    @if ($errors->has("name"))
                        @foreach ($errors->get("name") as $error)
                            <div class="errorMessage"> <!-- @todo find class for errors in adminLTE -->
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputDescription">Popis závodu</label>
                        <textarea id="inputDescription" class="form-control" rows="4" name="description"></textarea>
                    </div>
                    @if ($errors->has("description"))
                        @foreach ($errors->get("description") as $error)
                            <div class="errorMessage">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputStartTime">Začátek závodu</label><!-- @todo use datepicker -->
                        <input type="text" id="inputStartTime" class="form-control" name="started_at">
                    </div>
                    @if ($errors->has("started_at"))
                        @foreach ($errors->get("started_at") as $error)
                            <div class="errorMessage">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputStatus">Šampionát</label>
                        <select id="inputStatus" class="form-control custom-select" name="championship_id">
                            <option selected>Vybrat</option>
                            @foreach($championships as $championship)
                                <option value="{{$championship->id}}">{{$championship->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has("championship_id"))
                        @foreach ($errors->get("championship_id") as $error)
                            <div class="errorMessage">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="inputStatus">Okruh</label>
                        <select id="inputStatus" class="form-control custom-select" name="circuit_id">
                            <option selected disabled>Vybrat</option>
                            @foreach($circuits as $circuit)
                                <option value="{{$circuit->id}}">{{$circuit->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has("circuit_id"))
                        @foreach ($errors->get("circuit_id") as $error)
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
            <input type="submit" value="Vytvořit závod" class="btn btn-success float-right">
        </div>
    </div>
</form>
@endsection
