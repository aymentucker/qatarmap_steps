<x-guest-layout isSidebar="false">
    <section class="login-content overflow-hidden">
        <div class="row no-gutters align-items-center bg-white">
            <div class="col-md-12 col-lg-6 align-self-center">
                <a href="{{ route('dashboards') }}"
                    class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
                    <div class="logo-normal">
                        <svg viewBox="0 0 32 32" width="80px" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.25333 2H22.0444L29.7244 15.2103L22.0444 28.1333H7.25333L0 15.2103L7.25333 2ZM11.2356 9.32316H18.0622L21.3334 15.2103L18.0622 20.9539H11.2356L8.10669 15.2103L11.2356 9.32316Z"
                                fill="currentColor" />
                            <path d="M23.751 30L13.2266 15.2103H21.4755L31.9999 30H23.751Z" fill="#3FF0B9" />
                        </svg>
                    </div>
                    <h2 class="logo-title ms-3 mb-0" data-setting="app_name">{{ env('APP_NAME') }}</h2>
                </a>
                <div class="row justify-content-center pt-5">
                    <div class="col-md-8">
                        <div class="card  d-flex justify-content-center mb-0">
                            <div class="card-body">
                                <h2 class="mt-3 mb-4">Success !</h2>
                                <p class="cnf-mail mb-1">A email has been send to youremail@domain.com. Please check for
                                    an
                                    email from company and click
                                    on the included link to reset your password.</p>
                                <div class="d-inline-block w-100">
                                    <a href="{{ route('dashboards') }}" class="btn btn-primary mt-3">Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 d-lg-block d-none bg-primary p-0  overflow-hidden">
                <img src="{{ asset('images/auth/01.png') }}" class="img-fluid gradient-main" alt="images"
                    loading="lazy">
            </div>
        </div>
    </section>
</x-guest-layout>
