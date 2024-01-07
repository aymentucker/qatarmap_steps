<x-app-layout :assets="$assets ?? []" title="analytics-dashboard" isSelect2="true" isTour="true" isFlatpickr="true"
    isSwiperSlider="true" :isSidebar="true" :isBanner="false" :isPageContainer="true">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <h4 class="mb-5">Analytics Overview</h4>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2 class="mb-3">862k</h2>
                            <h5>Users</h5>
                            <small>10% Decrease last week</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2 class="mb-3">4.1M</h2>
                            <h5>Sessions</h5>
                            <small>24% Decrease last week</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2 class="mb-3">143k</h2>
                            <h5>Visit Duration</h5>
                            <small>10% change</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2 class="mb-3">32%</h2>
                            <h5>Bounce Rate</h5>
                            <small>10% change</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height">
                        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                            <div class="header-title">
                                <h4>Audience Metrics</h4>
                            </div>
                            <div class="d-flex">
                                <div class="me-3">
                                    <p class="mb-0"><svg class="text-primary" width="10" height="10"
                                            viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="5" fill="currentColor" />
                                        </svg> Avg.Session</p>
                                </div>
                                <div class="me-3">
                                    <p class="mb-0"><svg class="text-secondary" width="10" height="10"
                                            viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="5" fill="currentColor" />
                                        </svg> Conversion Rate</p>
                                </div>
                                <div class="">
                                    <p class="mb-0"><svg class="text-tertiray" width="10" height="10"
                                            viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="5" cy="5" r="5" fill="currentColor" />
                                        </svg> Avg. Session Durations</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="analytics-chart-01" class="analytics-chart-01"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height">
                        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                            <div class="header-title">
                                <h4>Live Users</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray" id="dropdownMenuButton34" data-bs-toggle="dropdown"
                                    aria-expanded="false"><svg width="22" height="5" viewBox="0 0 22 5"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton34"
                                    style="">
                                    <li><a class="dropdown-item" href="#">This Week</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="analytics-chart-02" class="analytics-chart-02"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-height">
                        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                            <div class="header-title">
                                <h4>Sessions By Countries</h4>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray" id="dropdownMenuButton30"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg width="22" height="5" viewBox="0 0 22 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z"
                                            fill="currentColor"></path>
                                    </svg>
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
                            <div id="analytics-chart-03" class="analytics-chart-03"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card ">
                <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4>Users By Device</h4>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton29"
                            data-bs-toggle="dropdown" aria-expanded="false">This Week</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton29"
                            style="">
                            <li><a class="dropdown-item" href="#">This Day</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="analytics-chart-04"></div>
                    <div class="row mb-3 mt-4">
                        <div class="col d-flex align-items-center">
                            <svg class=" text-primary" width="10" height="10" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">Desktop</p>
                        </div>
                        <div class="col d-flex align-items-center">
                            <svg width="20" viewBox="0 0 20 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.34933 11.8579C3.38553 11.8579 0 12.4702 0 14.9175C0 17.3668 3.364 18.0002 7.34933 18.0002C11.3131 18.0002 14.6987 17.3879 14.6987 14.9405C14.6987 12.4913 11.3347 11.8579 7.34933 11.8579Z"
                                    fill="#6D6D6D" />
                                <path opacity="0.4"
                                    d="M7.34935 9.52482C10.049 9.52482 12.2124 7.40617 12.2124 4.76241C12.2124 2.11865 10.049 0 7.34935 0C4.65072 0 2.48633 2.11865 2.48633 4.76241C2.48633 7.40617 4.65072 9.52482 7.34935 9.52482Z"
                                    fill="#6D6D6D" />
                                <path opacity="0.4"
                                    d="M14.1738 4.84873C14.1738 6.19505 13.7609 7.45129 13.0368 8.4948C12.9614 8.60212 13.028 8.74682 13.1591 8.76981C13.3411 8.79952 13.528 8.81773 13.7188 8.82156C15.617 8.87043 17.3205 7.6736 17.7912 5.87116C18.4888 3.19674 16.4419 0.79541 13.8342 0.79541C13.5515 0.79541 13.2804 0.824157 13.0162 0.87686C12.98 0.884526 12.9409 0.901774 12.9213 0.932437C12.8959 0.971725 12.9145 1.02251 12.9399 1.05605C13.7237 2.13214 14.1738 3.44205 14.1738 4.84873Z"
                                    fill="#6D6D6D" />
                                <path
                                    d="M19.7794 12.1693C19.4321 11.4439 18.5935 10.9465 17.3176 10.7022C16.7158 10.5585 15.0857 10.3544 13.57 10.3831C13.5475 10.386 13.5348 10.4013 13.5328 10.4109C13.5299 10.4262 13.5368 10.4492 13.5661 10.4655C14.2667 10.8047 16.9741 12.2804 16.6336 15.3927C16.619 15.5288 16.7295 15.6438 16.8675 15.6246C17.5338 15.5317 19.2481 15.1704 19.7794 14.0474C20.074 13.4533 20.074 12.7634 19.7794 12.1693Z"
                                    fill="#6D6D6D" />
                            </svg>
                            <p class="mb-0 ms-2">50.62k</p>
                        </div>
                        <div class="col d-flex align-items-center">
                            <p class="mb-0 text-success"><svg width="8" height="5" viewBox="0 0 8 5"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0L7.4641 4.5H0.535898L4 0Z" fill="currentColor" />
                                </svg> 3.45%</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col d-flex align-items-center">
                            <svg class="text-info" width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">Mobile</p>
                        </div>
                        <div class="col d-flex align-items-center">
                            <svg width="20" viewBox="0 0 20 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.34933 11.8579C3.38553 11.8579 0 12.4702 0 14.9175C0 17.3668 3.364 18.0002 7.34933 18.0002C11.3131 18.0002 14.6987 17.3879 14.6987 14.9405C14.6987 12.4913 11.3347 11.8579 7.34933 11.8579Z"
                                    fill="#6D6D6D" />
                                <path opacity="0.4"
                                    d="M7.34935 9.52482C10.049 9.52482 12.2124 7.40617 12.2124 4.76241C12.2124 2.11865 10.049 0 7.34935 0C4.65072 0 2.48633 2.11865 2.48633 4.76241C2.48633 7.40617 4.65072 9.52482 7.34935 9.52482Z"
                                    fill="#6D6D6D" />
                                <path opacity="0.4"
                                    d="M14.1738 4.84873C14.1738 6.19505 13.7609 7.45129 13.0368 8.4948C12.9614 8.60212 13.028 8.74682 13.1591 8.76981C13.3411 8.79952 13.528 8.81773 13.7188 8.82156C15.617 8.87043 17.3205 7.6736 17.7912 5.87116C18.4888 3.19674 16.4419 0.79541 13.8342 0.79541C13.5515 0.79541 13.2804 0.824157 13.0162 0.87686C12.98 0.884526 12.9409 0.901774 12.9213 0.932437C12.8959 0.971725 12.9145 1.02251 12.9399 1.05605C13.7237 2.13214 14.1738 3.44205 14.1738 4.84873Z"
                                    fill="#6D6D6D" />
                                <path
                                    d="M19.7794 12.1693C19.4321 11.4439 18.5935 10.9465 17.3176 10.7022C16.7158 10.5585 15.0857 10.3544 13.57 10.3831C13.5475 10.386 13.5348 10.4013 13.5328 10.4109C13.5299 10.4262 13.5368 10.4492 13.5661 10.4655C14.2667 10.8047 16.9741 12.2804 16.6336 15.3927C16.619 15.5288 16.7295 15.6438 16.8675 15.6246C17.5338 15.5317 19.2481 15.1704 19.7794 14.0474C20.074 13.4533 20.074 12.7634 19.7794 12.1693Z"
                                    fill="#6D6D6D" />
                            </svg>
                            <p class="mb-0 ms-2">34.24k</p>
                        </div>
                        <div class="col d-flex align-items-center">
                            <p class="mb-0 text-danger"><svg width="8" height="5" viewBox="0 0 8 5"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 5L0.535898 0.5L7.4641 0.5L4 5Z" fill="currentColor" />
                                </svg>
                                9.34%</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex align-items-center">
                            <svg class="text-tertiray" width="10" height="10" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">Tablet</p>
                        </div>
                        <div class="col d-flex align-items-center">
                            <svg width="20" viewBox="0 0 20 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.34933 11.8579C3.38553 11.8579 0 12.4702 0 14.9175C0 17.3668 3.364 18.0002 7.34933 18.0002C11.3131 18.0002 14.6987 17.3879 14.6987 14.9405C14.6987 12.4913 11.3347 11.8579 7.34933 11.8579Z"
                                    fill="#6D6D6D" />
                                <path opacity="0.4"
                                    d="M7.34935 9.52482C10.049 9.52482 12.2124 7.40617 12.2124 4.76241C12.2124 2.11865 10.049 0 7.34935 0C4.65072 0 2.48633 2.11865 2.48633 4.76241C2.48633 7.40617 4.65072 9.52482 7.34935 9.52482Z"
                                    fill="#6D6D6D" />
                                <path opacity="0.4"
                                    d="M14.1738 4.84873C14.1738 6.19505 13.7609 7.45129 13.0368 8.4948C12.9614 8.60212 13.028 8.74682 13.1591 8.76981C13.3411 8.79952 13.528 8.81773 13.7188 8.82156C15.617 8.87043 17.3205 7.6736 17.7912 5.87116C18.4888 3.19674 16.4419 0.79541 13.8342 0.79541C13.5515 0.79541 13.2804 0.824157 13.0162 0.87686C12.98 0.884526 12.9409 0.901774 12.9213 0.932437C12.8959 0.971725 12.9145 1.02251 12.9399 1.05605C13.7237 2.13214 14.1738 3.44205 14.1738 4.84873Z"
                                    fill="#6D6D6D" />
                                <path
                                    d="M19.7794 12.1693C19.4321 11.4439 18.5935 10.9465 17.3176 10.7022C16.7158 10.5585 15.0857 10.3544 13.57 10.3831C13.5475 10.386 13.5348 10.4013 13.5328 10.4109C13.5299 10.4262 13.5368 10.4492 13.5661 10.4655C14.2667 10.8047 16.9741 12.2804 16.6336 15.3927C16.619 15.5288 16.7295 15.6438 16.8675 15.6246C17.5338 15.5317 19.2481 15.1704 19.7794 14.0474C20.074 13.4533 20.074 12.7634 19.7794 12.1693Z"
                                    fill="#6D6D6D" />
                            </svg>
                            <p class="mb-0 ms-2">35.24k</p>
                        </div>
                        <div class="col d-flex align-items-center">
                            <p class="mb-0 text-success"><svg width="8" height="5" viewBox="0 0 8 5"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 0L7.4641 4.5H0.535898L4 0Z" fill="currentColor" />
                                </svg>
                                4.51%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4>Top Referral Pages</h4>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton35"
                            data-bs-toggle="dropdown" aria-expanded="false">This Week</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton35"
                            style="">
                            <li><a class="dropdown-item" href="#">This Day</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class=" mb-3">
                        <h6 class="mb-2">Average Referals Pages</h6>
                        <h4>652,524</h4>
                        <small class="mb-0 text-success">
                            <svg width="12" height="12" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.27967 4.14454L5.53167 0.379543C5.24967 0.0965433 4.75067 0.0965433 4.46767 0.379543L0.71967 4.14454C0.42767 4.43854 0.428671 4.91354 0.722671 5.20554C1.01667 5.49754 1.49067 5.49754 1.78367 5.20354L4.25067 2.72654L4.25067 9.08154C4.25067 9.49654 4.58667 9.83154 5.00067 9.83154C5.41467 9.83154 5.75067 9.49654 5.75067 9.08154L5.75067 2.72654L8.21667 5.20354C8.36367 5.35054 8.55567 5.42354 8.74867 5.42354C8.93967 5.42354 9.13167 5.35054 9.27767 5.20554C9.57067 4.91354 9.57167 4.43854 9.27967 4.14454Z"
                                    fill="currentColor" />
                            </svg>
                            12.52 % </small><small>then previous month</small>
                    </div>
                    <div class="progress analytics-progress">
                        <div class="progress-bar bg-primary" role="progressbar" aria-label="Segment one"
                            style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" aria-label="Segment two"
                            style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-tertiray" role="progressbar" aria-label="Segment three"
                            style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-warning" role="progressbar" aria-label="Segment three"
                            style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment three"
                            style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mb-3 mt-4">
                        <div class="w-100 d-flex align-items-center">
                            <svg class="text-primary" width="10" height="10" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">www.google.com</p>
                        </div>
                        <p class="mb-0">28.34%</p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="w-100 d-flex align-items-center">
                            <svg class="text-info" width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">www.youtube.com</p>
                        </div>
                        <p class="mb-0">45.56%</p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="w-100 d-flex align-items-center">
                            <svg class="text-tertiray" width="10" height="10" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">www.meta.com</p>
                        </div>
                        <p class="mb-0">52.35%</p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="w-100 d-flex align-items-center">
                            <svg class="text-warning" width="10" height="10" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">www.dribble.com</p>
                        </div>
                        <p class="mb-0">32.16%</p>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="w-100 d-flex align-items-center">
                            <svg class="text-danger" width="10" height="10" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="5" r="5" fill="currentColor" />
                            </svg>
                            <p class="ms-2 mb-0">Other</p>
                        </div>
                        <p class="mb-0">32.16%</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="text-center text-decoration-underline ">Show all</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="flex-wrap card-header d-flex justify-content-between align-items-center border-0 pb-0">
                    <div class="header-title">
                        <h4>Top Pages</h4>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton24"
                            data-bs-toggle="dropdown" aria-expanded="false">This Week</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton24"
                            style="">
                            <li><a class="dropdown-item" href="#">This Day</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border rounded">
                        <table id="transaction-table" class="table mb-0 table-striped" role="grid">
                            <thead class="bg-soft-primary">
                                <tr class="">
                                    <th>Active Pages</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        /buy_iT/e-commerce
                                    </td>
                                    <td>
                                        36.4%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /interior.fox/home
                                    </td>
                                    <td>
                                        32.4%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /freindbox/user profile
                                    </td>
                                    <td>
                                        28.6%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /freindbox/chat
                                    </td>
                                    <td>
                                        15.4%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /buy_iT/products
                                    </td>
                                    <td>
                                        12.4%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        /restro-.in/book table
                                    </td>
                                    <td>
                                        12.2%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
