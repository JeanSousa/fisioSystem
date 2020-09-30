<?php

namespace App\Services\Contracts;

use App\Services\ServiceResponse\ServiceResponse;

interface PatientServiceInterface
{
    public function updatePatient(): ServiceResponse;

}
