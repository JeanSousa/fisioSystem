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


    public function findPatientById($id)
    {
        try{
            $patient = $this->patientRepository->find($id);
    
            return $patient;
            
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


    public function updatePatient($data, $idPatient)
    {
        try{
            $patient = $this->patientRepository->update($data, $idPatient);

            return $patient;
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 

    }


    public function deletePatient($idPatient)
    {
        try{
            $this->patientRepository->delete($idPatient);
       
        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }    




}
