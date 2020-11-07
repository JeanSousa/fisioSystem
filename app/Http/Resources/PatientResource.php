<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * transforma array em json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
        // return [ 
        //name = atributo do paciente cadastrado 
        //que foi passado como parametro para recurso
        //     'name' => $this->name,
        //     'cpf'  => $this->cpf
        // ];

    }
}
