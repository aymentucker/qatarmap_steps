<x-guest-layout :isSweetalert="true">
    <section class="login-content">
        <div class="row m-0 align-items-center bg-white h-100">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div
                            class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0 iq-auth-form">
                            <div class="card-body">
                                <a href="{{ route('dashboards') }}"
                                    class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                                    <!--Logo start-->
                                    <div class="logo-normal">
                                        <svg class="" viewBox="0 0 32 32" width="80px" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.25333 2H22.0444L29.7244 15.2103L22.0444 28.1333H7.25333L0 15.2103L7.25333 2ZM11.2356 9.32316H18.0622L21.3334 15.2103L18.0622 20.9539H11.2356L8.10669 15.2103L11.2356 9.32316Z"
                                                fill="currentColor"></path>
                                            <path d="M23.751 30L13.2266 15.2103H21.4755L31.9999 30H23.751Z"
                                                fill="#3FF0B9"></path>
                                        </svg>
                                    </div>
                                    <!--logo End-->
                                    <h2 class="logo-title ms-3 mb-0" data-setting="app_name">
                                        {{ env('APP_NAME') }}</h2>
                                </a>
                                <h2 class="mb-2 text-center">تسجيل شركتك.</h2>
                                <p class="text-center">قم بإنشاء وتسجيل شركتك معنا علي {{ env('APP_NAME') }}.</p>
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('register') }}" data-toggle="validator">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="full-name" class="form-label">الاسم الاول <span
                                                        class="text-danger">*</span></label>
                                                <input id="full-name" name="first_name" value="{{ old('first_name') }}"
                                                    class="form-control" type="text" placeholder=" " required
                                                    autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="last-name" class="form-label">الاسم الاخير <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" id="last-name" type="text"
                                                    name="last_name" placeholder=" " value="{{ old('last_name') }}"
                                                    required>
                                            </div>
                                        </div>
                                        <!-- Add Company Name Field -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="company-name" class="form-label">اسم الشركة <span class="text-danger">*</span></label>
                                                <input id="company-name" name="company_name" value="assa" class="form-control" type="text" placeholder=" " required>
                                            </div>
                                        </div>
                                        <!-- Add License Number Field -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="license-number" class="form-label">رقم السجل التجاري<span class="text-danger">*</span></label>
                                                <input id="license-number" name="license_number" value="{{ old('license_number') }}" class="form-control" type="text" placeholder=" " required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email11" class="form-label">البريد الالكتروني <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="email" placeholder=" "
                                                    id="email11" name="email" value="{{ old('email') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">رقم الهاتف<span
                                                    class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="phone"
                                                    name="phone_number" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password11" class="form-label">كلمة المرور <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="password" placeholder=" "
                                                    id="password11" name="password" required
                                                    autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="confirm-password" class="form-label">تأكيد كلمة المرور <span
                                                        class="text-danger">*</span></label>
                                                <input id="confirm-password" class="form-control" type="password"
                                                    placeholder=" " name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" name="terms"
                                                    class="custom-control-input form-check-input" id="customCheck1"
                                                    required>
                                                <label class="form-check-label" for="customCheck1">أنا أوافق على شروط الاستخدام</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary"> {{ __('اشتراك') }}</button>
                                    </div>
                                    {{--  or sign in with other socail media accounts? --}}
                                    {{-- <p class="text-center my-3">or sign in with other accounts?</p>
                                    <div class="d-flex justify-content-center">
                                        <ul class="list-group list-group-horizontal list-group-flush">
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="{{ asset('images/brands/fb.svg') }}"
                                                        alt="fb"></a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="{{ asset('images/brands/gm.svg') }}"
                                                        alt="gm"></a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="{{ asset('images/brands/im.svg') }}"
                                                        alt="im"></a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="#"><img src="{{ asset('images/brands/li.svg') }}"
                                                        alt="li"></a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <p class="mt-3 text-center">
                                        هل لديك حساب <a href="{{ route('login') }}"
                                            class="text-underline">تسجيل الدخول</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                <img src="{{ asset('images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX"
                    alt="images">
            </div>
        </div>
    </section>
</x-guest-layout>
