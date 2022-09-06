@extends('layouts.login')
@section('content')
<div class="d-flex flex-column flex-root">
  <!--begin::Login-->
<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url('/admin/assets/media/bg/bg-2.jpg');">
  <div class="login-form text-center p-7 position-relative overflow-hidden">
    <!--begin::Login Header-->
    <div class="d-flex flex-center mb-15">
      <a href="#">
        <img src="/admin/assets/media/bg/blanco_transparente.png"  width="300" alt=""/>
      </a>
    </div>
    <!--end::Login Header-->

    <!--begin::Login Sign in form-->
    <div class="login-signin">
      <div class="mb-20">
        <h3 style="color:white;">Iniciar sesión para administrar</h3>
        <div class="text-muted font-weight-bold">Ingrese sus datos para iniciar sesión en su cuenta:</div>
      </div>
      <form class="form text-left"  method="POST" action="{{ route('login') }}">
            @csrf
        <div class="form-group">
          <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="email"  id="email" placeholder="Email" name="email" :value="old('email')" required autofocus  autocomplete="off" />
        </div>
        <div class="form-group">
          <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="Password" id="password" placeholder="Password"  name="password" required autocomplete="current-password" autocomplete="off" />
        </div>

        <div class="text-center mt-15">
          <button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Iniciar Sesión</button>
        </div>
      </form>
      <div class="mt-10">

      </div>
    </div>

  </div>
</div>
</div>
<!--end::Login-->
</div>
<!--end::Main-->
@endsection
