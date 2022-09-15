@extends('layouts.base')

@section('main')
    <br>
    <br>
    <section class="vh-100" style="background-color: rgb(0,0,1390,0.2);">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <h3 class="mb-5">Create Account</h3>

                <form action="" method="post">
                    @csrf
                    <div class="form-outline mb-4 text-left">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <label class="form-label" for="typeEmailX-2">Email</label>
                    </div>

                    <div class="form-outline mb-4 text-left">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                    <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="form-outline mb-4 text-left">
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control form-control-lg" />
                    {{ $errors->has('confirm-password') ? $errors->first('confirm-password') : '' }}
                    <label class="form-label" for="confirm-password">Confirm password</label>
                    </div>

                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>

                </form>
                <hr class="my-4">

                <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
@endsection