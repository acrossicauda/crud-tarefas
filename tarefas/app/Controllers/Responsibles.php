<?php

namespace App\Controllers;

use App\Models\ResponsiblesModel;
use App\Controllers\ResponsibleDAO;

class Responsibles extends BaseController
{

	public function index(Array $data = array())
	{
        $data = ResponsibleDAO::getInstance()->getAllResponsible();
        //print_r($data);
        echo view('components/header', ['title' => 'Lista de Responsáveis']);
        echo view('pages/responsaveis', ['responsibles' => $data]);
        echo view('components/footer');
	}

	public function singleUser(Array $data = array())
	{
        $id = $this->request->getVar('idresponsibles');
        $data = ResponsibleDAO::getInstance()->getAllResponsible();
        //print_r($data);
        echo view('components/header', ['title' => 'Lista de Categorias']);
        echo view('pages/responsaveis', ['categories' => $data]);
        echo view('components/footer');
	}

    public function create(){
        $id = $this->request->getVar('id');
        $data = ResponsibleDAO::getInstance()->getAllResponsible($id);
        
        $title = (count($data) <= 0) ? 'Nova Responsável' : 'Editar Responsável';
        echo view('components/header', ['title' => $title]);
        echo view('pages/novo-responsavel', ['category' => $data]);
        echo view('components/footer');
    }

    public function store() 
    {
        $name = $this->request->getVar('name');
        $id = $this->request->getVar('idresponsibles');
        $categoryModel = ResponsibleDAO::getInstance();
        if(!empty($id)) {
            $data = [
                'name' => $name,
            ];
            $categoryModel->update($id, $data);
        } else {
            $data = [
                'name' => $name,
            ];
            $categoryModel->store($data);
        }
        
        return $this->response->redirect(base_url('responsaveis'));
    }
}
