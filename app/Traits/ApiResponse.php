<?php
namespace App\Traits;

use Response;

class ApiResponse{
    public function res(array $data, $statusMsg = "success", $statusCode = 200){
        return Response::json([
            STATUS_CODE => $statusCode,
            STATUS_MSG => $statusMsg,
            DATA => $data
        ], $statusCode);
    }
}