$(document).ready(function () {
    // $(".formLoginDoctor .form-group input").keyup(function () {

    // })


    let input = $(".formLoginDoctor .form-group input").val();
    if (input) {
        $("#email_username").addClass("act");
    }


    $(".formLoginDoctor .form-group input").focus(function () {

        $(this).prev().css({
            "top": "-40%",
            "transition": ".5s",
            "fontSize": "13px",
            "color": "#2E2787",
            "padding": "12px",
        }, 200);

    })
    $(".formLoginDoctor .form-group input").blur(function () {
        $(this).prev().css({
            "top": "50%",
            "transition": ".5s",
            "fontSize": "12px",
            "color": "#0c0c0c",
            "padding": "10px",
        }, 200);
        if (this.value) {
            $(this).prev().css({
                "top": "-40%",
                "transition": ".5s",
                "fontSize": "13px",
                "color": "#2E2787",
                "padding": "12px",
            }, 200);
        }
    });

    $(".nav_side").mouseenter(function () {
        let nav_side = $(".nav_side");
        nav_side.addClass("wider");
    });
    $(".nav_side").mouseleave(function () {
        let nav_side = $(".nav_side");
        nav_side.removeClass("wider");
    });


    $(".fa-moon").on("click", function () {
        if ($(this).hasClass("fa-moon")) {
            $(this).removeClass("fa-moon").addClass("fa-sun");

        } else {

            $(this).removeClass("fa-sun").addClass("fa-moon");
        }
        $("body,html").toggleClass("dark");

    });


    $(".modal-style .modal-body .form-group input").focus(function () {
        $(this).next().next().addClass("vibre");
        $(this).prev().addClass("w100");
        $(this).prev().prev().addClass("visible");

    });
    $(".modal-style .modal-body .form-group input").blur(function () {
        $(this).next().next().removeClass("vibre");
        $(this).prev().removeClass("w100");
        $(this).prev().prev().removeClass("visible");
    });

    // fetchAllDoctors();
    //
    // function fetchAllDoctors() {
    // $(document).ajaxStart(function () {

    // })
    // setInterval(function () {
    // $.ajax({
    //     url: "/dashboard/memberTable",
    //     type: "get",
    //     success: function (responsive) {
    //         $(".tableBlock").html(responsive);
    //     }
    // });
    // },1000);

    // }

    $("#formAddDoctor").submit(function (e) {
        e.preventDefault();
        $(document).ajaxStart(function () {
            $(".page_procress").slideDown(2).fadeIn(2);
        });
        let form = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/dashboard/memberStore",
            method: "POST",
            data: form,
            
            dataType: "json",
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status === 200) {
                    $(".page_procress").slideUp(200);
                    $(".box_success_form").css({
                        "left": "10%"
                    }).text("عملیات با موفقیت انجام شد");
                    $("#addDoctor").modal("hide");
                    setTimeout(function () {
                        $(".box_success_form").css({
                            "left": "-50%"
                        }, 1000)
                    });

                    $(".member tbody").prepend(
                        `
                        <tr>
                            <td><img width='50px' height='50px' style='overflow:hidden;object-fit: contain'
                             class='img-responsive rounded-pill' src='/upload/${ res.user.img }'/></td>
                            <td class='pt-4'>${ res.user.name }</td>
                            <td class='pt-4'>${ res.user.email_phone  }</td>
                            <td class='pt-4'><span class='barchasb'>${ res.user.category }</span></td>
                            <td class='pt-4'>شیفت ${ res.user.hours_of_work }</td>
                            <td class='pt-3'>
                            <button class='btn_delete_doctor btn del' id="{{ $doctor->id }}">حذف
                            </button>
                            <button class='btn_update_doctor btn up'  id="{{ $doctor->id }}" data-section="{{ route('edit-doctor',$doctor->id) }}" > آپدیت
                            </button>

                            </td>
                        </tr>
                        `
                    );


                    console.log(res);

                }
            },
            error: function (res) {
                $(".err").slideDown(300).text("").addClass("text-danger").css("fontSize", "16px");
                console.log(res);
                let errors = Object.entries(res.responseJSON.errors);
                $.each(errors, function (key, val) {

                    $(".err_" + val[0]).html(val[1]);

                })
                $(".page_procress").slideUp(200);

            }
        });
    })

    $(".update_doctor").submit(function (e) {
        e.preventDefault();
        $(document).ajaxStart(function () {
            $(".page_procress").slideDown(2).fadeIn(2);
        });
        let formData = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: $(this).attr("data-section"),
            data: formData,
            dataType: "json",
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status === 200) {
                    $(".box_success_form").css({
                        "left": "10%"
                    }).text("عملیات با موفقیت انجام شد");
                    $(".update-doctor").modal("hide");
                    setTimeout(function () {
                        $(".box_success_form").css({
                            "left": "-50%"
                        }, 1000)
                    });


                    $(".page_procress").slideUp(200);
                    console.log(data.user);
                }

            },
            error: function (data) {
                $(".err").slideDown(300).text("").addClass("text-danger").css("fontSize", "16px");
                let errors = Object.entries(data.responseJSON.errors);
                $.each(errors, function (key, val) {
                    $(".update-err_" + val[0]).html(val[1]);
                })
                console.log(data);
                $(".page_procress").slideUp(200);
            }


        });
    });

    $(".form_del_doctor").submit(function (e) {

        e.preventDefault();
        let dataForm = new FormData(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: $(this).attr("data-section"),
            data: dataForm,
            dataType: "json",
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.status === 200) {
                    $(".box_success_form").css({
                        "left": "10%"
                    }).text(" حذف شد ");
                    $(".del-doctor").modal("hide");
                    setTimeout(function () {
                        $(".box_success_form").css({
                            "left": "-50%"
                        }, 1000)
                    });

                    fetchAllDoctors();

                    console.log(data);
                }

            },
            error: function (data) {

                console.log(data);

            }

        });
    });


    // $(".formLoginDoctor").submit(function (e) {
    //     e.preventDefault();
    //
    //
    //     $(document).ajaxStart(function () {
    //         $(".page_procress").fadeIn(200);
    //     })
    //     $.ajaxSetup({
    //
    //         headers: {
    //
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //
    //         },
    //
    //     });
    //     var _token = $("input[name='_token']").val();
    //     var email_username = $("input[name='email_username']").val();
    //     var password = $("input[name='password']").val();
    //
    //     $.ajax({
    //         url:$(this).attr("action"),
    //         method:$(this).attr("method"),
    //         cache:false,
    //         procressData:false,
    //         contentType:false,
    //         dataType:"json",
    //         data:{email_username:email_username,password:password,_token:_token},
    //         beforeSend:function () {
    //
    //             $(".err").text("");
    //         },
    //         success:function (data,status,xhr) {
    //
    //                 $(".page_procress").fadeOut(200);
    //                 //  prefix = key array and errMsg = value
    //                 console.log(data,status);
    //                  $.each(data.err,function (prefix,errMsg) {
    //                      $(".err_"+prefix).text(errMsg[0]);
    //                  })
    //
    //
    //                 // $("#err_eu").text(data.responseJSON.errors.password);
    //                 // $("#err_p").text(data.responseJSON.errors.email);
    //
    //         },
    //         error:function (data,status,xhr) {
    //             console.log(data,status);
    //             // $("#err_eu").text(data.responseJSON.errors.password);
    //             // $("#err_p").text(data.responseJSON.errors.email);
    //             // console.log(data.responseJSON.errors.name);
    //             // console.log(data.responseJSON.errors.name);
    //             // console.log(data.responseJSON.errors.name);
    //         }
    //     });
    // })
});
