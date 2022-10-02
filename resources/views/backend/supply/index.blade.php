@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-20 col-lg-12">
            <div class="card-box">
                <div class="row p-3" id="button_submit">
                    <div class="col-6">
                        <a href="{{ route('auth.supply.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i>
                            Create Supply</a>
                    </div>
                    <div class="col-6 mt-2 d-flex justify-content-end">
                        <form>
                            <div class="form-group mb-0">
                                <input type="text" class="form-control " placeholder="Search Here" id="search_box" />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="div d-none" id="search_supply">
                    <div class="pd-20">
                        <small class="text-secondary" id="date"></small>
                        <table class="table mt-4">
                            <thead>
                                <tr class="text-secondary ">
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Purchase Price</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Created by</th>
                                </tr>
                            </thead>
                            <tbody id="list_supply">



                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="all_supply">
                    @foreach ($dates as $date)
                        @php
                            $supplies = App\Models\Supply::whereDate('created_at', '=', $date)
                                ->orderBy('created_at', 'DESC')
                                ->get();
                        @endphp
                        <div class="pd-20">
                            <small class="text-secondary">{{ $date }}</small>
                            <table class="table mt-4">
                                <thead>
                                    <tr class="text-secondary ">
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Purchase Price</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Created by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplies as $supply)
                                        <tr>
                                            <th>
                                                <span class="d-block">{{ $supply->product->product_name }}</span>
                                                <span
                                                    class="text-secondary"><small>{{ $supply->product->product_code }}</small></span>
                                                <span
                                                    class="d-block mt-2 text-secondary"><small>{{ date('d M, Y', strtotime($supply->created_at)) . ' at ' . date('H:i', strtotime($supply->created_at)) }}</small></span>
                                            </th>
                                            <td><span class="p-2 bg-light-gray rounded border  mr-2"><i
                                                        class="bi bi-box-seam "></i></span>
                                                {{ $supply->quantity }}</td>
                                            <td><span class="p-2 bg-green rounded border mr-2"><i
                                                        class="bi bi-currency-dollar "></i></span>Rp.
                                                {{ number_format($supply->purchase_price, 2, ',', '.') }}</td>
                                            <td class="text-success"><span class="p-2 bg-green rounded border mr-2"><i
                                                        class="bi bi-currency-dollar "></i></span>- Rp.
                                                {{ number_format($supply->total_price, 2, ',', '.') }}</td>
                                            <td><span
                                                    class="p-2 bg-light-gray border rounded">{{ $supply->user->name }}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('#search_box').on('input', function() {
                $search_input = $(this).val();
                if ($(this).val().length != 0) {
                    $('#all_supply').addClass("d-none");
                    $('#search_supply').removeClass("d-none");
                    $.ajax({
                        method: "GET",
                        url: "{{ url('auth/ajax/supply/') }}/" + $search_input,
                        dataType: 'json',
                        success: function(response) {
                            const list_supply = document.querySelectorAll('#list_supply')
                            const products_id = response.products_id;
                            let list = `
                            <tr class='d-none'>
                                    <th>
                                        <span class="d-block"></span>
                                        <span class="text-secondary"><small></small></span>
                                        <span class="d-block mt-2 text-secondary"><small></small></span>
                                    </th>
                                    <td><span class="p-2 bg-light-gray rounded border  mr-2"><i
                                                class="bi bi-box-seam "></i></span>
                                    </td>
                                    <td><span class="p-2 bg-green rounded border mr-2"><i
                                                class="bi bi-currency-dollar "></i></span>Rp.
                                    </td>
                                    <td class="text-success"><span class="p-2 bg-green rounded border mr-2"><i
                                                class="bi bi-currency-dollar "></i></span>- Rp.
                                    </td>
                                    <td><span class="p-2 bg-light-gray border rounded"></span>
                                    </td>
                                </tr>`
                            response.supply.map(data => {
                                list += `<tr>
                                    <th>
                                        <span class="d-block">${data.product.product_name}</span>
                                        <span class="text-secondary"><small>${data.product.product_code}</small></span>
                                        <span class="d-block mt-2 text-secondary"><small></small>${data.created_at}</span>
                                    </th>
                                    <td><span class="p-2 bg-light-gray rounded border  mr-2"><i
                                                class="bi bi-box-seam "></i>${data.quantity}</span>
                                    </td>
                                    <td><span class="p-2 bg-green rounded border mr-2"><i
                                                class="bi bi-currency-dollar "></i></span>Rp. ${data.purchase_price}
                                    </td>
                                    <td class="text-success"><span class="p-2 bg-green rounded border mr-2"><i
                                                class="bi bi-currency-dollar "></i></span>- Rp. ${data.total_price}
                                    </td>
                                    <td><span class="p-2 bg-light-gray border rounded">${data.user.name}</span>
                                    </td>
                                </tr>`
                            })
                            list_supply.forEach(html => {
                                html.innerHTML = list
                            })

                        }
                    })

                } else {
                    $('#search_supply').addClass("d-none");
                    $('#all_supply').removeClass("d-none");
                }
            })
        </script>
    @endpush
@endsection
