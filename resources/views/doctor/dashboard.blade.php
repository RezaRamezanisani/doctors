@extends("doctor.master2")
@section("dashboard")

    <!-- main -->
    <div class="main">
        <div class="row mt-5">
            <div class="col-lg-4 col-md-4">
                <div class="p-4  bg-white MB">
                    <h5 class="text-center">رای مردم به خدمات</h5>
                    <div class="precresses">
                        <div class="pro-bar">
                            <div style="font-size:11px;font-weight: bold;order:2" class="pe-2">خدمات دارویی</div>
                            <div class="procress-bar mt-1" style="order:1"></div>
                        </div>
                        <div class="probar">
                            <div class="procress-bar mt-1" style="order:1"></div>
                            <div style="font-size:11px;font-weight: bold;order:2" class="pe-2">کیفیت کار</div>
                        </div>
                        <div class="probar">
                            <div style="font-size:11px;font-weight: bold;order:2" class="pe-2">نظم</div>
                            <div class="procress-bar mt-1" style="order:1"></div>
                        </div>
                    </div>
                    <div class="py-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci amet asperiores culpa, cum debitis dolore ea ipsa libero maxime molestiae nesciunt nobis non pariatur quis reiciendis rem voluptas voluptate.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet distinctio iste laborum libero mollitia nihil optio ratione

                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="bg-white icon-box">
                            <span class="circle-icon" style="background: rgb(218, 54, 193);">
                                <i class="fas fa-medkit"></i>
                            </span>
                            <div class="mt-2" style="font-weight: bolder;font-size: 1.5em;">2000</div>
                            <div class="mt-2" style="font-weight:lighter;font-size: 1em;">کمک های اولیه</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="icon-box bg-white">
                            <span class="circle-icon" style="background: rgb(201, 220, 59);">
                            <i class="fas fa-users"></i>
                            </span>
                            <div class="mt-2" style="font-weight: bolder;font-size: 1.5em;">2000</div>
                            <div class="mt-2" style="font-weight:lighter;font-size: 1em;">تیم پزشکی</div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3 ">
                        <div class="bg-white icon-box">
                             <span class="circle-icon" style="background: rgb(115, 165, 223);">
                               <i class="fas fa-wheelchair"></i>
                           </span>
                            <div class="mt-2" style="font-weight: bolder;font-size: 1.5em;">2000</div>
                            <div class="mt-2" style="font-weight:lighter;font-size: 1em;"> مریض ها</div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="icon-box bg-white">
                            <span class="circle-icon" style="background: rgb(106, 224, 253)">
                                <i class="fas fa-vials"></i>
                            </span>
                            <div class="mt-2" style="font-weight: bolder;font-size: 1.5em;">2000</div>
                            <div class="mt-2" style="font-weight:lighter;font-size: 1em;">دارو</div>
                        </div>
                    </div>

                </div>

                <div class="row mt-2">
                    <div class="col-lg-5 col-md-5 mt-4">
                        <div class="bg-white"
                             style="border-radius: 15px;box-shadow:  0px 0px 15px #00000014;height: 100%;">
                            <canvas id="myChart_circle" style="width:100%;max-width:700px;text-align: center;"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 mt-4">
                        <div class="bg-white" style="border-radius: 15px;box-shadow:  0px 0px 15px #00000014;">
                            <canvas id="myChart" style="width:100%;max-width:700px;;text-align: center;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4 col-md-4">

                    <div class="bg-white" style="box-shadow:0px 0px 15px #00000014;border-radius: 12px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>نوع بیماری</th>
                                <th class='text-end'>پزشک معالجه</th>
                                <th>نوع بیمه</th>
                                <th>ساعت ویزیت</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>بیژن</td>
                                <td>کرونا</td>
                                <td class="TooltipBlock">
                                    علی رستمی
                                    <div class="Tooltip">
                                        <p>متخضض بیماری های عفونی</p>
                                    </div>

                                </td>
                                <td>خدمات درمانی</td>
                                <td>12:00-12:30</td>
                            </tr>
                            <tr>
                                <td>رستم</td>
                                <td>کلیوی</td>
                                <td class="TooltipBlock">
                                    بهروز عظیمی
                                    <div class="Tooltip">
                                        <p>جراح و پزشک بیماری های کلیوی</p>
                                    </div>
                                </td>
                                <td>تامین اجتماعی</td>
                                <td>12:00-12:30</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white" style="box-shadow:0px 0px 15px #00000014;border-radius: 12px;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>نوع بیماری</th>
                            <th class='text-end'>پزشک معالجه</th>
                            <th>نوع بیمه</th>
                            <th>ساعت ویزیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>بیژن</td>
                            <td>کرونا</td>
                            <td class="TooltipBlock">
                                علی رستمی
                                <div class="Tooltip">
                                    <p>متخضض بیماری های عفونی</p>
                                </div>

                            </td>
                            <td>خدمات درمانی</td>
                            <td>12:00-12:30</td>
                        </tr>
                        <tr>
                            <td>رستم</td>
                            <td>کلیوی</td>
                            <td class="TooltipBlock">
                                بهروز عظیمی
                                <div class="Tooltip">
                                    <p>جراح و پزشک بیماری های کلیوی</p>
                                </div>
                            </td>
                            <td>تامین اجتماعی</td>
                            <td>12:00-12:30</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white" style="box-shadow:0px 0px 15px #00000014;border-radius: 12px;">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>نوع بیماری</th>
                            <th class='text-end'>پزشک معالجه</th>
                            <th>نوع بیمه</th>
                            <th>ساعت ویزیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>بیژن</td>
                            <td>کرونا</td>
                            <td class="TooltipBlock">
                                علی رستمی
                                <div class="Tooltip">
                                    <p>متخضض بیماری های عفونی</p>
                                </div>

                            </td>
                            <td>خدمات درمانی</td>
                            <td>12:00-12:30</td>
                        </tr>
                        <tr>
                            <td>رستم</td>
                            <td>کلیوی</td>
                            <td class="TooltipBlock">
                                بهروز عظیمی
                                <div class="Tooltip">
                                    <p>جراح و پزشک بیماری های کلیوی</p>
                                </div>
                            </td>
                            <td>تامین اجتماعی</td>
                            <td>12:00-12:30</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

        <!-- <div class="row p-3 bg">
            <div class="col-lg-3 col-md-3 container MB" style="background: rgb(206, 224, 243);">
                <h5 class="text-center">رای مردم به خدمات</h5>
                <div class="precresses">
                    <div class="pro-bar">
                        <div style="font-size:11px;font-weight: bold;order:2" class="pe-2">خدمات دارویی</div>
                        <div class="procress-bar mt-1" style="order:1"></div>
                    </div>
                    <div class="probar">
                        <div style="font-size:11px;font-weight: bold;order:2" class="pe-2">کیفیت کار</div>
                        <div class="procress-bar mt-1" style="order:1"></div>
                    </div>
                    <div class="probar">
                        <div style="font-size:11px;font-weight: bold;order:2" class="pe-2">نظم</div>
                        <div class="procress-bar mt-1" style="order:1"></div>
                    </div>
                </div>
            </div>

               <div class="col-lg-3 col-md-3 col-12 icons">
                   <span class="circle-icon" style="background: rgb(218, 54, 193);">
                       <i class="fas fa-medkit"></i>
                   </span>
                   <div class="mt-2">2000</div>
               </div>
               <div class="col-lg-3 col-md-3 col-12 icons">
                  <span class="circle-icon" style="background: rgb(201, 220, 59);">
                      <i class="fas fa-users"></i>
                  </span>
                  <div class="mt-2">2000</div>
               </div>
               <div class="col-lg-3 col-md-3 col-12 icons">
                  <span class="circle-icon" style="background: rgb(115, 165, 223);">
                      <i class="fas fa-wheelchair"></i>
                  </span>
                  <div class="mt-2">2000</div>
               </div>
           </div>

           <br>
           <div class="row"> -->
        <!-- <div class="col-lg-4"></div>
        <div class="col-lg-4"></div> -->
        <!-- <div class="col-lg-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>نام</th>
                        <th>نوع بیماری</th>
                        <th class='text-end'>پزشک معالجه</th>
                        <th>نوع بیمه</th>
                        <th>ساعت ویزیت</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>بیژن</td>
                        <td>کرونا</td>
                        <td class="TooltipBlock">
                            علی رستمی
                            <div class="Tooltip">
                                <p>متخضض بیماری های عفونی</p>
                            </div>

                        </td>
                        <td>خدمات درمانی</td>
                        <td>12:00-12:30</td>
                    </tr>
                    <tr>
                        <td>رستم</td>
                        <td>کلیوی</td>
                        <td class="TooltipBlock">
                            بهروز عظیمی
                            <div class="Tooltip">
                                <p>جراح و پزشک بیماری های کلیوی</p>
                            </div>
                        </td>
                        <td>تامین اجتماعی</td>
                        <td>12:00-12:30</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">
          <canvas id="myChart" style="width:100%;max-width:700px;text-align: center;"></canvas>
        </div> -->
    </div>




    <!-- /main -->















    <script>
        new Chart("myChart", {
            type: "line",
            data: {
                labels: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
                datasets: [{
                    //  fill:false,
                    data: [0, 10, 20, 36, 0, 50, 0, 80, 20, 24, 10],
                    borderColor: "rgba(49, 188, 226, 0.505)",
                    backgroundColor: "rgb(72, 140, 230)",
                }]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: "تعداد بیماران این هفته"
                }
            }
        });
        new Chart("myChart_circle", {
            type: "pie",
            data: {
                labels: ["سنتی", "صنعتی", "بیماران خاص", "کرونایی"],
                datasets: [{
                    //  fill:false,
                    data: [30, 10, 20, 36],
                    backgroundColor: ["red", "pink", "yellow", "blue", "white"],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "آمار دارو در انبار"
                }
            }
        });

    </script>

@stop
