@extends('layouts.user_type.auth')

@section('content')

  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">User Creation</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-body">
              <form id="registerForm" role="form text-left" method="POST" action="/register">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                  @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Username" name="username" id="username" aria-label="Username" aria-describedby="username" value="{{ old('username') }}">
                  @error('username')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                  @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Station" name="station" id="station" aria-label="Station" aria-describedby="station-addon">
                  @error('station')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Station ID" name="station_id" id="station_id" aria-label="Station ID" aria-describedby="station-id-addon">
                  @error('station_id')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-1">
                    <div class="dropdown w-100">
                        <select id="typeListItems" class="form-select" aria-label="Default select example">
                            <option selected>Type</option>
                            <option value="admin">Admin</option>
                            <option value="user">Production</option>
                            <option value="user">Respair Center</option>
                            <option value="user">Read Only</option>
                        </select>
                      </div>
                    @error('role')
                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Create Account</button>
                </div>
                <div id="message" style="color: white; display: none;" class="alert alert-success" role="alert">

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

