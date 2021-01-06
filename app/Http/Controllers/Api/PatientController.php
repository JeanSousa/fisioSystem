<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPatient;
use App\Http\Resources\PatientCollection;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Services\AddressService;
use App\Services\PatientService;
use App\Services\PhoneService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{

    public function __construct(
        PatientService $patientService,
        PhoneService $phoneService,
        AddressService $addressService,
        Patient $patient
    )
    {
        $this->patientService = $patientService;
        $this->phoneService = $phoneService;
        $this->addressService = $addressService;
        $this->patient = $patient;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = $this->patientService->findAllPatients(auth('api')->user()->id);
            
        return new PatientCollection($patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestPatient $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
          $path = Storage::disk('public')->put('patients', $data['photo']);
          $data['photo'] = $path;
        }

        $this->patientService->createPatientByUser($data);

        return response()->json(['message' => 'Paciente inserido com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = $this->patientService->findPatientById(
            $id,
            auth('api')->user()->id
        );

        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->patientService->updatePatient($data, $id);

        $this->phoneService->updatePhoneByPatient($data, $id);

        $this->addressService->updateAddressByPatient($data, $id);

        return response()->json(['message' => 'Paciente atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->patientService->deletePatient(
            $id,
            auth('api')->user()->id
        );

        return response()->json(['message' => 'Paciente excluído com sucesso!']);
    }
}
