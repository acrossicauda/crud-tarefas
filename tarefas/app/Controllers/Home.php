<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
        echo view('components/header', ['title' => 'Lista de Tarefas']);
        echo view('components/footer');
	}
}
