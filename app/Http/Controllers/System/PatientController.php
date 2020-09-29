<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPatient;
use App\Services\PatientService;
use App\Services\PhoneService;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    private $patientService;

    private $phoneService;


     /**
    * Construtor
    */
    public function __construct(PatientService $patientService, PhoneService $phoneService)
    {
        $this->patientService = $patientService;

        $this->phoneService = $phoneService;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $patients = $this->patientService->findAllPatients(auth()->user()->id);

       return view('app.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.patients.create');
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

        $request->hasFile('photo') ? $data = $this->uploadImage($data, $request) : null;

        $this->patientService->createPatientByUser($data);

        return redirect(route('system.patients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = $this->patientService->findPatientById($id);

        $phones = $this->phoneService->findPhoneByPacient($patient->id);
         
        foreach($phones as $p){
            $patient->phone = $p['phone'];
            $patient->mobile_phone = $p['mobile_phone'];
        }

        return view('app.patients.edit', compact('patient'));
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

        $request->hasFile('photo') ? $data = $this->uploadImage($data, $request) : null;

        $this->patientService->updatePatient($data, $id);

        $this->phoneService->updatePhoneByPatient($data, $id);

        return redirect(route('system.patients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $this->patientService->deletePatient($id);

        return redirect(route('system.patients.index'));
    }


    private function uploadImage($data, $request)
    {
        $photo = $request->file('photo');

        $data['photo'] = $photo->store('patients', 'public');

        return $data;
    }
}
