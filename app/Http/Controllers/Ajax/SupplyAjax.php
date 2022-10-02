<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Supply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplyAjax extends Controller
{
    public function getSupplyDate($date)
    {
        $supply = Supply::with(['product', 'user'])->whereDate('created_at', '=', $date)
            ->orderBy('created_at', 'DESC')->get();
        return response()->json(['supply' => $supply]);
    }
}
