<x-app-layout :assets="$assets ?? []" title="{{ isset($package) ? 'تعديل الباقة' : 'اضافة باقة' }}" isBanner="true">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($package) ? 'تعديل الباقة' : 'اضافة باقة' }}</h4>
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

                            {{-- Package Form --}}
                            <form action="{{ isset($package) ? route('packages.update', $package->id) : route('packages.store') }}" method="POST" class="p-4 border rounded">
                                @csrf
                                @if(isset($package))
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    {{-- Name of the Package --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">اسم الباقة</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ $package->name ?? '' }}">
                                    </div>

                                    {{-- Package Type --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="type" class="form-label">نوع الباقة</label>
                                        <select class="form-select" id="type" name="type">
                                            <option value="">اختر...</option>
                                            <option value="properties" {{ (isset($package) && $package->type == 'properties') ? 'selected' : '' }}>عقارات</option>
                                            <option value="employees" {{ (isset($package) && $package->type == 'employees') ? 'selected' : '' }}>موظفين</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Limit --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="limit" class="form-label">الحد</label>
                                        <input type="number" class="form-control" id="limit" name="limit" required value="{{ $package->limit ?? '' }}">
                                    </div>

                                    {{-- Price --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">السعر</label>
                                        <input type="text" class="form-control" id="price" name="price" required value="{{ $package->price ?? '' }}">
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">{{ isset($package) ? 'تعديل' : 'إضافة' }} الباقة</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
