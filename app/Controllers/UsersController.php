<?php

namespace App\Controllers;

use SON\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $dados = array();

		$this->loadView('index', $dados);
    }

    public function create()
    {
        $dados = array();
		
		$this->loadView('cliente', $dados);
    }
}
