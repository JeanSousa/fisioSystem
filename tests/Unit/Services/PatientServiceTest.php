<?php

use App\Repositories\PatientRepositoryEloquent;
use App\Services\PatientService;
use Tests\TestCase;

class PatientServiceTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnObjectWhenFoundResult(){
    
        $patientRepository = $this->createMock(PatientRepositoryEloquent::class);

        $patientService = new PatientService($patientRepository);

        $patientRepository
        ->method('all')
        ->willReturn((object) [ 0 => [     
        "id" => 1,
        "user_id" => 1,
        "name" => "Prof. Willard Bins",
        "rg" => "999999999",
        "cpf" => "111111111",
        "email" => "jeanjr.silvasousa@gmail.com",
        "photo" => null,
        "birth_date" => "1990-05-05",
        "created_at" => "2020-09-21 20:17:30",
        "updated_at" => "2020-09-21 20:17:30",
        ]]);

        $patients = $patientService->findAllPatients();
        
        $this->assertIsObject($patients);
    }


    /**
     * @test
     */
    public function shouldNotReturnObjectWhenNotFoundResult(){
    
        $patientRepository = $this->createMock(PatientRepositoryEloquent::class);

        $patientService = new PatientService($patientRepository);

        $patientRepository
        ->method('all')
        ->willReturn(null);

        $patients = $patientService->findAllPatients();
        
        $this->assertIsNotObject($patients);
    }


}