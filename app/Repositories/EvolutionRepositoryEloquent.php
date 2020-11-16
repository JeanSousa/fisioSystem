<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\EvolutionRepository;
use App\Models\Evolution;


/**
 * Class EvolutionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EvolutionRepositoryEloquent extends BaseRepository implements EvolutionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Evolution::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
