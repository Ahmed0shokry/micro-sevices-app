<?php


namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function success($data, $code) {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $code) {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
    /**
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function errorMessage($data, $code) {
        return response($data, $code)->header('Content-Type', 'application/json');
    }
}
