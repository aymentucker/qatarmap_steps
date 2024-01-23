<x-guest-layout>
    <section class="login-content">
        <div class="row m-0 align-items-center bg-white h-100">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div
                            class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card iq-auth-form">
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
                                <h2 class="mb-2 text-center">تسجيل دخول</h2>
                                <p class="text-center">تسجيل الدخول للبقاء على اتصال.</p>
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('login') }}" data-toggle="validator"
                                    class="">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12">

                                            @if (count($roles ?? ''))
                                                <div class="d-flex mb-3 gap justify-content-center" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    @foreach ($roles ?? '' as $key => $value)
                                                        <div class="">
                                                            <input type="radio" class="btn-check"
                                                                value={{ $value->name }} name="role"
                                                                id="roles-{{ $key }}" autocomplete="off"
                                                                data-demo="{{ env('IS_DEMO') ? 'true' : 'false' }}"
                                                                data-change="email"
                                                                {{ env('IS_DEMO') && $value->name == 'admin' ? 'checked' : '' }}>
                                                            <label class="btn btn-outline-primary d-block w-100"
                                                                for="roles-{{ $key }}">{{ $value->title }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="email" class="form-label">البريد الالكتروني</label>
                                                <input id="email" type="email" name="email"
                                                    value="{{ env('IS_DEMO') ? 'admin@example.com' : old('email') }}"
                                                    class="form-control" placeholder="admin@example.com" required
                                                    autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" class="form-label">كلمة المرور</label>
                                                <input class="form-control" type="password" placeholder="********"
                                                    name="password" value="{{ env('IS_DEMO') ? 'password' : '' }}"
                                                    required autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="customCheck1"
                                                    name="remember">
                                                <label class="form-check-label" for="customCheck1">تذكرني</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="{{ route('password.request') }}" class="float-end">فقدت كلمة المرور؟</a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">{{ __('تسجيل دخول') }}</button>
                                    </div>
                                    {{-- or sign in with other socail media accounts --}}
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
                                        ليس لديك حساب؟ <a href="{{ route('register') }}"
                                            class="text-underline">انقر هنا لتسجيل شركتك.</a>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('[data-change="email"]').on('change', function() {
                    const role = $(this).val();
                    const isDemo = $(this).attr('data-demo');
                    if (isDemo === 'true') {
                        if (role == 'admin') {
                            $('#email').val('admin@example.com')
                        } else if (role == 'user') {
                            $('#email').val('user@example.com')
                        } else if (role == 'demo_admin') {
                            $('#email').val('demo@example.com')
                        }
                    }
                });
            });
        </script>
    @endpush

</x-guest-layout>
