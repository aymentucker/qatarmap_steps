<x-app-layout :assets="$assets ?? []" title='اضافة شركة ' isBanner="true">
   <div>
      <form method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data"> <!-- Adjusted action attribute -->
         @csrf
         <div class="row">
            <div class="col-xl-12 col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">اضافة بيانات الشركة</h4> <!-- Removed conditional for simplicity -->
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-user-info">
                        <div class="row">
                           <!-- Fields for manager's name, English name, phone number, password, email -->
                           <div class="form-group col-md-4">
                              <label class="form-label">اسم المدير :</label>
                              <input type="text" class="form-control" name="name" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label">اسم المدير بالإنجليزية :</label>
                              <input type="text" class="form-control" name="name_en" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label">رقم الهاتف :</label>
                              <input type="text" class="form-control" name="phone_number" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label">كلمة المرور :</label>
                              <input type="password" class="form-control" name="password" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label">البريد الإلكتروني :</label>
                              <input type="email" class="form-control" name="email" required>
                           </div>
                           <!-- Fields for company name, English company name, license number, valuation -->
                           <div class="form-group col-md-4">
                              <label class="form-label">اسم الشركة بالعربية :</label>
                              <input type="text" class="form-control" name="company_name" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label">اسم الشركة بالإنجليزية :</label>
                              <input type="text" class="form-control" name="company_name_en" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label">رقم الرخصة :</label>
                              <input type="text" class="form-control" name="license_number" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label class="form-label">شركة تثمين عقاري :</label>
                              <select class="form-control" name="valuation">
                                 <option value="0">لا</option>
                                 <option value="1">نعم</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label">ملفات إضافية :</label>
                              <input type="file" class="form-control" name="files[]" multiple>
                           </div>
                           <!-- Submit Button -->
                           <div class="col-md-12 text-center"> <!-- Centered submit button -->
                              <button type="submit" class="btn btn-primary">اضافة</button>
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
