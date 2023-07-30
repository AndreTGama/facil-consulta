<?php

namespace App\Http\Controllers\Api;

use App\Builder\ReturnMessage;
use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Doctors;
use Illuminate\Http\JsonResponse;

class CitiesController extends Controller
{
    /**
     * get all cities in data base
     *
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        try {
            return response()->json(Cities::get(), 200);
        } catch (\Exception $e) {
            return ReturnMessage::message(
                false,
                $e->getMessage(),
                $e->getMessage(),
                null,
                null,
                400
            );
        }
    }
    /**
     * get all doctors in a city by id city
     *
     * @param  int $id_city
     * @return JsonResponse
     */
    public function getDoctors(int $id_city): JsonResponse
    {
        try {
            $city = Cities::findOrFail($id_city);

            if(empty($city)) throw new \Exception('City not found');

            $doctors = Doctors::where('cidade_id', $id_city)->get();
            return response()->json($doctors, 200);

        } catch (\Exception $e) {
            return ReturnMessage::message(
                false,
                $e->getMessage(),
                $e->getMessage(),
                null,
                null,
                400
            );
        }
    }
}
