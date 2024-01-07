<x-app-layout :assets="$assets ?? []" title='Billing' :isBanner="true">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="mb-3">Invoice #215462</h4>
                            <h3 class="mb-5">Elon Musk </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h5>Bill to:</h5>
                            <p>Elon musk</p>
                            <p>4517 Washington Ave. <br>
                                Manchester, Kentucky 39495</p>
                        </div>
                        <div class="col-lg-3">
                            <h5>Bill from:</h5>
                            <p>Qompac UI ltd.</p>
                            <p>2972 Westheimer Rd. Santa Ana,<br>
                                Illinois 85486 </p>
                        </div>
                        <div class="col-lg-3">
                            <h5>Bill fromAmount Due:</h5>
                            <h4>$14,010.00</h4>
                        </div>
                        <div class="col-lg-2 text-end">
                            <h5>Invoice Date</h5>
                            <p class="">27 May 2021</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <div class="table-responsive-lg">
                                <table class="table billing">
                                    <thead>
                                        <tr>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th class="text-end" scope="col">Sub-Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Item 1</h6>
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.
                                                </p>
                                            </td>
                                            <td>$2,100</td>
                                            <td>1</td>
                                            <td class="text-end">$2,100</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Item 2</h6>
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.
                                                </p>
                                            </td>
                                            <td>$4,205</td>
                                            <td>2</td>
                                            <td class="text-end">$8,410</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Item 1</h6>
                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit.
                                                </p>
                                            </td>
                                            <td>$1,500</td>
                                            <td>3</td>
                                            <td class="text-end">$4,500</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <h6 class="mb-0">Total:</h6>
                                            </td>
                                            <td class="text-end">$15,010.00</td>
                                        </tr>
                                        <tr>

                                            <td></td>
                                            <td></td>
                                            <td>
                                                <h6 class="mb-0">Tax:</h6>
                                            </td>
                                            <td class="text-end">$1,500</td>
                                        </tr>
                                        <tr>

                                            <td></td>
                                            <td></td>
                                            <td>
                                                <h6 class="mb-0">Discount:</h6>
                                            </td>
                                            <td class="text-end">$2,500</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mb-0"><b>Net Amount</b></h5>
                                            </td>
                                            <td></td>
                                            <td></td>

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
                            <div class="d-flex justify-content-center mt-4">
                                <button type="button" class="btn btn-primary">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
