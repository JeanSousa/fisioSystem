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


    public function findEvolutionByPatientAndDate($id, $initial_date, $final_date)
    {
        try{

            if(!isset($initial_date)) {
               $initial_date = '0000-01-01 00:00:00';
            }

            if(!isset($final_date)) {
                $final_date = '2099-01-01 00:00:00';
            }
            
            $evolutions = $this->evolutionRepository
            ->where('patient_id', $id)
            ->whereBetween('evolution_date',[$initial_date, $final_date])
            ->orderByDesc('evolution_date')
            ->get();

            return $evolutions;
            
        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }


}
