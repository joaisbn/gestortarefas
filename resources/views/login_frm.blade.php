@extends('templates/login_layout')

@section('content')
    <div class="login-wrapper">
        <div class="login-box">
            <h3 class="text-center">Login</h3>
            <hr>
            <form action="{{ route('login_submit') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="text_username">Usuário</label>
                    <input class="form-control" type="text" name="text_username" id="text_username"
                        placeholder="Usuário"required value="{{ old('text_username') }}">
                    @error('text_username')
                        <div class="text-warning">{{ $errors->get('text_username')[0] }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="text_password">Senha</label>
                    <input class="form-control" type="password" name="text_password" id="text_password"
                        placeholder="Senha"required value="{{ old('text_password') }}">
                    @error('text_password')
                        <div class="text-warning">{{ $errors->get('text_password')[0] }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-dark w-100">Entrar</button>
                </div>
            </form>

            @if (session()->has('login_error'))
                <div class="alert alert-danger text-center p-1">
                    {{ session()->get('login_error') }}
                </div>
            @endif

        </div>
    </div>
@endsection
