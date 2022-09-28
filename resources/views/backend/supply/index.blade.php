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
                                <input type="text" class="form-control " placeholder="Search Here" id="searchBox" />
                            </div>
                        </form>
                    </div>
                </div>

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
                                        <td><span class="p-2 bg-light-gray border rounded">{{ $supply->user->name }}</span>
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
    @push('js')
        <script></script>
    @endpush
@endsection
