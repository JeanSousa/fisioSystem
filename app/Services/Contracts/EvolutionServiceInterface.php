<?php

namespace App\Services\Contracts;

use App\Services\ServiceResponse\ServiceResponse;

interface EvolutionServiceInterface
{
    public function createEvolution(): ServiceResponse;

}
