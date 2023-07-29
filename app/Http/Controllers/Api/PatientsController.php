<?php

namespace App\Http\Controllers\Api;

use App\Builder\ReturnMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\StorePatientsRequest;
use App\Http\Requests\Patients\UpdatePatientsRequest;
use App\Models\Patients;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PatientsController extends Controller
{
    /**
     * store patients in system
     *
     * @param  StorePatientsRequest $request
     * @return JsonResponse
     */
    public function store(StorePatientsRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $patient = Patients::create($request->all());
            DB::commit();

            return response()->json($patient, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return ReturnMessage::message(
                true,
                $e->getMessage(),
                $e->getMessage(),
                null,
                null,
                400
            );
        }
    }
    /**
     * update
     *
     * @param  UpdatePatientsRequest $request
     * @param  int $id_patients
     * @return JsonResponse
     */
    public function update(UpdatePatientsRequest $request, int $id_patient): JsonResponse
    {
        DB::beginTransaction();
        try {
            $patient = Patients::findOrFail($id_patient);
            $patient->update($request->all());
            DB::commit();
            return response()->json($patient, 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return ReturnMessage::message(
                true,
                $e->getMessage(),
                $e->getMessage(),
                null,
                null,
                400
            );
        }
    }
}
