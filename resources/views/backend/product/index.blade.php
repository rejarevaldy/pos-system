@extends('templates.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-20">
            <div class="card-box mb-30">
                <div class="pd-20">
                    <table class="data-table-simple table nowrap">
                        <thead>
                            <tr class="text-secondary">
                                <th class="sorting_asc_disabled sorting_desc_disabled table-plus datatable-nosort">Product
                                </th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Type</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Weight</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Brand</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Stock</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled">Price</th>
                                <th class="sorting_asc_disabled sorting_desc_disabled text-center">Status</th>
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
                                    <td><span class="p-2 bg-light-gray rounded border  mr-2"><i
                                                class="bi bi-box-seam "></i></span>
                                        {{ $product->stock }}
                                    </td>
                                    <td><span class="p-2 bg-green rounded border mr-2"><i
                                                class="bi bi-currency-dollar "></i></span>Rp.
                                        {{ number_format($product->price, 2, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="{{ $product->product_status == 'avaible' ? 'bg-green  rounded border' : 'bg-light-orange  rounded border' }}  p-2">{{ ucfirst($product->product_status) }}</span>
                                    </td>
                                    <td>
                                        <button class=" btn btn-edit btn-icons btn-rounded bg-light-gray border"><small
                                                class="bi bi-pencil"></small></button>
                                        <button class="btn btn-edit btn-icons btn-rounded bg-light-gray border"
                                            id="deleteModalBtn" data-toggle="modal"
                                            data-target="#deleteModal_{{ $product->id }}" data-id="{{ $product->id }}"
                                            data-url="{{ route('auth.product.destroy', $product) }}"
                                            onClick='handleDelete(this)'><small class="bi bi-x-lg"></small></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" id="formDelete" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">
                                Are you sure want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



    @push('js')
        <script>
            function handleDelete(target) {
                let formDelete = document.querySelector("#formDelete");
                let deleteModal = document.querySelector("#deleteModal");
                const deleteModalBtn = document.querySelectorAll("#deleteModalBtn");
                deleteModalBtn.forEach((data) => {
                    data.addEventListener("click", function(e) {
                        deleteModal.setAttribute("id", `deleteModal_${data.dataset.id}`);
                        formDelete.setAttribute("action", data.dataset.url);
                    });
                });
            }
        </script>
    @endpush
@endsection
