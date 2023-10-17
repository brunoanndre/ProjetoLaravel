@extends('layouts.main')

@section('title','Login')

@section('content')
<div class="bodyLogin">
    <div class="login-container">
        <h2>Entrar</h2>
            <input type="text" name="username" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit"    class="btn btn-primary" value="Entrar"><br>
            <a href="/">Voltar para o laravel</a>
    </div>
</div>
@endsection
