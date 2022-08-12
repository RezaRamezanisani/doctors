<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/d.jpg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>دکتر</title>
    <script src="{{ asset('js/jQuery.js') }}"></script>


</head>
<body>
@include("modals.update_doctor")
{{-- /modal for update doctor--}}

{{-- modal for delete doctor--}}
@include(".modals.delete_doctor")
        <!-- {{ Auth::user()->name }} -->
        <div class="page_procress">
                <div class="procress"></div>
        </div>
        <div class="nav py-3 row">
        <div class="div1 col-lg-8  col-md-8 col-12">
            <div class="icons me-5 text-white">
                <span class="fas fa-moon ms-2"  style="cursor: pointer;"></span>
                <form action="{{ route('logoutDoctorLeader') }}"  method="post">
                    {{ csrf_field() }}
                    <button class="btn text-white" type="submit"><i class="fas fa-sign-in-alt ms-2" style="cursor: pointer;"></i></button>
                </form>
                <span> خوش آمدی {{ Auth::user()->name }}</span>
            </div>

            <form action="#" method="POST" class="search w-50">

                <div class="search_input">
                    <i class="fas fa-search"></i>
                    <input type="text" name="" placeholder="جستجو..."  class="rounded-pill w-100" id=""/>
                </div>
            </form>

        </div>
        <div class="div2 col-lg-2 col-md-2 col-12 mx-5 text-center">
            <div class="date">

            </div>
            <div class="time">

            </div>
        </div>
    </div>
    <ul class="nav_side p-4">
         <div class="header">

             <div class="circles">
                 <i class="fas fa-circle ms-1" style="color: red;"></i>
                 <i class="fas fa-circle ms-1" style="color: yellow;"></i>
                 <i class="fas fa-circle ms-1" style="color: green;"></i>
             </div>
         </div>
        <li>
            <a href="{{ route('dashboard') }}">
                <span class="fs-6" style="margin-left: 65px;">خانه</span>
                <i class="fas  fs-5 fa-fw fa-home"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('member') }}">
                <span class="fs-6" style="margin-left: 61px;">اعضا</span>
                <i class="fas  fs-5 fa-fw fas fa-user-md"></i>
            </a>

        </li>
        <li>
            <a href="#">
                <span class="fs-6" style="margin-left: 53px;">بیماران</span>
                <i class="fas  fs-5 fa-fw fa-user-injured"></i>
            </a>

        </li>
        <li>
            <a href="#">
                <span class="fs-6" style="margin-left: 54px;">داروها</span>
                <i class="fas  fs-5 fa-fw fa-vials"></i>
            </a>

        </li>
     </ul>
    @yield("dashboard")
    @yield("member")
        @include("tables.table_doctors")
           {{-- modal for update doctor--}}
        <div class="update_doctor_modal"></div>
        @include("modals.update_doctor")
        {{-- /modal for update doctor--}}

        {{-- modal for delete doctor--}}
        @include(".modals.delete_doctor")
        {{-- /modal for delete doctor--}}




        <!-- /modal -->
        <div class="box_success_form" onclick="this.style.left='-50%'">

        </div>


{{--<script src="{{ asset('js/script.js') }}"></script>--}}
 <script>
     $(document).ready(function () {

         $(".btn_update_doctor").click(function () {

             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 method: "POST",
                 url: $(this).attr("data-section"),
                 data: $(this).attr("id"),
                 dataType: "json",
                 cache: false,
                 processData: false,
                 contentType: false,
                 success: function (data) {

                     $("#updateDoctor").modal("show");
                     $("#updateDoctor input[name='name']").val(data.user.name);
                     $("#updateDoctor input[name='email_phone']").val(data.user.email_phone);
                     let skill = data.user.category_id;
                     let hours_of_work  = data.user.hours_of_work;
                     let categories = Object.values($("#updateDoctor select").find('option'));
                     let checkBoxes =  $("#updateDoctor input[type='checkbox']");

                     for (let i = 0; i < checkBoxes.length; i++) {
                         checkBoxes[i].checked=false;
                     }
                     for (let i = 0; i < checkBoxes.length; i++) {
                         if(checkBoxes[i].value === hours_of_work ){
                             checkBoxes[i].checked= true;
                         }else if(checkBoxes[i].value === hours_of_work ){
                             checkBoxes[i].checked= true;
                         }
                     }

                     for (let i = 0; i < categories.length; i++) {

                         if (categories[i].selected === true) {
                             categories[i].selected = false;
                         }


                     }
                     for (let i = 0; i < categories.length; i++) {

                         if (Number(categories[i].value) === skill) {
                             categories[i].selected = true;
                         }

                     }
                     console.log(data.user);

                 },
                 error: function (data) {

                     console.log(data);

                 }

             });
         })

     })

 </script>
</body>
</html>
