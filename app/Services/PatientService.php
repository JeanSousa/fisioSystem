<?php

namespace App\Services;

use App\Repositories\Contracts\PatientRepository;

class PatientService
{
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function findAllPatients($userId)
    {
        try{
            $patients = $this->patientRepository->where('user_id', $userId)->get();
    
            return $patients;
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }


    public function createPatientByUser($data)
    {
        $user = auth()->user();

        $user->patient()->create($data);

       // $auth = new stdClass();

       // $auth->name  = Auth::user()->name;

       // $auth->email = Auth::user()->email;

      //  SendEmailJob::dispatch($contact, $auth)->delay(now()->addSeconds('15'));

     
    }


}
