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
                         <div class="row">
                            <div class="form-group col-md-6">
                               <label class="form-label" for="first_name">الاسم الاول:</label>
                               <input type="text" class="form-control" id="first_name" name="first_name" required
                               value="{{ old('first_name', $user->first_name ?? '') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="last_name"> الاسم الاخير  :</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required
                                value="{{ old('last_name', $user->last_name ?? '') }}">
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
                                                         {{-- Submit Button --}}

                                                         <button type="submit" class="btn btn-primary">{{ $id ? 'تعديل' : 'اضافة' }} موظف</button>
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
                     <h4 class="card-title"> حساب الموظف </h4>
                  </div>
               </div>
               <div class="card-body">
                     <div class="form-group">
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
         </div>
    </div>
 </x-app-layout>
 