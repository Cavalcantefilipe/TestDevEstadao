<?php

namespace App\Repositories;

interface CarroRepositoryInterface
{
    public function getCarros(int $id);
    public function createCarro(array $dados);
    public function updateCarro(int $id,array $dados);
    public function deleteCarro(int $id);
}