<x-app-layout :assets="$assets ?? []" title="{{ isset($adSlider) ? 'تعديل بنر اعلاني' : 'اضافة بنر اعلاني' }}" isBanner="true">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($adSlider) ? 'تعديل بنر اعلاني' : 'اضافة بنر اعلاني' }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container mt-5">                 
                            {{-- Display validation errors, if any --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Ad Slider Form --}}
                            <form action="{{ isset($adSlider) ? route('adsliders.update', $adSlider->id) : route('adsliders.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded">
                                @csrf
                                @if(isset($adSlider))
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    {{-- Name of the Ad Slider --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">اسم البنر</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ $adSlider->name ?? '' }}">
                                    </div>

                                    {{-- URL Link --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="url_link" class="form-label">رابط</label>
                                        <input type="url" class="form-control" id="url_link" name="url_link" required value="{{ $adSlider->url_link ?? '' }}">
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Subscription Period --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="subscription_period" class="form-label">نوع الاشتراك</label>
                                        <select class="form-select" id="subscription_period" name="subscription_period">
                                            <option value="">اختر...</option>
                                            @foreach(['monthly' => 'شهري', 'quarterly' => 'ربع سنوي', 'semi-annually' => 'نصف سنوي', 'annually' => 'سنوي'] as $key => $period)
                                                <option value="{{ $key }}" {{ (isset($adSlider) && $adSlider->subscription_period === $key) ? 'selected' : '' }}>{{ $period }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Image Upload --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="image" class="form-label">صورة البنر</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if(isset($adSlider) && $adSlider->image)
                                            <img src="{{ $adSlider->image }}" alt="Slider Image" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">{{ isset($adSlider) ? 'تعديل' : 'إضافة' }} البنر</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
