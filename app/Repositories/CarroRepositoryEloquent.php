<?php

namespace App\Repositories;

use App\Repositories\CarroRepositoryInterface;
use App\Models\Carro;


class CarroRepositoryEloquent implements CarroRepositoryInterface
{
    private $carro;

    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    public function getCarros($id = null)
    {
        $query = $this->carro->select();
        if ($id) {
            return $query->where('idCarro', $id)->first();
        }
        return $query->get();
    }

    public function createCarro(array $dados)
    {
        return $this->carro->create($dados);
    }

    public function updateCarro(int $id, array $dados)
    {
        return $this->carro
            ->where('idCarro', $id)
            ->update($dados);
    }

    public function deleteCarro(int $id)
    {
        $query = $this->carro->find($id);
        return $query->delete();
    }
}
