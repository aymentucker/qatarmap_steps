<x-app-layout :assets="$assets ?? []" title="ecommerce-dashboard" isSelect2="true" isTour="true" isFlatpickr="true"
    :isSidebar="true" isSwiperSlider="true" :isBanner="false" :isPageContainer="true">
    <div class="row">
        <div class="col-lg-8 col-xl-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height">
                        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                            <div class="header-title">
                                <h4>Revenue</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton41"
                                    data-bs-toggle="dropdown" aria-expanded="false">Sort by:Month
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton41"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="eccomerce-chart-01" class="eccomerce-chart-01"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header flex-wrap d-flex align-items-center justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Customer Gender</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton56"
                                    data-bs-toggle="dropdown" aria-expanded="false">Sort By : Month
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton56"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="flex-wrap d-flex align-items-center justify-content-between">
                                <div id="eccomerce-chart-02" class=" col-lg-12 col-xl-12 col-xxl-6 eccomerce-chart-02">
                                </div>
                                <div class="d-grid gap-3 col-lg-12 col-xl-12 col-xxl-6">
                                    <div class="d-flex align-items-start">
                                        <svg class="mt-2 text-primary" xmlns="http://www.w3.org/2000/svg" width="14"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="mb-3">Current Customers:</span>
                                            <h6 class="mb-0">60%</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <svg class="mt-2 text-info" xmlns="http://www.w3.org/2000/svg" width="14"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="mb-3">New Customers:</span>
                                            <h6 class="mb-0">20%</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <svg class="mt-2 text-tertiray" xmlns="http://www.w3.org/2000/svg"
                                            width="14" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="mb-3">Retargeted Customers:</span>
                                            <h6 class="mb-0">20%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header flex-wrap d-flex align-items-center justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Top Rated</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton57"
                                    data-bs-toggle="dropdown" aria-expanded="false">See All Reviews
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton57"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="swiper-container qui-dashboard" id="top-dashboard">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        <div class="card border mb-lg-0 shadow-none">
                                            <div class="card-body p-3">
                                                <div class="text-center">
                                                    <img src="{{ asset('images/shapes/07.png') }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                                <p class="mb-2 mt-3">Product 1</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="mb-0 counter ">$56.00</h5>
                                                    <p class="mb-0 d-flex align-items-center">
                                                        <svg class="me-2" width="13" height="12"
                                                            viewBox="0 0 13 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                                fill="#FFD329" />
                                                        </svg>3.7
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border mb-lg-0 shadow-none">
                                            <div class="card-body p-3">
                                                <div class="text-center">
                                                    <img src="{{ asset('images/shapes/08.png') }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                                <p class="mb-2 mt-3">Product 2</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="mb-0 counter ">$56.00</h5>
                                                    <p class="mb-0 d-flex align-items-center">
                                                        <svg class="me-2" width="13" height="12"
                                                            viewBox="0 0 13 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                                fill="#FFD329" />
                                                        </svg>3.7
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border mb-lg-0 shadow-none">
                                            <div class="card-body p-3">
                                                <div class="text-center">
                                                    <img src="{{ asset('images/shapes/09.png') }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                                <p class="mb-2 mt-3">Product 3</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="mb-0 counter ">$56.00</h5>
                                                    <p class="mb-0 d-flex align-items-center">
                                                        <svg class="me-2" width="13" height="12"
                                                            viewBox="0 0 13 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                                fill="#FFD329" />
                                                        </svg>3.7
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border mb-lg-0 shadow-none">
                                            <div class="card-body p-3">
                                                <div class="text-center">
                                                    <img src="{{ asset('images/shapes/08.png') }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                                <p class="mb-2 mt-3">Product 2</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="mb-0 counter ">$56.00</h5>
                                                    <p class="mb-0 d-flex align-items-center">
                                                        <svg class="me-2" width="13" height="12"
                                                            viewBox="0 0 13 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                                fill="#FFD329" />
                                                        </svg>3.7
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card border mb-lg-0 shadow-none">
                                            <div class="card-body p-3">
                                                <div class="text-center">
                                                    <img src="{{ asset('images/shapes/09.png') }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                                <p class="mb-2 mt-3">Product 3</p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="mb-0 counter ">$56.00</h5>
                                                    <p class="mb-0 d-flex align-items-center">
                                                        <svg class="me-2" width="13" height="12"
                                                            viewBox="0 0 13 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                                fill="#FFD329" />
                                                        </svg>3.7
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination-dot mt-3 text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                            <div class="header-title">
                                <h4>To-Do List</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton58"
                                    data-bs-toggle="dropdown" aria-expanded="false">Sort By : Month
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton58"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive border rounded">
                                <table id="datatable" class="table mb-0  table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Profile</th>
                                            <th>Revenue</th>
                                            <th>Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <img src="{{ asset('images/shapes/10.png') }}" alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Anne Teak</h6>
                                                    <small>@musk</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$25,166 </h6>
                                            </td>
                                            <td>
                                                <h6>4669</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('images/shapes/11.png') }}" alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Jacob Jones</h6>
                                                    <small>@Jones</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$43,526 </h6>
                                            </td>
                                            <td>
                                                <h6>8652</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('images/shapes/12.png') }}" alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Leslie Alexander</h6>
                                                    <small>@leslie</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$52,125 </h6>
                                            </td>
                                            <td>
                                                <h6>9587</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('images/shapes/13.png') }}" alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Albert Flores</h6>
                                                    <small>@albert</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$13,657</h6>
                                            </td>
                                            <td>
                                                <h6>2304</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-4">
            <div class="card weather-card bg-primary">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="d-flex justify-content-between align-items-center  gap-4 rounded pb-0">
                            <div>
                                <h4>27&deg;</h4>
                                <small class="mb-0">Mumbai, India</small>
                            </div>
                            <div class=" iq-product-weather d-flex gap-2">
                                <div class=" d-flex flex-column align-items-center">
                                    <svg class="text-primary icon-35" xmlns="http://www.w3.org/2000/svg"
                                        width="35" viewBox="0 0 44 44" fill="none">
                                        <path
                                            d="M21.9997 7.33337C27.1644 7.33337 30.0936 10.5397 30.5189 14.41H30.6488C33.9719 14.41 36.6663 16.9299 36.6663 20.0384C36.6663 23.1469 33.9719 25.6667 30.6488 25.6667L29.1759 25.6647V25.6667C25.2806 25.6667 18.4961 25.6667 13.3505 25.6667C10.0275 25.6667 7.33301 23.1469 7.33301 20.0384C7.33301 17.0439 9.83053 14.5974 12.9839 14.4202L13.4804 14.41C13.91 10.5132 16.8349 7.33337 21.9997 7.33337Z"
                                            fill="#ffffff" />
                                        <path
                                            d="M25.6663 32.5926V36.6667M18.333 18.3334V22.4074V18.3334ZM18.333 28.5186V32.5926V28.5186ZM25.6663 22.4074V26.4815V22.4074Z"
                                            stroke="#EBEEFD" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-1 mb-0">48%</p>
                                </div>
                                <div class=" d-flex flex-column align-items-center">
                                    <svg class="text-primary icon-35" xmlns="http://www.w3.org/2000/svg"
                                        width="35" viewBox="0 0 44 44" fill="none">
                                        <path
                                            d="M9.1665 14.6667H24.7498C25.6013 14.6829 26.4405 14.4617 27.1732 14.0277C27.9059 13.5937 28.5033 12.9642 28.8982 12.2097C29.2931 11.4552 29.4701 10.6056 29.4091 9.75613C29.3482 8.9067 29.0517 8.09105 28.5531 7.40066C28.0545 6.71028 27.3734 6.17246 26.5862 5.84754C25.799 5.52262 24.9369 5.42344 24.0965 5.56113C23.2561 5.69882 22.4706 6.06794 21.8283 6.62707C21.1859 7.18621 20.7121 7.91325 20.4598 8.72665"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M5.5 22H33.9167C34.7681 21.9837 35.6073 22.2049 36.34 22.6389C37.0728 23.0729 37.6701 23.7025 38.065 24.457C38.46 25.2115 38.6369 26.0611 38.5759 26.9105C38.515 27.7599 38.2186 28.5756 37.72 29.266C37.2214 29.9564 36.5403 30.4942 35.7531 30.8191C34.9659 31.144 34.1037 31.2432 33.2633 31.1055C32.4229 30.9678 31.6375 30.5987 30.9951 30.0396C30.3528 29.4804 29.8789 28.7534 29.6267 27.94"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M7.3335 29.3333H17.4168C18.2683 29.317 19.1074 29.5383 19.8402 29.9723C20.5729 30.4063 21.1703 31.0358 21.5652 31.7903C21.9601 32.5448 22.137 33.3944 22.0761 34.2439C22.0151 35.0933 21.7187 35.9089 21.2201 36.5993C20.7215 37.2897 20.0404 37.8275 19.2532 38.1524C18.466 38.4774 17.6039 38.5765 16.7635 38.4389C15.9231 38.3012 15.1376 37.932 14.4953 37.3729C13.8529 36.8138 13.3791 36.0867 13.1268 35.2733"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-1 mb-0">12 km/h</p>
                                </div>
                                <div class=" d-flex flex-column align-items-center">
                                    <svg class="text-primary icon-35" xmlns="http://www.w3.org/2000/svg"
                                        width="35" viewBox="0 0 44 44" fill="none">
                                        <path
                                            d="M12.4664 20.1667C11.5023 21.839 10.9952 23.7355 10.9961 25.6659C10.997 27.5962 11.5058 29.4923 12.4715 31.1637C13.4372 32.8351 14.8257 34.223 16.4976 35.1879C18.1694 36.1528 20.0658 36.6608 21.9961 36.6608C23.9264 36.6608 25.8228 36.1528 27.4946 35.1879C29.1665 34.223 30.555 32.8351 31.5207 31.1637C32.4864 29.4923 32.9952 27.5962 32.9961 25.6659C32.997 23.7355 32.4899 21.839 31.5258 20.1667L21.9979 5.5L12.4646 20.1667H12.4664Z"
                                            fill="#ffffff" />
                                        <path
                                            d="M26.6091 31.2369V31.2369C26.5668 31.0401 26.6123 30.8327 26.7351 30.6634C26.8579 30.494 27.0471 30.3775 27.2585 30.3412V30.3412C27.9401 30.1705 28.4461 29.6116 28.5173 28.9509C28.5133 28.5458 28.8559 28.2027 29.2841 28.1828C29.7045 28.16 30.0551 28.4603 30.0716 28.8574C30.0772 28.9066 30.073 28.9566 30.0593 29.0049C29.9389 30.3235 28.9259 31.4423 27.5622 31.7628C27.3576 31.8188 27.1406 31.7943 26.9609 31.6952C26.7812 31.596 26.6543 31.4306 26.6091 31.2369Z"
                                            fill="white" />
                                    </svg>
                                    <p class="mt-1 mb-0">50</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-transparent shadow-none overflow-hidden">
                <div class="header-title">
                    <h4 class="mb-4">Your Cards</h4>
                </div>
                <div class="card-body p-0">
                    <div class="card visa-card-widget mb-0">
                        <div class="pb-4 border-0 card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="font-weight-bold">VISA </h5>
                                    <P class="mb-0">PREMIUM ACCOUNT</P>
                                </div>
                                <div class="master-card-content d-flex align-items-center">
                                    <svg class="master-card-1" width="60" height="60" viewBox="0 0 24 24">
                                        <path fill="#ffffff"
                                            d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                    </svg>
                                    <svg class="master-card-2" width="60" height="60" viewBox="0 0 24 24">
                                        <path fill="#ffffff"
                                            d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="card-number d-flex align-items-center justify-content-between">
                                    <span class="fs-5 me-2">5789</span>
                                    <span class="fs-5 me-2">****</span>
                                    <span class="fs-5 me-2">****</span>
                                    <span class="fs-5">2847</span>
                                </div>
                            </div>
                            <div class="mb-2 d-flex align-items-center justify-content-between">
                                <p class="mb-0">Card holder</p>
                                <p class="mb-0">Expire Date</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6>Anne Teak</h6>
                                <h6>06/21</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-cols-2 d-grid gap-card mb-5">
                <button class="p-2 btn btn-primary">Add Card</button>
                <button class="p-2 btn btn-danger">Remove Card</button>
            </div>
            <div class="card ">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="mb-0">Product Delivery</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card border mb-3 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/shapes/14.png') }}" alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-2">T-shirts</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray " id="dropdownMenuButton30"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="22" height="5" viewBox="0 0 22 5" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton30" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To: <b>Anne Teak</b></small>
                                <span class="badge bg-soft-success">Delivered</span>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-3 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/shapes/15.png') }}" alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-2">Shoes</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray " id="dropdownMenuButton32"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="22" height="5" viewBox="0 0 22 5" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton32" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To: <b>Anne Teak</b></small>
                                <span class="badge bg-soft-gray">Shipping</span>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-3 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/shapes/16.png') }}" alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-2">Watch</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray" id="dropdownMenuButton34"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="22" height="5" viewBox="0 0 22 5" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton34" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To: Anne Teak</small>
                                <span class="badge bg-soft-danger">Confirmed</span>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-lg-0 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('images/shapes/17.png') }}" alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-0">Earphones</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray" id="dropdownMenuButton35"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="22" height="5" viewBox="0 0 22 5" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton35" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To:<b> Anne Teak</b></small>
                                <span class="badge bg-soft-success">Delivered</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-block card-stretch card-height">
                        <div class="flex-wrap card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4>Revenue</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                    data-bs-toggle="dropdown" aria-expanded="false">Sort by: <small>Month</small>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton30"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="eccomerce-chart-01" class="eccomerce-chart-01"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="bg-primary avatar-70 rounded text-white">
                                <svg width="35" height="34" viewBox="0 0 35 34" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M0.833984 15.4639C0.917318 19.3605 1.15065 26.0255 1.18398 26.7605C1.30232 28.3322 1.90398 29.9205 2.84065 31.0405C4.14398 32.6122 5.74898 33.3139 7.98732 33.3139C11.0807 33.3305 14.4907 33.3305 17.8023 33.3305C21.1273 33.3305 24.354 33.3305 27.079 33.3139C29.2857 33.3139 30.9407 32.5939 32.2273 31.0405C33.164 29.9205 33.7656 28.3155 33.8507 26.7605C33.884 26.1422 34.0507 18.9072 34.1507 15.4639H0.833984Z"
                                        fill="currentColor" />
                                    <path
                                        d="M16.2422 22.6406V24.7973C16.2422 25.4873 16.8022 26.0473 17.4922 26.0473C18.1822 26.0473 18.7422 25.4873 18.7422 24.7973V22.6406C18.7422 21.9506 18.1822 21.3906 17.4922 21.3906C16.8022 21.3906 16.2422 21.9506 16.2422 22.6406Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14.519 21.2607C14.3523 21.8657 13.7707 22.2523 13.1407 22.169C8.88898 21.5757 4.82565 20.0673 1.39565 17.8023C1.04398 17.5723 0.833984 17.179 0.833984 16.759V10.9823C0.833984 7.48232 3.68732 4.63565 7.19565 4.63565H10.474C10.7873 2.21565 12.8373 0.333984 15.3407 0.333984H19.644C22.1457 0.333984 24.1973 2.21565 24.5107 4.63565H27.8057C31.304 4.63565 34.1507 7.48232 34.1507 10.9823V16.759C34.1507 17.179 33.939 17.5707 33.5907 17.8023C30.154 20.0773 26.074 21.5923 21.794 22.184C21.7357 22.1923 21.679 22.1957 21.6223 22.1957C21.0573 22.1957 20.5523 21.814 20.4107 21.254C20.074 19.9273 18.869 18.999 17.484 18.999C16.0807 18.999 14.889 19.9073 14.519 21.2607ZM19.644 2.83398H15.3407C14.219 2.83398 13.2823 3.60065 13.0023 4.63565H21.9807C21.7007 3.60065 20.764 2.83398 19.644 2.83398Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="ms-4" style="width: 100%;">
                                <h3>$52,54</h3>
                                <p class="mb-0">Total Earning</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="bg-primary avatar-70 rounded text-white">
                                <svg width="35" height="31" viewBox="0 0 35 31" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M34.1604 9.45854H27.1026C23.8182 9.46432 21.1575 12.0586 21.1515 15.2609C21.1471 18.4705 23.8108 21.0763 27.1026 21.0807H34.1663V21.5906C34.1663 27.1893 30.7723 30.5 25.0286 30.5H9.97227C4.22708 30.5 0.833008 27.1893 0.833008 21.5906V9.39643C0.833008 3.7977 4.22708 0.5 9.97227 0.5H25.0226C30.7663 0.5 34.1604 3.7977 34.1604 9.39643V9.45854ZM8.73227 9.44554H18.1323H18.1382H18.15C18.8538 9.44265 19.4226 8.88365 19.4197 8.19609C19.4167 7.50997 18.8419 6.95529 18.1382 6.95818H8.73227C8.03301 6.96107 7.4656 7.5143 7.46264 8.19753C7.45967 8.88365 8.02856 9.44265 8.73227 9.44554Z"
                                        fill="currentColor" />
                                    <path opacity="0.4"
                                        d="M24.2284 15.9944C24.5769 17.5798 25.9668 18.6951 27.5537 18.6661H32.9702C33.6305 18.6661 34.166 18.1193 34.166 17.4434V13.2242C34.1646 12.5497 33.6305 12.0015 32.9702 12H27.4261C25.6211 12.0058 24.1632 13.5041 24.166 15.3505C24.166 15.5666 24.1873 15.7827 24.2284 15.9944Z"
                                        fill="currentColor" />
                                    <ellipse cx="27.4997" cy="15.3337" rx="1.66667" ry="1.66667"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="ms-4" style="width: 100%;">
                                <h3>$4955</h3>
                                <p class="mb-0">Monthly Earning</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="bg-primary avatar-70 rounded text-white">
                                <svg width="32" height="35" viewBox="0 0 32 35" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M23.7008 34.166H8.29982C3.81571 34.166 0.166992 30.5511 0.166992 26.107V17.2251C0.166992 12.7809 3.81571 9.16602 8.29982 9.16602H23.7008C28.1849 9.16602 31.8337 12.7809 31.8337 17.2251V26.107C31.8337 30.5511 28.1849 34.166 23.7008 34.166Z"
                                        fill="currentColor" />
                                    <path
                                        d="M22.2586 14.1663C21.5733 14.1663 21.0171 13.6269 21.0171 12.9622V8.0945C21.0171 5.4182 18.7726 3.2412 16.0149 3.2412C14.7453 3.2412 13.4128 3.73568 12.4644 4.64597C11.5142 5.55948 10.9879 6.77481 10.9829 8.07202V12.9622C10.9829 13.6269 10.4267 14.1663 9.74145 14.1663C9.05617 14.1663 8.5 13.6269 8.5 12.9622V8.0945C8.50828 6.12139 9.29618 4.3008 10.7164 2.93776C12.135 1.57152 13.969 0.885988 16.0199 0.833008C20.1415 0.833008 23.5 4.09048 23.5 8.0945V12.9622C23.5 13.6269 22.9438 14.1663 22.2586 14.1663Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="ms-4" style="width: 100%;">
                                <h3>$4955</h3>
                                <p class="mb-0">Total Profit</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header flex-wrap d-flex align-items-center justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Customer Gender</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                    data-bs-toggle="dropdown" aria-expanded="false">Sort by : Month
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton56"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="flex-wrap d-flex align-items-center justify-content-between">
                                <div id="eccomerce-chart-02" class="col-md-6 col-lg-12 col-xl-6 eccomerce-chart-02">
                                </div>
                                <div class="d-grid gap-3 col-md-6 col-lg-6 col-lg-12 col-xl-6">
                                    <div class="d-flex align-items-start">
                                        <svg class="mt-2 text-primary" xmlns="http://www.w3.org/2000/svg"
                                            width="14" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="mb-3">Current Customers:</span>
                                            <h6 class="mb-0">60%</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <svg class="mt-2 text-info" xmlns="http://www.w3.org/2000/svg" width="14"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="mb-3">New Customers:</span>
                                            <h6 class="mb-0">20%</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <svg class="mt-2 text-tertiray" xmlns="http://www.w3.org/2000/svg"
                                            width="14" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8"
                                                    fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <div class="ms-2">
                                            <span class="mb-3">Retargeted Customers:</span>
                                            <h6 class="mb-0">20%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header flex-wrap d-flex align-items-center justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Top Rated</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                    data-bs-toggle="dropdown" aria-expanded="false">See all reviews
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton57"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-3  d-grid-template-1fr-10">
                                <div class="card border-1 mb-lg-0">
                                    <div class="card-body p-3">
                                        <div class="text-center">
                                            <img src={{ asset('images/shapes/07.png') }} class="img-fluid"
                                                alt="">
                                        </div>
                                        <p class="mb-2 mt-3">Product 1</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0 counter ">$56.00</h5>
                                            <p class="mb-0 d-flex align-items-center">
                                                <svg class="me-2" width="13" height="12"
                                                    viewBox="0 0 13 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                        fill="#FFD329" />
                                                </svg>3.7
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-1 mb-lg-0">
                                    <div class="card-body p-3">
                                        <div class="text-center">
                                            <img src={{ asset('images/shapes/08.png') }} class="img-fluid"
                                                alt="">
                                        </div>
                                        <p class="mb-2 mt-3">Product 2</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0 counter ">$56.00</h5>
                                            <p class="mb-0 d-flex align-items-center">
                                                <svg class="me-2" width="13" height="12"
                                                    viewBox="0 0 13 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                        fill="#FFD329" />
                                                </svg>3.7
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-1 mb-lg-0 ">
                                    <div class="card-body p-3">
                                        <div class="text-center">
                                            <img src={{ asset('images/shapes/09.png') }} class="img-fluid"
                                                alt="">
                                        </div>
                                        <p class="mb-2 mt-3">Product 3</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0 counter ">$56.00</h5>
                                            <p class="mb-0 d-flex align-items-center">
                                                <svg class="me-2" width="13" height="12"
                                                    viewBox="0 0 13 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.11019 0.446009L8.50174 3.24243C8.60426 3.44503 8.79993 3.58573 9.0256 3.617L12.1513 4.07223C12.3338 4.09787 12.4995 4.19416 12.6114 4.34111C12.722 4.48619 12.7695 4.67003 12.7426 4.85075C12.7208 5.00082 12.6501 5.13965 12.542 5.24595L10.2771 7.44144C10.1115 7.59464 10.0364 7.82163 10.0765 8.04362L10.6341 11.1302C10.6935 11.5029 10.4465 11.8543 10.0765 11.925C9.92392 11.9494 9.76763 11.9237 9.6301 11.8537L6.84201 10.4011C6.63509 10.2966 6.39066 10.2966 6.18374 10.4011L3.39564 11.8537C3.05307 12.0357 2.6286 11.9118 2.43794 11.5742C2.3673 11.4397 2.34229 11.2865 2.36542 11.1371L2.92304 8.04988C2.96305 7.82851 2.88741 7.60027 2.72237 7.44707L0.45751 5.25283C0.188078 4.9927 0.179951 4.56435 0.439382 4.29484C0.445008 4.28921 0.451259 4.28296 0.45751 4.27671C0.565034 4.16728 0.706314 4.09787 0.858847 4.07973L3.98452 3.62387C4.20957 3.59198 4.40523 3.45254 4.50838 3.24868L5.84992 0.446009C5.96932 0.205887 6.21687 0.0564357 6.48568 0.0626889H6.56945C6.80262 0.0908282 7.00579 0.235277 7.11019 0.446009Z"
                                                        fill="#FFD329" />
                                                </svg>3.7
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="flex-wrap card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4>To-Do List</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                    data-bs-toggle="dropdown" aria-expanded="false">Sort by : Month
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton58"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body px-0 ">
                            <div class="table-responsive">
                                <table id="datatable" class="table mb-0 table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Profile</th>
                                            <th>Revenue</th>
                                            <th>Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <img src={{ asset('images/shapes/10.png') }} alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Elon Musk</h6>
                                                    <small>@musk</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$25,166 </h6>
                                            </td>
                                            <td>
                                                <h6>4669</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src={{ asset('images/shapes/11.png') }} alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Jacob Jones</h6>
                                                    <small>@Jones</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$43,526 </h6>
                                            </td>
                                            <td>
                                                <h6>8652</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src={{ asset('images/shapes/12.png') }} alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Leslie Alexander</h6>
                                                    <small>@leslie</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$52,125 </h6>
                                            </td>
                                            <td>
                                                <h6>9587</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src={{ asset('images/shapes/13.png') }} alt=""
                                                    class="img-fluid"></td>
                                            <td>
                                                <div class="">
                                                    <h6>Albert Flores</h6>
                                                    <small>@albert</small>
                                                </div>
                                            </td>
                                            <td>
                                                <h6>$13,657</h6>
                                            </td>
                                            <td>
                                                <h6>2304</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card weather-card bg-primary">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="d-flex justify-content-between align-items-center  gap-4 rounded pb-0">
                            <div>
                                <h4>27&deg;</h4>
                                <small class="mb-0">Mumbai, India</small>
                            </div>
                            <div class=" iq-product-weather d-flex gap-2">
                                <div class=" d-flex flex-column align-items-center">
                                    <svg class="text-primary icon-35" xmlns="http://www.w3.org/2000/svg"
                                        width="35" viewBox="0 0 44 44" fill="none">
                                        <path
                                            d="M21.9997 7.33337C27.1644 7.33337 30.0936 10.5397 30.5189 14.41H30.6488C33.9719 14.41 36.6663 16.9299 36.6663 20.0384C36.6663 23.1469 33.9719 25.6667 30.6488 25.6667L29.1759 25.6647V25.6667C25.2806 25.6667 18.4961 25.6667 13.3505 25.6667C10.0275 25.6667 7.33301 23.1469 7.33301 20.0384C7.33301 17.0439 9.83053 14.5974 12.9839 14.4202L13.4804 14.41C13.91 10.5132 16.8349 7.33337 21.9997 7.33337Z"
                                            fill="#ffffff" />
                                        <path
                                            d="M25.6663 32.5926V36.6667M18.333 18.3334V22.4074V18.3334ZM18.333 28.5186V32.5926V28.5186ZM25.6663 22.4074V26.4815V22.4074Z"
                                            stroke="#EBEEFD" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-1 mb-0">48%</p>
                                </div>
                                <div class=" d-flex flex-column align-items-center">
                                    <svg class="text-primary icon-35" xmlns="http://www.w3.org/2000/svg"
                                        width="35" viewBox="0 0 44 44" fill="none">
                                        <path
                                            d="M9.1665 14.6667H24.7498C25.6013 14.6829 26.4405 14.4617 27.1732 14.0277C27.9059 13.5937 28.5033 12.9642 28.8982 12.2097C29.2931 11.4552 29.4701 10.6056 29.4091 9.75613C29.3482 8.9067 29.0517 8.09105 28.5531 7.40066C28.0545 6.71028 27.3734 6.17246 26.5862 5.84754C25.799 5.52262 24.9369 5.42344 24.0965 5.56113C23.2561 5.69882 22.4706 6.06794 21.8283 6.62707C21.1859 7.18621 20.7121 7.91325 20.4598 8.72665"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M5.5 22H33.9167C34.7681 21.9837 35.6073 22.2049 36.34 22.6389C37.0728 23.0729 37.6701 23.7025 38.065 24.457C38.46 25.2115 38.6369 26.0611 38.5759 26.9105C38.515 27.7599 38.2186 28.5756 37.72 29.266C37.2214 29.9564 36.5403 30.4942 35.7531 30.8191C34.9659 31.144 34.1037 31.2432 33.2633 31.1055C32.4229 30.9678 31.6375 30.5987 30.9951 30.0396C30.3528 29.4804 29.8789 28.7534 29.6267 27.94"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M7.3335 29.3333H17.4168C18.2683 29.317 19.1074 29.5383 19.8402 29.9723C20.5729 30.4063 21.1703 31.0358 21.5652 31.7903C21.9601 32.5448 22.137 33.3944 22.0761 34.2439C22.0151 35.0933 21.7187 35.9089 21.2201 36.5993C20.7215 37.2897 20.0404 37.8275 19.2532 38.1524C18.466 38.4774 17.6039 38.5765 16.7635 38.4389C15.9231 38.3012 15.1376 37.932 14.4953 37.3729C13.8529 36.8138 13.3791 36.0867 13.1268 35.2733"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <p class="mt-1 mb-0">12 km/h</p>
                                </div>
                                <div class=" d-flex flex-column align-items-center">
                                    <svg class="text-primary icon-35" xmlns="http://www.w3.org/2000/svg"
                                        width="35" viewBox="0 0 44 44" fill="none">
                                        <path
                                            d="M12.4664 20.1667C11.5023 21.839 10.9952 23.7355 10.9961 25.6659C10.997 27.5962 11.5058 29.4923 12.4715 31.1637C13.4372 32.8351 14.8257 34.223 16.4976 35.1879C18.1694 36.1528 20.0658 36.6608 21.9961 36.6608C23.9264 36.6608 25.8228 36.1528 27.4946 35.1879C29.1665 34.223 30.555 32.8351 31.5207 31.1637C32.4864 29.4923 32.9952 27.5962 32.9961 25.6659C32.997 23.7355 32.4899 21.839 31.5258 20.1667L21.9979 5.5L12.4646 20.1667H12.4664Z"
                                            fill="#ffffff" />
                                        <path
                                            d="M26.6091 31.2369V31.2369C26.5668 31.0401 26.6123 30.8327 26.7351 30.6634C26.8579 30.494 27.0471 30.3775 27.2585 30.3412V30.3412C27.9401 30.1705 28.4461 29.6116 28.5173 28.9509C28.5133 28.5458 28.8559 28.2027 29.2841 28.1828C29.7045 28.16 30.0551 28.4603 30.0716 28.8574C30.0772 28.9066 30.073 28.9566 30.0593 29.0049C29.9389 30.3235 28.9259 31.4423 27.5622 31.7628C27.3576 31.8188 27.1406 31.7943 26.9609 31.6952C26.7812 31.596 26.6543 31.4306 26.6091 31.2369Z"
                                            fill="white" />
                                    </svg>
                                    <p class="mt-1 mb-0">50</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-transparent shadow-none">
                <div class="header-title">
                    <h4 class="mb-4">Your Cards</h4>
                </div>
                <div class="card-body p-0">
                    <div class="card visa-card-widget mb-0">
                        <div class="pb-4 border-0 card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="font-weight-bold">VISA </h5>
                                    <P class="mb-0">PREMIUM ACCOUNT</P>
                                </div>
                                <div class="master-card-content">
                                    <svg class="master-card-1" width="60" height="60" viewBox="0 0 24 24">
                                        <path fill="#ffffff"
                                            d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                    </svg>
                                    <svg class="master-card-2" width="60" height="60" viewBox="0 0 24 24">
                                        <path fill="#ffffff"
                                            d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="card-number d-flex align-items-center justify-content-between">
                                    <span class="fs-5 me-2">5789</span>
                                    <span class="fs-5 me-2">****</span>
                                    <span class="fs-5 me-2">****</span>
                                    <span class="fs-5">2847</span>
                                </div>
                            </div>
                            <div class="mb-2 d-flex align-items-center justify-content-between">
                                <p class="mb-0">Card holder</p>
                                <p class="mb-0">Expire Date</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6>Elon Musk</h6>
                                <h6>06/21</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mb-5">
                <div class="col-6">
                    <a href="#" class="btn btn-primary w-100">Add Card</a>
                </div>
                <div class="col-6">
                    <a href="#" class="btn btn-danger w-100">Remove Card</a>
                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="mb-0">Product Delivery</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card border mb-3 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src={{ asset('images/shapes/14.png') }} alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-2">T-shirts</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton22" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To: <b>Elon Musk</b></small>
                                <span class="badge bg-soft-success">Delivered</span>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-3 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src={{ asset('images/shapes/15.png') }} alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-2">Shoes</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton32" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To: <b>Elon Musk</b></small>
                                <span class="badge bg-soft-gray">Shipping</span>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-3 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src={{ asset('images/shapes/16.png') }} alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-2">Watch</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton34" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To: Elon Musk</small>
                                <span class="badge bg-soft-danger">Confirmed</span>
                            </div>
                        </div>
                    </div>
                    <div class="card border mb-lg-0 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <img src={{ asset('images/shapes/17.png') }} alt="" class="img-fluid">
                                    <div class="ms-3">
                                        <p class="mb-0">Earphones</p>
                                        <h6 class="mb-0">$56.00</h6>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="dropdown">
                                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton30"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton35" style="">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="mb-0">To:<b> Elon Musk</b></small>
                                <span class="badge bg-soft-success">Delivered</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</x-app-layout>
