<?php

namespace App\Services;

use App\Api\ApiMessages;
use App\Jobs\SendNotification;
use App\Repositories\Contracts\PatientRepository;
use App\Services\ServiceResponse\ServiceResponse;

class PatientService
{
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function findAllPatients($userId)
    {
        try {
            $patients = $this->patientRepository->where('user_id', $userId)->get();

            return $patients;
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    public function findPatientById($id, $user_id)
    {
        try {
            $patient = $this->patientRepository
            ->with('address')->with('phone')
            ->where('user_id', $user_id)
            ->find($id);

            return $patient;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function createPatientByUser($data)
    {
        $user = auth()->user();

        $patient =  $user->patient()->create($data);

        $patient->phone()->create($data);

        $patient->address()->create($data);

        // $auth = new stdClass();

        // $auth->name  = Auth::user()->name;

        // $auth->email = Auth::user()->email;

        //  SendEmailJob::dispatch($contact, $auth)->delay(now()->addSeconds('15'));


        SendNotification::dispatch()->delay(now()->addSeconds('5'));
    }


    public function updatePatient($data, $idPatient)
    {
        try {
            $patient = $this->patientRepository->update($data, $idPatient);

            return new ServiceResponse(
                true,
                'Paciente Atualizado com Sucesso !',
                $patient
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function deletePatient($idPatient, $user_id)
    {
        try {
            $patient = $this->patientRepository
            ->where('user_id', $user_id)
            ->where('id', $idPatient);

            $patient->delete();
        } catch (\Exception $e) {
            dd($e);
            return $e->getMessage();
        }
    }
}
