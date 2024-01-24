<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => $this->nome,
            'empresa' => $this->empresa,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'celular' => $this->celular,
            'link' => $this->link,
            'cnpj' => $this->cnpj,
            'codigo' => $this->codigo,
            'ativo' => $this->ativo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sistema' => new SistemaResource($this->whenLoaded('sistema'))
        ];
    }
}
