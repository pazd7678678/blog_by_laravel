<div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card-box">


            <h4 class="header-title mt-0 mb-4">تعداد کاربران</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                           data-bgColor="#F9B9B9" value="{{$panelRepo->countUsers()}}"
                           data-skin="tron" data-angleOffset="180" data-readOnly=true
                           data-thickness=".15"/>
                </div>

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{$panelRepo->countUsersToday()}} </h2>
                    <p class="text-muted mb-1">تعداد کاربر ثبت شده امروز</p>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-3">تعداد کل مقالات</h4>

            <div class="widget-box-2">
                <div class="widget-detail-2 text-right">
                    <span class="badge badge-success badge-pill float-left mt-3"> {{$panelRepo->articleCount()}} <i class="mdi mdi-trending-up"></i> </span>
                    <h2 class="font-weight-normal mb-1"> {{$panelRepo->articleCountToday()}} </h2>
                    <p class="text-muted mb-3">مقالات ایجاد شده امروز</p>
                </div>
                <div class="progress progress-bar-alt-success progress-sm">
                    <div class="progress-bar bg-success" role="progressbar"
                         aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                         style="width: 77%;">
                        <span class="sr-only">77% تکمیل شده</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-4">آمار دسته بندی های وب سایت</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                           data-bgColor="#FFE6BA" value="{{$panelRepo->countCategory()}}"
                           data-skin="tron" data-angleOffset="180" data-readOnly=true
                           data-thickness=".15"/>
                </div>
                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{$panelRepo->countCategoryToday()}} </h2>
                    <p class="text-muted mb-1">دسته بندی های ایجاد شده در امروز</p>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-3">آمار تبلیغات وبسایت</h4>

            <div class="widget-box-2">
                <div class="widget-detail-2 text-right">
                    <span class="badge badge-pink badge-pill float-left mt-3"> {{$panelRepo->countAdvertising()}} <i class="mdi mdi-trending-up"></i> </span>
                    <h2 class="font-weight-normal mb-1"> {{$panelRepo->countAdvertisingToday()}} </h2>
                    <p class="text-muted mb-3">تبلیغات امروز</p>
                </div>
                <div class="progress progress-bar-alt-pink progress-sm">
                    <div class="progress-bar bg-pink" role="progressbar"
                         aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                         style="width: 77%;">
                        <span class="sr-only">77% تکمیل شده</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
