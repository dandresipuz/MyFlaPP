<?php

namespace App\Traits;


trait ApiResponse
{
    public function responseApi($data, $code = 200, $msj = "")
    {
        return response()->json([
            "data" => $data,
            "code" => $code,
            "msj" => $msj
        ]);
    }
}
