<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use App\Repositories\CarroRepositoryInterface as Carro;

class CarroService
{

    private $carro;

    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    public function getCarros($id = null)
    {
        try {
            return $this->carro->getCarros($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getCarro(int $id)
    {
        try {
            return $this->carro->getCarro($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createCarro(array $dados)
    {
        try {
            return $this->carro->createCarro($dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateCarro(int $id, array $dados)
    {
        try {
            return $this->carro->updateCarro($id, $dados);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteCarro(int $id)
    {
        try {
            return $this->carro->deleteCarro($id);
        } catch (QueryException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}