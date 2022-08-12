



    <div class="modal fade update-doctor modal-style" id="updateDoctor">
        <div class="modal-dialog modal-lg modal-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h2>آپدیت کردن دکتر</h2>
                    <span class="fs-4 text-danger border border-danger px-2" style="cursor:pointer;"
                          data-bs-dismiss="modal">&times;</span>
                </div>
                <div class="modal-body">
                    <form action="#"  id="formUpdateDoctor"
                          class="update_doctor" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("patch")
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <span class="label">اسم</span>
                                <span></span>
                                <input type="text" name="name">
                                <div class="err text-danger update-err_name"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>

                                <i class="fas fa-portrait icon_input_add_doctor"></i>

                            </div>
                            <div class="form-group col-lg-6">
                                <span class="label" style="width: 100px;">تلفن یا ایمیل</span>
                                <span></span>
                                <input type="text" name="email_phone">
                                <div class="rr text-danger update-err_email_phone"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>
                                <i class="fas fa-phone icon_input_add_doctor"></i>

                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-lg-6 mt-md-5 mt-lg-0 pe-5">
                                <input type="file" class="form-control" class="w-100 m-0" name="img" id=""/>
                                <div class="err text-danger update-err_img"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>

                            </div>

                            <div class="form-group col-lg-6 mt-md-3 mt-lg-0">

                                    <span style="position: absolute;top: 25%;left: 20%;z-index:2"><i
                                            class="fas fa-user-md"></i></span>
                                <select name="skill" class="select_skillDoctor mx-auto p-2"
                                        style="border-radius: 12px; border: 2px dashed white;width: 80%;">
{{--                                    @foreach($categories as $category)--}}
{{--                                        <option value="{{ $category->id }}">{{ $category->skill }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                                <div class="err text-danger update-err_skill"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>


                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6 mt-md-5 mt-lg-0"></div>
                            <div class="form-group col-lg-6 mt-md-5 mt-lg-0">
                                شیفت <i class="fas fa-clock"></i>
                                <div class="checkboxes d-flex justify-content-center">
                                    بعداز ظهر<input type="checkbox"
                                                    name="hours_of_work[]" value="بعد از ظهر"
                                                    style="width: 10%;"/>
                                    صبح<input type="checkbox"  name="hours_of_work[]" value="صبح" style="width: 10%;"/>
                                </div>
                                <div class="err text-danger update-err_hours_of_work"
                                     style="position:absolute;left: 50%;transform:translateX(-50%)"></div>
                                <div class="err text-danger err_hours"></div>
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

{{--    @if($doctor->hours_of_work==="بعد از ظهر") checked--}}
{{--    @endif--}}
{{--    @if($doctor->hours_of_work==="صبح") checked--}}
{{--    @endif--}}
