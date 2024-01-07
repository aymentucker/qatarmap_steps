<x-app-layout :assets="$assets ?? []" title='calender' :isBanner="true">

        <!-- Fullcalender CSS -->
        <link rel='stylesheet' href="{{asset('vendor/fullcalendar/core/main.css')}}">
        <link rel='stylesheet' href="{{asset('vendor/fullcalendar/daygrid/main.css')}}">
        <link rel='stylesheet' href="{{asset('vendor/fullcalendar/timegrid/main.css')}}">
        <link rel='stylesheet' href="{{asset('vendor/fullcalendar/list/main.css')}}">
  
        <!-- Fullcalender Javascript -->
        <script src="{{asset('vendor/fullcalendar/core/main.js')}}"></script>
        <script src="{{asset('vendor/fullcalendar/daygrid/main.js')}}"></script>
        <script src="{{asset('vendor/fullcalendar/timegrid/main.js')}}"></script>
        <script src="{{asset('vendor/fullcalendar/list/main.js')}}"></script>
        <script src="{{asset('vendor/fullcalendar/interaction/main.js')}}"></script>
        <script src="{{asset('vendor/moment.min.js')}}"></script>
        <script src="{{asset('js/plugins/calender.js')}}"></script>
   
        <div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center mb-4">
                                <h5>19 May</h5>
                                <div class="btn btn-info ms-3 btn-sm">
                                        Today
                                </div>
                            </div>
                            <div class="p-2 show mb-4 h4 bg-soft-warning alert-left alert-warning d-inline-block">
                                <span> 5:30am Doctor Appointment</span>
                            </div>
                            <h6>Details</h6>
                            <div class="d-flex align-items-center">
                                <p class="pe-3 border-end">
                                    Time: 5:30 am
                                </p>
                            <p class="ms-3">
                                Event: Doctor Appointment
                            </p>
                            </div>
                            <h6 class="mb-3">More Events</h6>
                             <div class="p-2 show mb-3 h6 bg-soft-success alert-left alert-success d-table">
                                <span> 5:30am Meeting</span>
                            </div>
                            <div class="p-2 show mb-3 h6 bg-soft-primary alert-left alert-primary d-inline-block">
                                <span>5:30am click for Google</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <button type="button" class="btn btn-primary ms-2 text-right float-end mb-lg-0 mb-3">
                                <span>Edit Event</span>
                                <svg width="20" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.9927 15.9531H11.2984C10.7429 15.9531 10.291 16.4121 10.291 16.9765C10.291 17.5419 10.7429 17.9999 11.2984 17.9999H16.9927C17.5483 17.9999 18.0001 17.5419 18.0001 16.9765C18.0001 16.4121 17.5483 15.9531 16.9927 15.9531Z" fill="white"/>
                                    <path d="M7.30902 3.90361L12.7049 8.2637C12.835 8.36797 12.8573 8.55932 12.7557 8.69261L6.35874 17.028C5.95662 17.5429 5.36402 17.8342 4.72908 17.8449L1.23696 17.8879C1.05071 17.8901 0.887748 17.7611 0.845419 17.5762L0.0517547 14.1255C-0.0858138 13.4913 0.0517547 12.8356 0.453878 12.3303L6.88256 3.95521C6.98627 3.82083 7.1778 3.79719 7.30902 3.90361Z" fill="white"/>
                                    <path opacity="0.4" d="M15.1203 5.66544L14.0801 6.96401C13.9753 7.09623 13.7869 7.11773 13.6568 7.01238C12.3922 5.98901 9.15405 3.36285 8.25563 2.63509C8.12441 2.52759 8.10642 2.33625 8.21224 2.20295L9.21543 0.957057C10.1255 -0.214663 11.7128 -0.322161 12.9933 0.699064L14.4642 1.87078C15.0674 2.34377 15.4695 2.96726 15.6071 3.62299C15.7658 4.3443 15.5965 5.0527 15.1203 5.66544Z" fill="white"/>
                                </svg>
                            </button>
                            <img src="{{asset('images/dashboard/calender-img.png')}}" alt="calender" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card  ">
                                <div class="card-body">
                                    <div id="calendar1" class="calendar-s calender-one"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="new-event" data-bs-keyboard="true" tabindex="-1" aria-labelledby="new-event-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new-event-label">Add a events</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" method="post">
                            <div class="d-flex flex-column align-items-start">
                                <input type="hidden" name="id">
                                <input type="hidden" name="appointment_type">
                                <div class="nav me-3 form-group btn-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="btn btn-primary  active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Event</button>
                                    <button class="btn btn-primary " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Task</button>
                                    <button class="btn btn-primary " id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Reminder</button>
                                </div>
                                <div class="tab-content w-100" id="v-pills-tabContent">
                                    <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-2">
                                                <label class="col-form-label">Title</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-2">
                                                <label class="col-form-label">
                                                    <svg class="icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.09277 9.40421H20.9167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M16.442 13.3097H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12.0045 13.3097H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M7.55818 13.3097H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M16.442 17.1962H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12.0045 17.1962H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M7.55818 17.1962H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M16.0433 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M7.96515 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2383 3.5791H7.77096C4.83427 3.5791 3 5.21504 3 8.22213V17.2718C3 20.3261 4.83427 21.9999 7.77096 21.9999H16.229C19.175 21.9999 21 20.3545 21 17.3474V8.22213C21.0092 5.21504 19.1842 3.5791 16.2383 3.5791Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" name="start_date" class="form-control range_flatpicker">
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-2">
                                                <label class="col-form-label">
                                                    <svg class="icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.2498 12.0005C21.2498 17.1095 17.1088 21.2505 11.9998 21.2505C6.8908 21.2505 2.7498 17.1095 2.7498 12.0005C2.7498 6.89149 6.8908 2.75049 11.9998 2.75049C17.1088 2.75049 21.2498 6.89149 21.2498 12.0005Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M15.4314 14.9429L11.6614 12.6939V7.84689" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </label>
                                            </div>
                                            <div class="col-10 d-flex align-items-center justify-content-center">
                                                <input type="text" name="start_time" class="form-control time_flatpicker">
                                                <span class="mx-2">To</span>
                                                <input type="text" name="end_time" class="form-control time_flatpicker">
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-2">
                                                <label class="col-form-label">
                                                    <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59151 15.2068C13.2805 15.2068 16.4335 15.7658 16.4335 17.9988C16.4335 20.2318 13.3015 20.8068 9.59151 20.8068C5.90151 20.8068 2.74951 20.2528 2.74951 18.0188C2.74951 15.7848 5.88051 15.2068 9.59151 15.2068Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.59157 12.0198C7.16957 12.0198 5.20557 10.0568 5.20557 7.63476C5.20557 5.21276 7.16957 3.24976 9.59157 3.24976C12.0126 3.24976 13.9766 5.21276 13.9766 7.63476C13.9856 10.0478 12.0356 12.0108 9.62257 12.0198H9.59157Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M16.4829 10.8815C18.0839 10.6565 19.3169 9.28253 19.3199 7.61953C19.3199 5.98053 18.1249 4.62053 16.5579 4.36353" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M18.5952 14.7322C20.1462 14.9632 21.2292 15.5072 21.2292 16.6272C21.2292 17.3982 20.7192 17.8982 19.8952 18.2112" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <select name="guest" class="form-select" id="guest">
                                                    <option value="">Select Guest</option>
                                                    <option value="">Anni</option>
                                                    <option value="">Bini</option>
                                                    <option value="">Chimpi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center form-group">
                                            <div class="col-2">
                                                <label class="col-form-label">
                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-2">
                                                        <label class="col-form-label">Title</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-2">
                                                        <label class="col-form-label">
                                                            <svg class="icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3.09277 9.40421H20.9167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M16.442 13.3097H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M12.0045 13.3097H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M7.55818 13.3097H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M16.442 17.1962H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M12.0045 17.1962H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M7.55818 17.1962H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M16.0433 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M7.96515 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2383 3.5791H7.77096C4.83427 3.5791 3 5.21504 3 8.22213V17.2718C3 20.3261 4.83427 21.9999 7.77096 21.9999H16.229C19.175 21.9999 21 20.3545 21 17.3474V8.22213C21.0092 5.21504 19.1842 3.5791 16.2383 3.5791Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="text" name="start_date" class="form-control range_flatpicker">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row g-3 align-items-center form-group">
                                                    <div class="col-2">
                                                        <label class="col-form-label">Title</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row g-3 align-items-center form-group">
                                                                <div class="col-2">
                                                                    <label class="col-form-label">
                                                                        <svg class="icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3.09277 9.40421H20.9167" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M16.442 13.3097H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M12.0045 13.3097H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M7.55818 13.3097H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M16.442 17.1962H16.4512" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M12.0045 17.1962H12.0137" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M7.55818 17.1962H7.56744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M16.0433 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M7.96515 2V5.29078" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2383 3.5791H7.77096C4.83427 3.5791 3 5.21504 3 8.22213V17.2718C3 20.3261 4.83427 21.9999 7.77096 21.9999H16.229C19.175 21.9999 21 20.3545 21 17.3474V8.22213C21.0092 5.21504 19.1842 3.5791 16.2383 3.5791Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <input type="text" name="start_date" class="form-control range_flatpicker">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row g-3 align-items-center form-group">
                                                                <div class="col-2">
                                                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        <path d="M14.3889 20.8572C13.0247 22.3719 10.8967 22.3899 9.51953 20.8572" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="col-10">
                                                                    <select class="form-select">
                                                                        <option>Repeat</option>
                                                                        <option>Every 4 Day</option>
                                                                        <option>Every 7 Day</option>
                                                                        <option>Every 10 Day</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard Changes</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>

