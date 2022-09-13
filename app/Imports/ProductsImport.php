<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'product_code'      => $row[0],
            'product_name'      => $row[1],
            'product_type'      => $row[2],
            'product_weight'    => $row[3],
            'product_unit'      => $row[4],
            'product_brand'     => $row[5],
            'product_status'    => $row[6],
            'stock'             => $row[7],
            'price'             => $row[8],
        ]);
    }
    public function rules(): array
    {

        return [
            '0' => 'required|string',
            '1' => 'required|string',
            '3' => 'required|string',
            '6' => 'required|numeric',
            '7' => 'required|numeric',

        ];
    }
}
