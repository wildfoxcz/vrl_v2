@extends('single')

@section('content')
    <!-- Recent Post -->
    <div class="col-lg-6 col-xl-7">
    <div class="panel-box">

        <div class="titles">
            <h4>Přihlášení</h4>
        </div>
    <div class="info-panel">
        <form class="form-horizontal form-theme padding-top-mini" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2">E-mail</label>
                <div class="col-sm-10">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Heslo</label>
                <div class="col-sm-10">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Přihlásit') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Zapomněli jste heslo?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
@endsection

@section('sidebar')
    @include('extensions.fixbar')
@endsection
