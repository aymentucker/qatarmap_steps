<x-app-layout :assets="$assets ?? []" title='Billing' :isBanner="true">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">

                        <div class="text-end">
                            <p>Billed from</p>
                            <h5>Qompac UI ltd.</h5>
                            <h6>2972 Westheimer Rd. Santa Ana,<br>
                                Illinois 85486 </h6>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class=" col-lg-8 col-xl-8 col-xxl-9">
                            <div class="invoice-card card">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <div class="">
                                        <p class="">Invoice Number</p>
                                        <h4 class="my-2">#215462</h4>
                                        <h6>Issued Date: 22 Mar 2021</h6>
                                        <h6 class="mb-0">Due Date: 29 Mar 2021</h6>
                                    </div>
                                    <div class="text-end">
                                        <h6>Billed to</h6>
                                        <h5>Anne Teak</h5>
                                        <p class="mb-0">4517 Washington Ave. Manchester, Kentucky 39495</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class=" col-lg-4 col-xl-4 col-xxl-3">
                            <div class="invoice-biling card">
                                <h6 class="mb-0">Amount Due <small>(USD)</small></h6>
                                <h3 class="mb-4">$14,010.00 <small>(Tax incl.)</small></h3>
                                <div>
                                    <div class="btn btn-sm btn-soft-danger">Due Date: 29 Mar 2021</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <div class="table-responsive-lg">
                                <table class="table billing-1">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Name</th>
                                            <th class="text-center" scope="col">Price</th>
                                            <th class="text-center" scope="col">Quantity</th>
                                            <th class="text-end" scope="col">Sub-Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Item 1</h6>
                                            </td>
                                            <td class="text-center">$2,100</td>
                                            <td class="text-center">1</td>
                                            <td class="text-end">$2,100</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Item 2</h6>
                                            </td>
                                            <td class="text-center">$4,205</td>
                                            <td class="text-center">2</td>
                                            <td class="text-end">$8,410</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Item 1</h6>
                                            </td>
                                            <td class="text-center">$1,500</td>
                                            <td class="text-center">3</td>
                                            <td class="text-end">$4,500</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <h6 class="mb-0 text-end">Total:</h6>
                                            </td>
                                            <td class="text-end">$15,010.00</td>
                                        </tr>
                                        <tr>

                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td>
                                                <h6 class="mb-0 text-end">Tax:</h6>
                                            </td>
                                            <td class="text-end">$1,500</td>
                                        </tr>
                                        <tr>

                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td>
                                                <h6 class="mb-0 text-end">Discount:</h6>
                                            </td>
                                            <td class="text-end">$2,500</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mb-0"><b>Net Amount</b></h5>
                                            </td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>

                                            <td class="text-end"><b>$14,010.00</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="mb-0 mt-4">
                                Please pay before the due date. Thank you for your business.
                            </p>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
