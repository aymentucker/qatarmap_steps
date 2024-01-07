<x-guest-layout>
    <div class="error-bg vh-100"
        style="background-image: url({{ asset('images/error/05.png') }}); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row align-items-center align-self-center vh-100">
                <div class="col-lg-7 md-lg-0"><img src="{{ asset('images/error/07.png') }}" style="width: 100%"></div>
                <div class="col-lg-5 text-end">
                    <h1 class="mb-0 mt-4 ">Oops! </h1>
                    <h3 class="mt-2 mb-4 text-white">This Page is Not Working.</h3>
                    <a class=" d-inline-flex align-items-center btn btn-outline-light"
                        href="{{ route('dashboards') }}">Back to
                        Home</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
