<x-app-layout :assets="$assets ?? []" title='اضافة فاتورة ' isBanner="true" isUppy="true">
    <div>
       <?php
          $id = $id ?? null;
       ?>
      
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                              <h4 class="me-2 h4">اضافة فاتورة</h4>
                            </div>
                        </div>
                        <small>قم باضافة وحفظ فواتيرك مع امكانية رفع مرفقات معها
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <div class="row">

          <div class="col-xl-12 col-lg-12">
             <div class="card">
                
                <div class="card-body">
                   <div class="new-user-info">
                         <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputName" class="control-label">رقم الفاتورة</label>
                                <input type="text" class="form-control" id="inputName" name="invoice_number"
                                    title="يرجي ادخال رقم الفاتورة" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>تاريخ الفاتورة</label>
                                <input type="date" class="form-control" name="invoice_Date" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="exampleFormControlSelect1">نوع الفاتورة</label>
                                <select class="form-select" id="exampleFormControlSelect1">
                                <option selected="" disabled="">اختر نوع الخدمة</option>
                                <option>ايجار</option>
                                <option>بيع</option>
                                <option>وساطة عقارية</option>
                                <option>صيانة</option>
                                </select>
                            </div>
                           
                            <div class="form-group col-md-4">
                               <label class="form-label" for="validationDefault01">اسم العميل :</label>
                               <input type="text" class="form-control" id="validationDefault01" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label" for="validationDefault01"> مبلغ التحصيل :</label>
                                <input type="text" class="form-control" id="validationDefault01" required>
                             </div>
                             <div class="form-group col-md-4">
                                <label class="form-label" for="exampleFormControlSelect1"> نسبة ضريبة القيمة المضافة :</label>
                                <select class="form-select" id="exampleFormControlSelect1">
                                <option selected="" disabled="">اختر النسبة </option>
                                <option>0%</option>
                                <option>5%</option>
                                <option>10%</option>
                                </select>
                            </div>
                             <div class="form-group col-md-6">
                                <label class="form-label" for="validationDefault01">  قيمة ضريبة القيمة المضافة :</label>
                                <input type="text" class="form-control" id="validationDefault01" required>
                             </div>
                             <div class="form-group col-md-6">
                                <label class="form-label" for="validationDefault01">   الاجمالي شامل الضريبة   :</label>
                                <input type="text" class="form-control" id="validationDefault01" required>
                             </div>
                           
                            <div class="form-group">
                                <label class="form-label" for="exampleFormControlTextarea1">الملاحظات </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                            <h5 class="card-title">  المرفقات : </h5>
                            <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                            <div class="card-body text-center">
                                <div id="drag-drop-area">
                                </div>
                            </div>
                           
                         </div>
                         <button type="submit" class="btn btn-primary">حفظ</button>
                         <button type="submit" class="btn btn-info">الغاء </button>
                        </div>
                </div>
             </div>
          </div>
         </div>
    </div>
 </x-app-layout>
 