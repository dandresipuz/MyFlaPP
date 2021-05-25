<?php

namespace App\Traits;


trait ApiResponse
{
    public function responseApi($data, $code = 200, $msj = "Ok")
    {
        return response()->json([
            "data" => $data,
            "code" => $code,
            "msj" => $msj
        ]);
    }

    public function responseCreateApi($data, $code = 201, $msj = "Object created")
    {
        return response()->json([
            "data" => $data,
            "code" => $code,
            "msj" => $msj
        ]);
    }
    public function responseDeleteApi($data, $code = 204, $msj = "No content")
    {
        return response()->json([
            "data" => $data,
            "code" => $code,
            "msj" => $msj
        ]);
    }
}
