<?php

namespace App\Http\Controllers\Api;

use App\Builder\ReturnMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctors\LinkPatientWithDoctorRequest;
use App\Http\Requests\Doctors\StoreDoctorsRequest;
use App\Models\Doctors;
use App\Models\DoctorsPatients;
use App\Models\Patients;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DoctorsController extends Controller
{
    private $showHidden = [];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->showHidden = [
            'created_at',
            'updated_at',
            'deleted_at'
        ];
    }
    /**
     * get all doctors in data base
     *
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        try {
            return response()->json(Doctors::get(), 200);
        } catch (\Exception $e) {
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
     * store
     *
     * @param  StoreDoctorsRequest $request
     * @return JsonResponse
     */
    public function store(StoreDoctorsRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $doctor = Doctors::create($request->all());
            DB::commit();

            return response()->json($doctor, 200);
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
     * linkPatientWithDoctor
     *
     * @param  LinkPatientWithDoctorRequest $request
     * @param  int $id_medico
     * @return JsonResponse
     */
    public function linkPatientWithDoctor(LinkPatientWithDoctorRequest $request, int $id_medico): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if($data['medico_id'] != $id_medico)
                throw new \Exception("The id_doctor in the body is different id_doctor in the route parameter");

            $doctorsPatients = DoctorsPatients::where($data)->withTrashed()->first();

            if(!empty($doctorsPatients)){
                if($doctorsPatients->deleted_at)
                    DoctorsPatients::withTrashed()->find($doctorsPatients->id)->restore();
                else throw new \Exception('Doctor is already linked with the patient');
            }
            else $doctorsPatients = DoctorsPatients::create($request->all());


            $doctor = Doctors::find($doctorsPatients->medico_id)->makeVisible($this->showHidden);
            $patient = Patients::find($doctorsPatients->paciente_id)->makeVisible($this->showHidden);

            DB::commit();

            return response()->json([
                'medico' => $doctor,
                'paciente' => $patient
            ], 200);
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
     * Returns all patients of a doctor
     *
     * @param  int $id_medico
     * @return JsonResponse
     */
    public function getPacients(int $id_medico): JsonResponse
    {
        try {
            $patients = Patients::join('medico_paciente', 'medico_paciente.paciente_id', 'paciente.id')
                                ->where('medico_id', $id_medico)
                                ->get()
                                ->makeVisible($this->showHidden);

            return response()->json($patients, 200);
        } catch (\Exception $e) {
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
