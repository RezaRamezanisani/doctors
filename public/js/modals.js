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
