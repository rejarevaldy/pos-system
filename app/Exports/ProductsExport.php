<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::select(
            "product_code",
            "product_name",
            'product_type',
            'product_weight',
            'product_unit',
            'product_brand',
            'product_status',
            'stock',
            'price'
        )->get();
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [
            "Code",
            "Name",
            'Type',
            'Weight',
            'Unit',
            'Brand',
            'Status',
            'Stock',
            'Price'
        ];
    }
}
