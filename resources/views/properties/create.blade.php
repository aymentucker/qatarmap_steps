<x-app-layout :assets="$assets ?? []" title='اضافة عقار ' isBanner="true">
   <div>
      <?php
         $id = $id ?? null;
      ?>
     
      <div class="row">
    
         <div class="col-xl-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">{{$id !== null ? 'تعديل' : 'اضافة' }} بيانات العقار</h4>
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
                
                    {{-- Property Form --}}
                    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded">
                       @csrf
               
                       <div class="row">
                           {{-- Name of the Property --}}
                           <div class="col-md-4 mb-3">
                               <label for="property_name" class="form-label">اسم العقار</label>
                               <input type="text" class="form-control" id="property_name" name="property_name" required>
                           </div>

                            {{-- Property Type --}}
                            <div class="col-md-4 mb-3">
                              <label for="property_type" class="form-label">نوع العقار </label>
                              <select class="form-select" id="property_type" name="property_type">
                                  <option value="">اختر...</option>
                                  <option value="سكني"> سكني</option>
                                  <option value="تجاري">تجاري </option>
                                </select>
                          </div>
               
                           {{-- Sub-Property Type --}}
                           <!-- Assuming this code is in a file within the resources/views directory -->
                        <div class="col-md-4 mb-3">
                            <label for="category_id" class="form-label">الفئات الفرعية</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">اختر...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                       </div>
               
                       <div class="row">
                         {{-- City --}}
                           <div class="col-md-4 mb-3">
                              <label for="city" class="form-label">المدينة</label>
                              <select class="form-select" id="city" name="city" onchange="updateRegions()">
                                 <option value="">اختر المدينة</option>
                                 @foreach ($cities as $city)
                                 <option value="{{ $city->name }}">{{ $city->name }}</option>
                                 @endforeach
                              </select>
                           </div>

                           {{-- Region --}}
                           <div class="col-md-4 mb-3">
                              <label for="region" class="form-label">المنطقة</label>
                              <select class="form-select" id="region" name="region">
                                 <option value="">اختر المنطقة</option>
                                 {{-- Regions will be populated based on the city --}}
                              </select>
                           </div>
                           {{-- Floor --}}
                           <div class="col-md-4 mb-3">
                              <label for="floor" class="form-label">الطابق</label>
                              <input type="number" class="form-control" id="floor" name="floor" min="1" required>
                          </div>
                       </div>
               
                       <div class="row">
                           {{-- Bedrooms --}}
                           <div class="col-md-4 mb-3">
                               <label for="rooms" class="form-label">عدد غرف النوم</label>
                               <input type="number" class="form-control" id="rooms" name="rooms" min="1" required>
                           </div>
               
                           {{-- Bathrooms --}}
                           <div class="col-md-4 mb-3">
                               <label for="bathrooms" class="form-label">عدد الحمامات</label>
                               <input type="number" class="form-control" id="bathrooms" name="bathrooms" min="1" required>
                           </div>
                           {{-- furnishing type --}}
                           <div class="col-md-4 mb-3">
                              <label for="furnishing" class="form-label">التاثيث</label>
                              <select class="form-select" id="furnishing" name="furnishing" required>
                                  <option value="">اختر...</option>
                                  <option value="مفروشة">مفروشة </option>
                                  <option value="شبه مفروشة ">شبه مفروشة </option>
                                  <option value="غير مفروشة ">غير مفروشة </option>
                              </select>
                          </div>
                          
                              {{-- ad Type --}}
                              <div class="col-md-4 mb-3">
                                 <label for="ad_type" class="form-label">نوع الاعلان</label>
                                 <select class="form-select" id="ad_type" name="ad_type">
                                    <option value="للايجار">للايجار</option>
                                    <option value="للبيع">للبيع</option>
                                 </select>
                           </div>
                                {{-- Area --}}
                                <div class="col-md-4 mb-3">
                                 <label for="property_area" class="form-label">مساحة العقار</label>
                                 <input type="number" class="form-control" id="property_area" name="property_area" required>
                                 </div>
                           {{-- Price --}}
                           <div class="col-md-4 mb-3">
                               <label for="price" class="form-label">السعر</label>
                               <input type="number" class="form-control" id="price" name="price" required>
                               </div>
                               </div>
                               <div class="row">
                                {{-- Description --}}
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">وصف العقار</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                            </div>
                        
                            <div class="row">
                                {{-- Image Upload --}}
                                <div class="col-12 mb-3">
                                    <label for="images" class="form-label">صور العقار</label>
                                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                                    <small class="text-muted">يمكنك تحميل صور متعددة</small>
                                </div> 
                            </div>
                        
                            {{-- Submit Button --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">إضافة العقار</button>
                            </div>
                        </form>
                        
                  




                         
               </div>
            </div>
         </div>
        </div>
   </div>


   {{-- JavaScript to update regions --}}
<script>
   function updateRegions() {
    var cityName = document.getElementById('city').value;
    var regionSelect = document.getElementById('region');
    regionSelect.innerHTML = '<option value="">تحميل ...</option>';

    // Fetch regions for the selected city
    fetch(`/regions-for-city/${encodeURIComponent(cityName)}`)
        .then(response => response.json())
        .then(data => {
            regionSelect.innerHTML = '<option value="">اختر المنطقة</option>';
            data.forEach(region => {
                regionSelect.innerHTML += `<option value="${region.name}">${region.name}</option>`;
            });
        });
}

</script>
</x-app-layout>

