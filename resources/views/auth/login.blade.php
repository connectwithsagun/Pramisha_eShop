@extends('admin/layouts.auth_layout')
  
@section('content')
<div class="login-form">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card bg-info">

                  <div class="card-header">Login 
             
                  </div>

                  <div class="card-body">

                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
  
                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required />
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required />
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                          <div class="offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                          <div class="col">
                              <h6 style="padding-top: 10px;" class="btn btn-info">Do not have account?</h6>

                              {{-- <button  class="btn btn-primary" href="registration">
                                Register
                            </button> --}}
                            <a href="registration" class="btn btn-primary">Registration</a>
                          </div>
                          </div>

                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection