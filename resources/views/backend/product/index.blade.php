@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-20">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <table class="data-table-simple table hover nowrap">
                        <thead>
                            <tr>
                                <th class="sorting_asc_disabled sorting_desc_disabled table-plus datatable-nosort">Product
                                </th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Type</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Weight</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Brand</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Stock</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Price</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Status</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled datatable-nosort"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="table-plus">
                                        <p>{{ $product->product_code }}</p><small
                                            class="text-blue">{{ $product->product_name }}</small>
                                    </td>
                                    <td>{{ $product->product_type }}</td>
                                    <td>{{ $product->product_weight }}</td>
                                    <td>{{ $product->product_brand }}</td>
                                    <td><span class="p-2 bg-light-gray rounded  mr-2"><i class="bi bi-box-seam "></i></span>
                                        {{ $product->stock }}
                                    </td>
                                    <td><span class="p-2 bg-green rounded mr-2"><i
                                                class="bi bi-currency-dollar "></i></span>Rp.
                                        {{ number_format($product->price, 2, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="{{ $product->product_status == 'avaible' ? 'bg-green' : 'bg-light-orange' }}  p-2 rounded">{{ ucfirst($product->product_status) }}</span>
                                    </td>
                                    <td>
                                        <a href=""><i class=""></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
