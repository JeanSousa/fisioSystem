<?php

namespace App\Services;

use App\Repositories\Contracts\AddressRepository;

class AddressService
{
    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function findAddressByPacient($userId)
    {
        try{
            
            $address = $this->addressRepository->where('patient_id', $userId)->get();

            return $address;
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }

    public function updateAddressByPatient($data, $idPatient)
    {
        try{

            $address = $this->addressRepository->findByField('patient_id',$idPatient);

            $this->addressRepository->update($data, $address[0]->id);
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 

    }


  

}
