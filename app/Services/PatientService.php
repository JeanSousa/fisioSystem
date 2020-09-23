<?php

namespace App\Services;

use App\Repositories\Contracts\PatientRepository;


class PatientService
{
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function findAllPatients()
    {
        $patients = $this->patientRepository->all();

        return $patients;
    }

}
