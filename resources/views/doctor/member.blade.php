@extends("doctor.master2")
@section("member")

    <button class="btn m-4 btn-outline-success pb-2" data-bs-toggle="modal" data-bs-target="#addDoctor"> افزودن پزشک <i
            class="fas fa-first-aid"></i></button>
{{--    --}}
{{--        <div class="procress_table_block">--}}
{{--            <div class="procress_table "></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- modal -->

    <div class="modal fade modal-style" id="addDoctor">
        <div class="modal-dialog modal-lg modal-centered">
            <div class="modal-content" style="background: rgb(133, 184, 232);">
                <div class="modal-header">
                    <h2>افزودن پزشک</h2>
                    <span data-bs-dismiss="modal" class="text-danger fs-4" style="cursor: pointer;">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="#" id="formAddDoctor" class="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <span class="label">اسم</span>
                                <span></span>
                                <input type="text" name="name">
                                <div class="err text-danger err_name"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>

                                <i class="fas fa-portrait icon_input_add_doctor"></i>

                            </div>
                            <div class="form-group col-lg-6">
                                <span class="label" style="width: 100px;">تلفن یا ایمیل</span>
                                <span></span>
                                <input type="text" name="email_phone">
                                <div class="err text-danger err_email_phone"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>
                                <i class="fas fa-phone icon_input_add_doctor"></i>

                            </div>

                        </div>
                        <br>
                        <div class="row">

                            <div class="form-group col-lg-6">
                                <span class="label">پسورد</span>
                                <span></span>
                                <input type="password" class="p-1" style="outline: none" name="password">
                                <div class="err  err_password d-block"
                                     style="position:absolute;left: 50%;transform:translateX(-50%);font-size: 10px;color:dimgray">
                                    پسورد شامل حروف و عدد و طول حداقل 8 باشد
                                </div>
                                <i class="fas fa-key icon_input_add_doctor"></i>
                            </div>
                            <div class="form-group col-lg-6 mt-md-3 mt-lg-0">

                                <span style="position: absolute;top: 25%;left: 20%;z-index:2"><i
                                        class="fas fa-user-md"></i></span>
{{--                                <select name="skill" class="select_skillDoctor mx-auto"--}}
{{--                                        style="border-radius: 12px; border: 2px dashed white;width: 80%;">--}}
{{--                                    <option value="1">داخلی</option>--}}
{{--                                    <option value="2">پزشک عمومی</option>--}}
{{--                                    <option value="3"> متخصص مغز و اعصاب</option>--}}
{{--                                    <option value="4">زیبایی</option>--}}
{{--                                    --}}{{--                                      <option value="" selected>قلب و عروق</option>--}}
{{--                                    --}}{{--                                      <option value="">کلیوی</option>--}}
{{--                                    --}}{{--                                      <option value="">گوش و حلق بینی</option>--}}
{{--                                </select>--}}
                                <div class="err text-danger err_skill"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>


                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-6 mt-md-5 mt-lg-0">
                                شیفت <i class="fas fa-clock"></i>
                                <div class="checkboxes d-flex justify-content-center">
                                    بعداز ظهر<input type="checkbox" name="hours_of_work[]" value="بعد از ظهر"
                                                    style="width: 10%;"/>
                                    صبح<input type="checkbox" name="hours_of_work[]" value="صبح" style="width: 10%;"/>
                                </div>
                                <div class="err text-danger err_hours_of_work"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>
                                {{--                              <div  class="err text-danger err_hours"></div>--}}
                            </div>
                            <div class="form-group col-lg-6 mt-md-5 mt-lg-0 pe-5">
                                <input type="file" class="form-control" class="w-100 m-0" name="img" id=""/>
                                <div class="err text-danger err_img"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>

                            </div>
                        </div>
                        <br>
                        <div class="form-group w-25 mx-auto" style="position:relative;">
                            <input type="submit" class="submit" value="ثبت"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
