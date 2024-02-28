<x-app-layout :assets="$assets ?? []" title="{{ isset($user) && $user->id ? 'تعديل بيانات الموظف' : 'اضافة موظف' }}" isBanner="true">
   <div>
       <?php
          $id = $id ?? null;
       ?>
      
       <div class="row">
          
          <div class="col-xl-9 col-lg-8">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">{{$id !== null ? 'تعديل' : 'اضافة' }} بيانات الموظف</h4>
                   </div>
                   <div class="card-action">
                         <a href="{{route('employees.index')}}" class="btn btn-sm btn-primary" role="button">رجوع</a>
                   </div>
                </div>
                <div class="card-body">
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
                   <div class="new-user-info">
                     <form action="{{ $id ? route('employees.update', $id) : route('employees.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded">
                        @csrf
                        @if($id)
                            @method('PUT')
                        @endif
                        <!-- Company Dropdown -->
                        <div class="form-group col-md-6">
                        <label for="company_id">الشركة:</label>
                        <select class="form-control" name="company_id" id="company_id" required>
                         <option value="">اختر شركة</option>
                          @foreach($companies as $id => $company_name)
                          <option value="{{ $id }}" {{ old('company_id', $user->company_id ?? '') == $id ? 'selected' : '' }}>{{ $company_name }}</option>
                           @endforeach
                          </select>
                          </div>                       
                         <div class="row">
                            <div class="form-group col-md-6">
                               <label class="form-label" for="name">الاسم بالعربي:</label>
                               <input type="text" class="form-control" id="name" name="name" required
                               value="{{ old('name', $user->name ?? '') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="name_en"> الاسم بالانجليزي  :</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" required
                                value="{{ old('name_en', $user->name_en ?? '') }}">
                             </div>
  
                            <div class="form-group col-md-6">
                               <label class="form-label" for="phone_number">رقم هاتف  : </label>
                               <input type="phone" class="form-control" id="phone_number" name="phone_number" required
                               value="{{ old('phone_number', $user->phone_number ?? '') }}">

                            </div>
                        
                            <div class="form-group col-md-6">
                                <label class="form-label" for="email"> البريد الالكتروني :</label>
                                <input type="email" class="form-control" id="email" name="email" required
                                value="{{ old('email', $user->email ?? '') }}">
                             </div>
                             <div class="row">
                                <div class="form-group col-md-6">
                                   <label class="form-label" for="pass">كلمة المرور :</label>
                                   <input type="password" class="form-control" id="password" name="password" {{ $id ? '' : 'required' }}>
                                 </div>
                                <div class="form-group col-md-6">
                                   <label class="form-label" for="rpass">اعادة كتابة كلمة المرور :</label>
                                   <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" {{ $id ? '' : 'required' }}>
                                 </div>
                             </div>
                             <div class="form-group">
                              <label>حالة الحساب:</label>
                              <div class="d-flex flex-row align-items-center mt-2">
                                  @php
                                      $currentStatus = isset($user) ? $user->status : 'Active';
                                      $statusOptions = ['Active' => 'مفعل', 'Pending' => 'بانتظار الموافقة', 'Inactive' => 'غير نشط'];
                                  @endphp
                          
                                  @foreach ($statusOptions as $value => $label)
                                  <div class="form-check me-5">
                                    <input class="form-check-input" type="radio" name="status" id="status-{{ $value }}" value="{{ $value }}" {{ (old('status', $currentStatus) == $value) ? 'checked' : '' }}>
                                          <label class="form-check-label" for="status-{{ $value }}">
                                              {{ $label }}
                                          </label>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                          
                          
                                                         {{-- Submit Button --}}

                                                         <button type="submit" class="btn btn-primary">حفظ</button>
                                                      </form>
                         </div>
                        </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                           <div class="card">
                               <div class="card-header d-flex justify-content-between">
                                   <div class="header-title">
                                       <h4 class="card-title">حساب الموظف</h4>
                                   </div>
                               </div>
                               <div class="card-body">
                                   <div class="form-group">
                                       <div class="grid" style="--bs-gap: 1rem">
                                           @php
                                               $currentStatus = isset($user) ? $user->status : 'Active';
                                               $statusOptions = ['Active' => 'مفعل', 'Pending' => 'بانتظار الموافقة','Inactive' => 'غير نشط'];
                                           @endphp
                       
                                           @foreach ($statusOptions as $value => $label)
                                               <div class="form-check g-col-6">
                                                   <input class="form-check-input" type="radio" name="status" id="status-{{ $value }}" value="{{ $value }}" {{ (old('status', $currentStatus) == $value) ? 'checked' : '' }}>
                                                   <label class="form-check-label" for="status-{{ $value }}">
                                                       {{ $label }}
                                                   </label>
                                               </div>
                                           @endforeach
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                           </div>
         </div>
    </div>
 </x-app-layout>
 