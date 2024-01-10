<x-app-layout :assets="$assets ?? []" title='اضافة عقار ' isBanner="true">
    <div>
       <?php
          $id = $id ?? null;
       ?>
      
       <div class="row">
          <div class="col-xl-3 col-lg-4">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">{{$id !== null ? 'تعديل' : 'اضافة' }} صور العقار</h4>
                   </div>
                </div>
                <div class="card-body">
                      <div class="form-group">
                         <div class="profile-img-edit position-relative">
                         <img src="{{ $profileImage ?? asset('images/avatars/01.png')}}" alt="User-Profile" class="profile-pic rounded avatar-100">
                            <div class="upload-icone bg-primary">
                               <svg class="upload-button" width="14" height="14" viewBox="0 0 24 24">
                                  <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                               </svg>
                               <input class="file-upload" type="file" accept="image/*" name="profile_image">
                            </div>
                         </div>
                         <div class="img-extension mt-3">
                            <div class="d-inline-block align-items-center">
                               <span>فقط</span>
                               <a href="javascript:void();">.jpg</a>
                               <a href="javascript:void();">.png</a>
                               <a href="javascript:void();">.jpeg</a>
                               <span>مسموح به</span>
                            </div>
                         </div>
                      </div>
                      <div class="form-group">
                         <label class="form-label">الحالة :</label>
                         <div class="grid" style="--bs-gap: 1rem">
                             <div class="form-check g-col-6">
                                 {{ Form::radio('status', 'active',old('status') || true, ['class' => 'form-check-input', 'id' => 'status-active']); }}
                                 <label class="form-check-label" for="status-active">
                                     مفعل
                                 </label>
                             </div>
                             <div class="form-check g-col-6">
                                 {{ Form::radio('status', 'pending',old('status'), ['class' => 'form-check-input', 'id' => 'status-pending']); }}
                                 <label class="form-check-label" for="status-pending">
                                     بانتظار الموافقة
                                 </label>
                             </div>
                             <div class="form-check g-col-6">
                                 {{ Form::radio('status', 'banned',old('status'), ['class' => 'form-check-input', 'id' => 'status-banned']); }}
                                 <label class="form-check-label" for="status-banned">
                                     معلق
                                 </label>
                             </div>
                             <div class="form-check g-col-6">
                                 {{ Form::radio('status', 'inactive',old('status'), ['class' => 'form-check-input', 'id' => 'status-inactive']); }}
                                 <label class="form-check-label" for="status-inactive">
                                     غير نشط
                                 </label>
                             </div>
                         </div>
                      </div>
  
                </div>
             </div>
          </div>
          <div class="col-xl-9 col-lg-8">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">{{$id !== null ? 'تعديل' : 'اضافة' }} بيانات العقار</h4>
                   </div>
                
                </div>
                <div class="card-body">
                   <div class="new-user-info">
                         <div class="row">
                            <div class="form-group col-md-6">
                               <label class="form-label" for="validationDefault01">اسم العقار :</label>
                               <input type="text" class="form-control" id="validationDefault01" required>
                            </div>
                            <div class="form-group col-md-3">
                               <label class="form-label" for="validationDefault01">نوع العقار</label>
                               <div class="form-check d-block">
                                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                  <label class="form-check-label" for="flexRadioDefault1">
                                      للايجار
                                  </label>
                              </div>
                              <div class="form-check d-block">
                                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                  <label class="form-check-label" for="flexRadioDefault2">
                                      للبيع
                                  </label>
                              </div>  
                            </div>
                            <div class="form-group col-md-3">
                               <label class="form-label" for="validationDefault04">نوع العقار : </label>
                               <select class="form-select" id="validationDefault04" required>
                               <option selected disabled value="">عقارات</option>
                               <option>اراضي </option>
                               <option>صناعية </option>
                               </select>
                            </div>
                            <div class="form-group col-md-6">
                               <label class="form-label" for="validationDefault04">المدينة : </label>
                               <select class="form-select" id="validationDefault04" required>
                               <option selected disabled value="">الدوحة</option>
                               <option>المدينة الثانية</option>
                               </select>
                            </div>
                            <div class="form-group col-md-6">
                               <label class="form-label" for="validationDefault04">المنطقة : </label>
                               <select class="form-select" id="validationDefault04" required>
                               <option selected disabled value="">الدوحة</option>
                               <option>المنطقة الثانية</option>
                               </select>
                            </div>
                            <div class="form-group col-md-3">
                               <label class="form-label" for="validationDefault04">عدد غرف النوم : </label>
                               <select class="form-select" id="validationDefault04" required>
                               <option selected disabled value=""> 1 </option>
                               <option> 1 </option>
                               </select>
                            </div>
                            <div class="form-group col-md-3">
                               <label class="form-label" for="validationDefault04">عدد الحمامات : </label>
                               <select class="form-select" id="validationDefault04" required>
                               <option selected disabled value=""> 1 </option>
                               <option> 1 </option>
                               </select>
                            </div>
                            <div class="form-group col-md-3">
                               <label class="form-label" for="validationDefault04">الطابق : </label>
                               <select class="form-select" id="validationDefault04" required>
                               <option selected disabled value=""> 1 </option>
                               <option> 1 </option>
                               </select>
                            </div>
                            <div class="form-group col-md-3">
                               <label class="form-label" for="validationDefault04">التاثيث - الفرش : </label>
                               <select class="form-select" id="validationDefault04" required>
                               <option selected disabled value=""> غير مفروش </option>
                               <option> مفروش </option>
                               <option> مفروش جزئياً </option>
                               </select>
                            </div>
                            <div class="form-group col-md-6">
                               <label class="form-label" for="validationDefault01">مساحة العقار</label>
                                     <input type="text" class="form-control" id="validationDefault01" required>
                            </div>
                            <div class="form-group col-md-6">
                               <label class="form-label" for="validationDefault01">السعر</label>
                               <input type="text" class="form-control" id="validationDefault01" required>
                            </div>
                            <div class="form-group">
                               <label class="form-label" for="exampleFormControlTextarea1">وصف العقار</label>
                               <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                           </div>
 
                         </div>
                         <button type="submit" class="btn btn-primary">نشر</button>
                         <button type="submit" class="btn btn-info">حفظ كمسودة</button>
                        </div>
                </div>
             </div>
          </div>
         </div>
    </div>
 </x-app-layout>
 