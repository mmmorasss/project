@extends('template')
@section('title', 'Registrationㅤ|ㅤFURN')
@section('content')

    <main class="login-bg">
        <div class="register-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="register-form text-center">

                            <div class="register-heading">
                                <span>Sign Up</span>
                                <p>Create your account to get full access</p>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label>Full name</label>
                                        <input autofocus required type="text" name="name" placeholder="Enter full name">
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Email Address</label>
                                        <input required type="email" name="email" placeholder="Enter email address">
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Phone Number</label>
                                        <input required type="tel" name="phone" placeholder="Enter phone number">
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Password</label>
                                        <input required type="password" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="single-input-fields">
                                        <label>Confirm Password</label>
                                        <input required type="password"  name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                        <input type="submit" value="Sign Up" class="submit-btn3">
                                </div>
                            </form>
                            <div class="register-footer">
                                <p> Already have an account? <a href="/login"> Login</a> here</p>
                                <p><a href="/register_seller">Create a Seller account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
