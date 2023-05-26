<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '000.000.000/000-0.00',
                'ddd' => '11',
                'telefone' => '00000-000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'N',
                'cnpj' => null,
                'ddd' => '32',
                'telefone' => '00000-000'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'N',
                'cnpj' => null,
                'ddd' => '85',
                'telefone' => '00000-000'
            ],
        ];
        
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
