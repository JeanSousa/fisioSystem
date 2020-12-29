<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPatient;
use App\Services\AddressService;
use App\Services\PatientService;
use App\Services\PhoneService;
use Illuminate\Http\Request;



class PatientController extends Controller
{

    private $patientService;

    private $phoneService;

    private $addressService;


    /**
     * Construtor
     */
    public function __construct(
        PatientService $patientService, 
        PhoneService $phoneService,
        AddressService $addressService
       
    ) {
        $this->patientService = $patientService;

        $this->phoneService = $phoneService;

        $this->addressService = $addressService;

        $this->middleware('verifyPatientBelongsUser')->only('edit');

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

        return view('app.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestPatient $request, $id)
    {
        $data = $request->all();

        $request->hasFile('photo') ? $data = $this->uploadImage($data, $request) : null;

        $patient = $this->patientService->updatePatient($data, $id);

        $this->phoneService->updatePhoneByPatient($data, $id);

        $this->addressService->updateAddressByPatient($data, $id);

        flash($patient->message)->success();

        return redirect(url()->previous());
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
