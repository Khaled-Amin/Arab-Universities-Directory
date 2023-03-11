@extends('frontend.layouts.navbar_and_footer')

@section('content')

<section class="section">
    <div class="container">
        <div class="box-main-foo">
            <div class="sign-in">
                <div class="part-above">

                    <h4>أنشئ حساب جديد</h4>

                    <div class="line">

                    </div>
                    <form action="https://oacdir.com/add-company-rigesteration" method="POST" class="fomr-sign"
                        autocomplete="off">
                        <input type="hidden" name="_token" value="pLOjecZQlpMdRBcvHN3pwlsbLgZkmDPIBLzGzuOS">
                        <div class="row mt-5 mb-4">
                            <div class=" col-12 col-sm-6 mb-2 ">
                                <label for="" class="mb-2">الاسم الأول</label>
                                <input type="text" class="form-control" name="name" placeholder="الاسم "
                                    aria-label="First name">
                            </div>


                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">البريد الإلكتروني</label>
                                <input type="email" autocomplete="off" class="form-control" name="email"
                                    placeholder="البريد الإلكتروني" aria-label="البريد الإلكتروني">
                            </div>



                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">كلمة السر</label>
                                <input type="password" class="form-control" name="password" placeholder="كلمة السر"
                                    aria-label="First name">
                            </div>
                            <div class="col-12 col-sm-6 mb-2">
                                <label for="" class="mb-2">تأكيد كلمة السر</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="تأكيد كلمة السر" aria-label="Last name">
                            </div>

                            <div class="row">
                                <div class="col-12 mt-2 mb-2">
                                    <label for="" class="policy-form">
                                        <span class="policy">
                                            بالتسجيل في دليل الشركات العربية,انت توافق على
                                            <a href="https://oacdir.com/pindPage/privacy/19">الخصوصية</a>
                                            و
                                            <a href="https://oacdir.com/pindPage/terms/20">الشروط و الأحكام</a>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="theme-btn primary-btn btn-sign w-100">تسجيل</button>

                            <div class="sec">
                                <p>
                                    هل بالفعل لديك حساب
                                    <a href="https://oacdir.com/log-in">دخول</a>
                                </p>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="left-form">
                <img src="https://oacdir.com/../public/uploading/register.svg" alt="">
            </div>
        </div>
    </div>
</section>

@endsection
