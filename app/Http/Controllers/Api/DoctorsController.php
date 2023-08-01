<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctors\LinkPatientWithDoctorRequest;
use App\Http\Requests\Doctors\StoreDoctorsRequest;
use App\Models\Doctors;
use App\Models\DoctorsPatients;
use App\Models\Patients;
use Illuminate\Http\JsonResponse;

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
        return response()->json(Doctors::get(), 200);
    }
    /**
     * store
     *
     * @param  StoreDoctorsRequest $request
     * @return JsonResponse
     */
    public function store(StoreDoctorsRequest $request): JsonResponse
    {
        $doctor = Doctors::create($request->validated());
        return response()->json($doctor, 200);
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
        $data = $request->validated();
        if($data['medico_id'] != $id_medico)
            throw new ApiException('The id_doctor in the body is different id_doctor in the route parameter');

        $doctorsPatients = DoctorsPatients::where($data)->withTrashed()->first();

        if(!empty($doctorsPatients)){
            if($doctorsPatients->deleted_at)
                DoctorsPatients::withTrashed()->find($doctorsPatients->id)->restore();
            else throw new ApiException('Doctor is already linked with the patient');
        }
        else $doctorsPatients = DoctorsPatients::create($data);

        $doctor = Doctors::find($doctorsPatients->medico_id)->makeVisible($this->showHidden);
        $patient = Patients::find($doctorsPatients->paciente_id)->makeVisible($this->showHidden);

        return response()->json([
            'medico' => $doctor,
            'paciente' => $patient
        ], 200);
    }
    /**
     * Returns all patients of a doctor
     *
     * @param  int $id_medico
     * @return JsonResponse
     */
    public function getPacients(int $id_medico): JsonResponse
    {
        $patients = Patients::where('medico_id', $id_medico)
                            ->join('medico_paciente', 'medico_paciente.paciente_id', 'paciente.id')
                            ->select('paciente.*')
                            ->get()
                            ->makeVisible($this->showHidden);
        return response()->json($patients, 200);
    }
}
