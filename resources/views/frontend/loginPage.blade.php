@extends('frontend.layouts.navbar_and_footer')

@section('content')
    <section class="section">
        <div class="container">
            <div class="box-main-foo">
                <div class="sign-in">
                    <div class="part-above">


                        <h4>مرحبا بك مجددا</h4>



                        <form method="POST" action="https://oacdir.com/add-company" class="fomr-sign" id="appointment-form">
                            <input type="hidden" name="_token" value="pLOjecZQlpMdRBcvHN3pwlsbLgZkmDPIBLzGzuOS">
                            <div class="col mb-4">
                                <label class="mb-2" for="typeEmailX-2">ايميل</label>
                                <input type="email" value="" id="typeEmailX-2 " name="email"
                                    class="form-control ">

                            </div>

                            <div class="col mb-4">
                                <label class="mb-2" for="typePasswordX-2">كلمة السر</label>
                                <input type="password" name="password" id="typePasswordX-2" class="form-control  ">

                            </div>

                            <!-- Checkbox -->


                            <button class="theme-btn primary-btn btn-sign w-100 mt-4" type="submit">سجل</button>

                        </form>

                        <div class="sec">
                            <p>
                                هل نسيت كلمة المرور؟
                                <a href="#">استعادة كلمة المرور </a>
                            </p>
                            <p>
                                ليس لديك حساب؟
                                <a href="#">سجل الأن</a>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="left-form-login">
                    <img src="{{url('../public/assets/')}}images/login.svg" alt="">
                </div>
            </div>
        </div>

    </section>
@endsection
