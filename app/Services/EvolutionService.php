<?php

namespace App\Services;

use App\Repositories\Contracts\EvolutionRepository;
use App\Repositories\Contracts\PatientRepository;
use App\Services\ServiceResponse\ServiceResponse;

class EvolutionService
{
    public function __construct(
        EvolutionRepository $evolutionRepository,
        PatientRepository $patientRepository
    
    )
    {
        $this->evolutionRepository = $evolutionRepository;
        $this->patientRepository = $patientRepository;

    }

  

    public function createEvolution($data)
    {
        try{

            $patient = $this->patientRepository->find($data['patient_id']);

            $patient->evolution()->create($data);

            return new ServiceResponse(
                true,
                'Evolução cadastrada com Sucesso !'
            );
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }


    public function findEvolutionByPatient($id)
    {
        try{
            
            $evolutions = $this->evolutionRepository
            ->where('patient_id', $id)->get();

            return $evolutions;
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }


}
