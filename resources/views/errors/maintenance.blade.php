<x-guest-layout>
    <div class="error-bg vh-100 bg-primary"
        style="background-image: url({{ asset('images/error/05.png') }}); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row align-items-center align-self-center vh-100">
                <div class="col-lg-7 md-lg-0">
                    <img src="{{ asset('images/error/08.png') }}" class="img-fluid">
                </div>
                <div class="col-lg-5 text-end">
                    <h2 class="mb-0 mt-4 text-white">Hang on! We are under maintenance </h2>
                    <p class="mt-2 mb-4 text-white">It will not take a long time till we get the error fiked. We wii live
                        again in</p>
                    <a class=" d-inline-flex align-items-center btn btn-outline-light"
                        href="{{ route('dashboards') }}">Back to
                        Home</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
