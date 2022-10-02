@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-12 mb-20 col-lg-4">
            <div class="card-box">
                <div class="pd-20">
                    <ul class="nav nav-tabs border-bottom" id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link rounded mr-2 active" id="manual-tab" data-toggle="tab" href="#manual"
                                role="tab" aria-controls="manual" aria-selected="true">Manual</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link rounded mr-2" id="import-tab" data-toggle="tab" href="#import" role="tab"
                                aria-controls="import" aria-selected="false">Import</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active " id="manual" role="tabpanel" aria-labelledby="manual-tab">
                            <div class="row  p-3">
                                <form action="" id="productForm">
                                    <div class="form-group mb-3 row">
                                        <label class="col-12  col-form-label">Product Code <span
                                                class="text-danger">*</span></label>
                                        <div class="col-12 ">
                                            <div class="input-group mb-0">
                                                <select name="product_code"
                                                    class="custom-select2 select-append form-control" id="product_code"
                                                    required>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->product_code }}">
                                                            {{ $product->product_code . ' - ' . $product->product_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-prepend">
                                                    <button
                                                        class="btn btn-outline-secondary border border-grey btn-sm px-3 ml-2"
                                                        type="button" data-toggle="modal" data-target="#"><i
                                                            class="bi bi-upc-scan"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-12 col-md-6 col-sm-12 space-bottom">
                                            <div class="row">
                                                <label class="col-12  col-form-label">Stock <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-12">
                                                    <input type="number" class="form-control" name="stock" id="stock"
                                                        placeholder="Insert Product Stock" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <div class="col-lg-12 col-md-6 col-sm-12">
                                            <div class="row">
                                                <label class="col-12  col-form-label"> Product Price <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-12">
                                                    <div class="input-group mb-0">
                                                        <div
                                                            class="input-group-prepend border-grey border rounded-left-span ">
                                                            <span class="input-group-text bg-light-gray">Rp.</span>
                                                        </div>
                                                        <input type="number" class="form-control" name="price"
                                                            id="price" placeholder="Insert Product Price" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-2 d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit" id="addNew"><i
                                                    class="bi bi-plus-lg"></i>
                                                Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="import" role="tabpanel" aria-labelledby="import-tab">...</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12 mb-20 col-lg-8">
            <div class="card-box `">
                <div class="pd-20">
                    <div class="alert alert-dark text-center mb-0 " role="alert" id="empty_alert">
                        Empty.
                    </div>
                    <form action="{{ route('auth.supply.store') }}" method="POST">
                        @csrf

                        <table class="table d-none " id="table_supply">
                            <thead>
                                <tr class="text-secondary">
                                    <th class="sorting_asc_disabled sorting_desc_disabled table-plus datatable-nosort">
                                        Product
                                    </th>
                                    <th class="sorting_asc_disabled sorting_desc_disabled">Stock</th>
                                    <th class="sorting_asc_disabled sorting_desc_disabled">Price</th>
                                    <th class="sorting_asc_disabled sorting_desc_disabled">Total</th>

                                    <th class="sorting_asc_disabled sorting_desc_disabled datatable-nosort"></th>
                                </tr>
                            </thead>
                            <tbody id="itemList">
                            </tbody>

                        </table>
                        <div class="row d-none" id="button_submit">
                            <div class="col-12 mt-2 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-save"></i>
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            let i = 0;

            function number_format(number, decimals, dec_point, thousands_sep) {
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }


            $('form#productForm').submit(function(event) {
                i++
                event.preventDefault();
                $('#table_supply').removeClass("d-none");
                $('#button_submit').removeClass("d-none");
                $('#empty_alert').addClass("d-none fade");

                let product_code = $('#product_code').val();
                let stock = $('#stock').val();
                let price = $('#price').val();
                let total_price = (price * stock);

                console.log(total_price)

                $.ajax({
                    method: "GET",
                    url: "{{ url('/auth/ajax/product/') }}/" + product_code,
                    success: function(response) {
                        let product_name = response.product.product_name;
                        let product_id = response.product.id;

                        $("#itemList").append(
                            `<tr id="remove_tr">
                                <td class="table-plus">
                                    <p>${product_code}</p><small class="text-blue">${product_name}</small>
                                    <input hidden name="product_id[${i}]" value="${product_id}" >

                                </td>
                                <td><span class="p-2 bg-light-gray rounded border  mr-2"><i
                                            class="bi bi-box-seam "></i></span>
                                    ${stock}
                                    <input  type="number" hidden name="stock[${i}]" value="${parseInt(stock)}">
                                </td>
                                <td><span class="p-2 bg-green rounded border mr-2"><i
                                            class="bi bi-currency-dollar "></i></span>Rp.
                                    ${number_format(price, 0, ',', '.')}
                                    <input type="number" hidden name="price[${i}]" value="${parseInt(price)}">
                                </td>
                                <td class="text-success"><span class="p-2 bg-green rounded border mr-2 "><i
                                            class="bi bi-currency-dollar "></i></span>Rp.
                                    ${number_format(total_price, 0, ',', '.')}
                                    <input type="number" hidden name="total_price[${i}]" value="${parseInt(total_price)}">
                                </td>
                                <td>
                                    <button class="btn btn-edit btn-icons rounded-circle  btn-sm bg-light-gray border "
                                        id="button_remove"><small
                                            class="font-weight-bold bi bi-x-lg"></small></button>
                                </td>
                            </tr>`
                        );
                    }
                })
                this.reset();

            })

            $(document).on('click', '#button_remove', function() {
                $(this).parents('#remove_tr').remove();

                i -= 1;
                if (i == 0) {
                    $('#empty_alert').removeClass("d-none fade");
                    $('#button_submit').removeClass("d-none");
                    $('#table_supply').addClass("d-none");

                }
            });
        </script>
    @endpush
@endsection
