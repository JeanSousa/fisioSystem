<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestEvolution;
use App\Http\Requests\RequestEvolutionEdit;
use App\Services\EvolutionService;
use App\Services\PatientService;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EvolutionController extends Controller
{
    private $patientService;

    public $evolutions;

    /**
     * Construct
     */
    public function __construct(
        PatientService $patientService,
        EvolutionService $evolutionService
    )
    {
        $this->patientService = $patientService;
        $this->evolutionService = $evolutionService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($evolutions = null)
    {
        $patients = $this->patientService->findAllPatients(auth()->user()->id);

        return view('app.evolution.index', compact('patients', 'evolutions'));
    }


    public function filters(Request $request)
    {
       
        
        $evolutions = $this->evolutionService
        ->findEvolutionByPatientAndDate($request->patient_id,
        $request->initial_date,  $request->final_date);

        $evolutions->patient = $this->patientService
        ->findPatientById($request->patient_id);

        return $this->index($evolutions);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $patients = $this->patientService->findAllPatients(auth()->user()->id);

       return view('app.evolution.create', compact('patients')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestEvolution $request)
    {
        $data = $request->all();
        $evolution = $this->evolutionService->createEvolution($data);

        flash($evolution->message)->success();

        return redirect(url()->previous());
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
        $evolution = $this->evolutionService->findEvolutionById($id);

        $evolution->patient = $this->patientService
        ->findPatientById($evolution->patient_id);

        return view('app.evolution.edit', compact('evolution')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEvolutionEdit $request, $id)
    {
        $data = $request->all();

        $evolution = $this->evolutionService->updateEvolution($data, $id);

        flash($evolution->message)->success();

        return redirect(route('system.evolutions.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printPdf(Request $request)
    {
        $evolutions = $this->evolutionService
        ->findEvolutionByPatientAndDate(
          $request->report_patient_id,
          $request->report_initial_date,
          $request->report_final_date
        );

        $evolutions->patient = $this->patientService
        ->findPatientById(
            $request->report_patient_id,
            auth()->user()->id
        );

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('app.evolution.report', compact('evolutions'));
        return $pdf->download('Relatório Evoluções.pdf');
    }
}
