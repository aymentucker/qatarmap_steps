@if($isTour)
    <!-- Tour plugin Start -->
    <script src="{{asset('vendor/sheperd/dist/js/sheperd.min.js')}}"></script>
    <script src="{{asset('js/plugins/tour.js')}}" defer></script>
@endif

@if ($isMasonry)
    <!-- Masonry plugin Start -->
    <script src="{{asset('vendor/masonry/masonry.pkgd.min.js')}}" ></script>
@endif

@if ($isFlatpickr)
    <!-- Flatpickr Script -->
    <script src="{{asset('vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
    <script src="{{asset('js/plugins/flatpickr.js')}}" defer></script>
@endif

<script src="{{asset('js/plugins/slider-tabs.js') }}"></script>

@if ($isFslightbox)
    <!-- fslightbox JavaScript -->
    <script src="{{asset('js/plugins/fslightbox.js')}}" defer></script>
@endif

@if ($isSweetalert)
    <!-- Sweet-alert Script -->
    <script src="{{asset('vendor/sweetalert2/dist/sweetalert2.min.js')}}" async></script>
    <script src="{{asset('js/plugins/sweet-alert.js')}}" defer></script>
@endif

@if ($isChoisejs)
    <!-- Choisejs Script -->
    <script src="{{ asset('vendor/choiceJS/script/choices.min.js')}}"></script>
    <script src="{{ asset('js/plugins/choice.js')}}"></script>
@endif

@if ($isSelect2)
    <!-- Select2 Script -->
    <script src="{{asset('js/plugins/select2.js')}}" defer></script>
@endif

@if ($isFormWizard)
    <!-- Form Wizard Script -->
    <script src="{{asset('js/plugins/form-wizard.js')}}" defer></script>
@endif

@if ($isQuillEditor)
    <!-- Quill Editor Script -->
    <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('js/plugins/quill.js')}}" defer></script>
@endif

@if ($isCircleProgress)
    <!-- Circle-Progress Script -->
    <script src="{{asset('js/plugins/circle-progress.js')}}"></script>
    <script src="{{asset('js/plugins/custom-circle-progress.js')}}" defer></script>
@endif

@if ($isNoUISlider)
    <!-- NoUI Slider Script -->
    <script src="{{asset('vendor/noUiSilder/script/nouislider.min.js')}}"></script>
@endif

@if ($isSignaturePad)
    <!-- SignaturePad Script -->
    <script src="{{asset('vendor/signature_pad/dist/signature_pad.umd.js')}}"></script>
    <script src="{{asset('js/plugins/signaturepad.js')}}" defer></script>
@endif

@if ($isUppy)
    <!-- Uppy Script -->
    <script src="{{asset('vendor/uppy/uppy.min.js')}}"></script>
    <script src="{{asset('js/plugins/uppy.js')}}" defer></script>
@endif

@if ($isCropperjs)
    <script src="{{asset('vendor/cropper/dist/cropper.min.js')}}"></script>
    <script src="{{asset('js/plugins/image-croper.js')}}" defer></script>
@endif

@if ($isBarRatting)
    <script src="{{asset('js/plugins/rating.js')}}" defer></script>
    <script src="{{asset('vendor/jquery-bar-rating/dist/jquery-barrating.min.js')}}" async></script>
@endif

@if(in_array('data-table',$assets ?? []))
    <!-- Data Table Script -->
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js')}}"></script>
@endif

@if ($isVectorMap)
    <!-- MapChart JavaScript -->
    <script src="{{asset('vendor/leaflet/leaflet.js') }} "></script>
    <script src="{{asset('js/charts/vectore-chart.js') }}" defer></script>
@endif

@if(in_array('calender',$assets ?? []))
    <!-- Fullcalender Javascript -->
    <script src="{{asset('vendor/fullcalendar/core/main.js')}}" async></script>
    <script src="{{asset('vendor/fullcalendar/daygrid/main.js')}}" async></script>
    <script src="{{asset('vendor/fullcalendar/timegrid/main.js')}}" async></script>
    <script src="{{asset('vendor/fullcalendar/list/main.js')}}" async></script>
    <script src="{{asset('vendor/fullcalendar/interaction/main.js')}}" async></script>
    <script src="{{asset('vendor/moment.min.js')}}" async></script>
    <script src="{{asset('js/plugins/calender.js')}}" defer></script>
@endif

@if ($isPrism)
    <!-- Ajax Modal JavaScript -->
    <script src="{{asset('js/plugins/prism.mini.js')}}"></script>
@endif

@if($modalJs)
    <!-- Ajax Modal JavaScript -->
    <script src="{{asset('laravel-js/modal-view.js') }}" defer></script>
@endif

@if($isSwiperSlider)
<!-- SwiperSlider Javascript -->
<script src="{{asset('/vendor/swiperSlider/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/plugins/swiper-slider.js')}}" defer></script>
@endif


