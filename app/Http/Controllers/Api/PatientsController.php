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
       $patient = Patients::create($request->validated());
        return response()->json($patient, 200);
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
        $patient = Patients::findOrFail($id_patient);
        $patient->update($request->all());
        return response()->json($patient, 200);
    }
}
