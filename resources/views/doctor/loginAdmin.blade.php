@extends("doctor.master")
@section("formLoginDoctor")
<!-- @if($errors->has("email")) {{ $errors->first("email") }}  @endif  -->
@if(Session::has("errRole"))
      <div class="alert alert-danger fixed-top w-25 mx-auto alert-dismissable">
          <span class="btn-close btn" data-bs-dismiss="alert"></span>
          <p>{{ Session::get("errRole") }}</p>
      </div>
@endif
@if(Session::has("noAccount"))
<div class="alert alert-danger fixed-top w-25 mx-auto alert-dismissable ">
          <span class="btn-close btn fs-6" data-bs-dismiss="alert"></span>
          <p>{{ Session::get("noAccount") }}</p>
      </div>
@endif
{{--@if($errors->any())--}}
{{--    {{$errors->first('email_phone')}}--}}
{{--    {{$errors->first('password')}}--}}

{{--@endif--}}

<div class="d-flex" style="height: 100%;">

    <div class="bg w-50 h-100" >
        <!-- <img class="img-responsive" width="110%" height="70%" style="object-fit:contain;margin-right: 0;" src="img/doctor.jpg" alt=""> -->
    </div>

        <div style="width: 60%;" class="blockForm">
        <form action="{{ route('serverLoginFormDoctor') }}" method="POST" class="formLoginDoctor" style="position: relative;">
            <div style="position: absolute;top:50%;transform: translate(-70%,-50%);left:70%;width:50%">
                @csrf
                    <div class="form-group">
                        <label for="username_email" id="eu">ایمیل یا تلفن</label>
                        <input type="text" name="email_phone" value="{{ old('email_phone') }}" id="email_username" class='form-control'>
                    </div>
                    <p class="me-3 text-danger" style="font-size: 13px;">
                        @if($errors->has("email_phone"))  {{ $errors->first('email_phone') }} @endif
                    </p>
                    <br><br>
                    <div class="form-group">
                        <label for="passsword" >پسورد</label>
                        <input type="password" name="password" value="{{ old('password') }}" id="password" class='form-control'>
                    </div>
                    <p class="me-3 text-danger" style="font-size: 13px;">
                        @if($errors->has("password"))  {{ $errors->first('password') }} @endif
                    </p>
                    <br>
                    <div class="form-group btn-submit" >
                        <input type="submit" class='form-control text-white'  value="ورود" style="background: #00CCCC;border-radius: 25px 25px;padding-bottom: 10px;">
                    </div>
            </div>

            </form>

    </div>




</div>
<script src="js/script.js">

</script>

@endsection

