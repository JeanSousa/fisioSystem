<?php

namespace App\Services;

use App\Repositories\Contracts\PhoneRepository;

class PhoneService
{
    public function __construct(PhoneRepository $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    public function findPhoneByPacient($userId)
    {
        try{
            
            $phones = $this->phoneRepository->where('patient_id', $userId)->get();

            return $phones;
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }

}
