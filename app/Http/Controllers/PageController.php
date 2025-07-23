<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function quienesSomos()
    {
        return view('quienes-somos');
    }

    public function proyectos()
    {
        return view('proyectos');
    }

    public function contacto()
    {
        return view('contacto');
    }
}