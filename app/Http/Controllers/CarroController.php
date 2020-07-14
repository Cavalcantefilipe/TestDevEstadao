<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarroService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class CarroController extends Controller
{

    private $carroSrv;

    public function __construct(CarroService $carroSrv)
    {
        $this->carroSrv = $carroSrv;
    }

    public function getCarros($id = null)
    {
        $data = $this->carroSrv->getCarros($id);

        if (isset($data['error'])) {
            return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            return response()->json($data, Response::HTTP_OK);
        }
    }

    public function createCarro(Request $request)
    {
        if ($request['ano'] > (date('Y') + 1)) {
            $error = ['Ano' => ['O ano inserido maior que o permitido']];
            return response()->json($error, Response::HTTP_BAD_REQUEST);
        }
        $validacao = Validator::make(
            $request->all(),
            [
                'marca'         => 'required|max:64',
                'modelo'         => 'required|max:64',
                'ano'         => "required|digits:4|gt:1884",

            ],
            [
                'max'          => 'O :attribute deve ter no maximo :max caracteres.',
                'numeric'      => 'O campo :attribute deve ser numérico.',
                'required'     => 'O campo :attribute é obrigatório.',
                'exists'       => 'O :attribute deve estar cadastrado.',
                'gt'          => 'O ano deve estar dentro',
                'digits'       => 'O ano deve ter 4 Digitos'
            ]
        );
        if ($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            $data = $this->carroSrv->createCarro($request->all());
            if (isset($data['error'])) {
                return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                return response()->json($data, Response::HTTP_OK);
            }
        }
    }

    public function updateCarro(int $id, Request $request)
    {
        $getCarro = $this->carroSrv->getCarros($id);
        if (!$getCarro) {
            $error['error']  = ['Carro não existe'];
            return response()->json($error, Response::HTTP_BAD_REQUEST);
        }
        if (!$request['marca'] && !$request['modelo'] && !$request['ano']) {
            $error['error'] = 'Sem campos para Alteracao';
            return response()->json($error, Response::HTTP_BAD_REQUEST);
        }
        if ($request['ano'] > (date('Y') + 1)) {
            $error = ['Ano' => ['O ano inserido maior que o permitido']];
            return response()->json($error, Response::HTTP_BAD_REQUEST);
        }
        $request['marca'] = $request['marca'] == null ? $getCarro['marca'] : $request['marca'];
        $request['modelo'] = $request['modelo'] == null ? $getCarro['modelo'] : $request['modelo'];
        $request['ano'] = $request['ano'] == null ? $getCarro['ano'] : $request['ano'];

        $data = $request->all();
        $validacao = Validator::make(
            $data,
            [
                'marca'         => 'required|max:64',
                'modelo'         => 'required|max:64',
                'ano'         => "required|digits:4|gt:1884",

            ],
            [
                'max'          => 'O :attribute deve ter no maximo :max caracteres.',
                'numeric'      => 'O campo :attribute deve ser numérico.',
                'required'     => 'O campo :attribute é obrigatório.',
                'exists'       => 'O :attribute deve estar cadastrado.',
                'gt'           => 'O ano deve estar dentro',
                'digits'       => 'O ano deve ter 4 Digitos'
            ]
        );

        if ($validacao->fails()) {

            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $carro = $this->carroSrv->updateCarro($id,$data);

            if (isset($data['error'])) {

                return response()->json($carro, Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {

                return response()->json($carro, Response::HTTP_OK);
            }
        }
    }

    public function deleteCarro(int $id)
    {

        $validation = Validator::make(
            [
                'idCarro' => $id
            ],
            [
                'idCarro' => 'required|numeric|exists:carro,idCarro',
            ],
            [
                'numeric'      => 'O campo :attribute deve ser numérico.',
                'required' => 'O campo :attribute é obrigatório.',
                'exists' => 'O :attribute deve estar cadastrado.'
            ]
        );
        if ($validation->fails()) {

            return response()->json($validation->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $carro = $this->carroSrv->deleteCarro($id);

            if (isset($carro['error'])) {

                return response()->json($carro, Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {

                return response()->json($carro, Response::HTTP_OK);
            }
        }
    }
}
