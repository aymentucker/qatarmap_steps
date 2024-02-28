<x-app-layout :assets="$assets ?? []" title='تعديل بيانات الشركة ' isBanner="true">
    <div>
        <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
            @csrf                
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">تعديل بيانات الشركة</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="new-user-info">
                                <div class="row">
                                    <!-- Populate fields with existing data for the manager and company -->
                                    <div class="form-group col-md-4">
                                        <label class="form-label">اسم المدير :</label>
                                        <input type="text" class="form-control" name="name" value="{{ $manager->name }}" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">اسم المدير بالإنجليزية :</label>
                                        <input type="text" class="form-control" name="name_en" value="{{ $manager->name_en }}" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">رقم الهاتف :</label>
                                        <input type="text" class="form-control" name="phone_number" value="{{ $manager->phone_number }}" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">البريد الإلكتروني :</label>
                                        <input type="email" class="form-control" name="email" value="{{ $manager->email }}" >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">كلمة المرور (اتركها فارغة إذا لم ترغب في التغيير):</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>

                                    <!-- Company Information -->
                                    <div class="form-group col-md-4">
                                        <label class="form-label">اسم الشركة بالعربية :</label>
                                        <input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">اسم الشركة بالإنجليزية :</label>
                                        <input type="text" class="form-control" name="company_name_en" value="{{ $company->company_name_en }}" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">رقم الرخصة :</label>
                                        <input type="text" class="form-control" name="license_number" value="{{ $company->license_number }}" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label">شركة تثمين عقاري :</label>
                                        <select class="form-control" name="valuation">
                                            <option value="1" {{ $company->valuation ? 'selected' : '' }}>نعم</option>
                                            <option value="0" {{ !$company->valuation ? 'selected' : '' }}>لا</option>
                                        </select>
                                    </div>

                                    <!-- Status Field -->
                                    <div class="form-group col-md-4">
                                        <label class="form-label">حالة الشركة :</label>
                                        <select class="form-control" name="status">
                                            <option value="Active" {{ $company->status == 'Active' ? 'selected' : '' }}>نشط</option>
                                            <option value="Inactive" {{ $company->status == 'Inactive' ? 'selected' : '' }}>غير نشط</option>
                                            <option value="Pending" {{ $company->status == 'Pending' ? 'selected' : '' }}>قيد الانتظار</option>
                                        </select>
                                    </div>

                                    <!-- For new file uploads -->
                                    <div class="form-group col-md-6">
                                        <label class="form-label">ملفات إضافية :</label>
                                        <input type="file" class="form-control" name="files[]" multiple>
                                    </div>
                                    
                                    <!-- For displaying existing files and allowing for their deletion -->
                                    <div class="form-group col-md-12">
                                        <label class="form-label">الملفات الحالية :</label>
                                        @if($manager->filedoc->count() > 0)
                                            <ul>
                                                @foreach($manager->filedoc as $file)
                                                    <li>
                                                        <a href="{{ $file->url }}" target="_blank">{{ basename($file->url) }}</a>
                                                        <input type="checkbox" name="delete_files[]" value="{{ $file->id }}"> حذف
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>لا توجد ملفات حالية.</p>
                                        @endif
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">تحديث</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
