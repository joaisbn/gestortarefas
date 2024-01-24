<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Título da Página',
            'description' => 'Texto de descrição aqui',
        ];

        return view('main', $data);
    }
}
