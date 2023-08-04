@extends('template')
@section('title', 'Loginㅤ|ㅤFURN')
@section('content')
    <main class="login-bg">

        <div class="login-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="login-form">

                            <div class="login-heading">
                                <span>Login</span>
                                <p>Enter Login details to get access</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label>Email Address</label>
                                        <input autofocus required type="email" name="email" placeholder="Email address">
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Password</label>
                                        <input required type="password" name="password" placeholder="Enter Password">
                                    </div>
                                    <input type="submit" value="Login" class="submit-btn3">
                                   {{-- <div class="single-input-fields login-check">
                                        <input type="checkbox" id="fruit1" name="keep-log">
                                        <label for="fruit1">Keep me logged in</label>
                                    </div>--}}
                                </div>
                            </form>
                            <div class="login-footer">
                                <p>Don’t have an account? <a href="/register">Sign Up</a> here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
