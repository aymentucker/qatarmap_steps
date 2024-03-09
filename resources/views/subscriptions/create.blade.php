<x-app-layout :assets="$assets ?? []" title="{{ isset($subscription) ? 'تعديل الاشتراك' : 'اضافة اشتراك' }}" isBanner="true">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($subscription) ? 'تعديل الاشتراك' : 'اضافة اشتراك' }}</h4>
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

                            {{-- Subscription Form --}}
                            <form action="{{ isset($subscription) ? route('subscriptions.update', $subscription->id) : route('subscriptions.store') }}" method="POST" class="p-4 border rounded">
                                @csrf
                                @if(isset($subscription))
                                    @method('PUT')
                                @endif
                                <div class="row">
                                    {{-- Name of the Subscription --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">اسم الاشتراك</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ $subscription->name ?? '' }}">
                                    </div>

                                    {{-- Subscription Type --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="type" class="form-label">نوع الاشتراك</label>
                                        <select class="form-select" id="type" name="type">
                                            <option value="">اختر...</option>
                                            <option value="individual" {{ (isset($subscription) && $subscription->type == 'owner') ? 'selected' : '' }}>مالك</option>
                                            <option value="company" {{ (isset($subscription) && $subscription->type == 'company') ? 'selected' : '' }}>شركة عقارية</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Price --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">السعر</label>
                                        <input type="text" class="form-control" id="price" name="price" required value="{{ $subscription->price ?? '' }}">
                                    </div>
                                </div>

                                {{-- Submit Button --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">{{ isset($subscription) ? 'تعديل' : 'إضافة' }} الاشتراك</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
