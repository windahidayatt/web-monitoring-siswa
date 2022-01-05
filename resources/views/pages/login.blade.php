@extends('layouts.login')

@section('container-login')
    <div class="Main-container">
        <div class="container-login">
            <div class="wrap-login">

                <div class="login-pic">
                    <img src={{url("/img/login-pict.png")}} alt="img-login">
                </div>

                <form action="/login" method="post" class="login-form">
                    @csrf
                    <img class="logo-login" src={{url("/img/monitoring.png")}}    alt="">
                    <span class="login-form-title">Monitoring Siswa</span>


                    <div class="wrap-input">
                        <input type="text" class="input" name="username" placeholder="Username" required autofocus>
                        <span class="focus-input"></span>
                        <span class="symbol-input">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input">
                        <input type="password" class="input" name="password" placeholder="Password" required>
                        <span class="focus-input"></span>
                        <span class="symbol-input">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    {{-- <div class="login-form-btn-container">
                    </div> --}}
                    <button type="submit" class="login-form-btn" >Login</button>


                </form>

            </div>
        </div>
    </div>
    
@endsection

