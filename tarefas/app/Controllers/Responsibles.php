<?php

namespace App\Controllers;

use App\Models\ResponsiblesModel;
use App\Controllers\ResponsibleDAO;

class Responsibles extends BaseController
{

	public function index(Array $data = array())
	{
        $responsibleModel = new ResponsiblesModel();
        $data = $responsibleModel->orderBy('idresponsibles', 'DESC')->findAll();
        //$data = ResponsibleDAO::getInstance()->getAllResponsible();

        echo view('components/header', ['title' => 'Lista de Responsáveis']);
        echo view('pages/responsaveis', ['responsibles' => $data]);
        echo view('components/footer');
	}

	public function singleUser(Array $data = array())
	{
        $id = $this->request->getVar('idresponsibles');
        //$data = ResponsibleDAO::getInstance()->getAllResponsible();
        $responsibleModel = new ResponsiblesModel();
        $data = $responsibleModel->getAllResponsible();

        echo view('components/header', ['title' => 'Lista de Responsáveis']);
        echo view('pages/responsaveis', ['responsible' => $data]);
        echo view('components/footer');
	}

    public function create(){
        $id = $this->request->getVar('id');
        //$data = ResponsibleDAO::getInstance()->getAllResponsible($id);

        $responsibleModel = new ResponsiblesModel();
        $data = $responsibleModel->orderBy('idresponsibles', 'DESC')->find($id);
        
        $title = (count($data) <= 0) ? 'Nova Responsável' : 'Editar Responsável';
        echo view('components/header', ['title' => $title]);
        echo view('pages/novo-responsavel', ['responsibles' => $data]);
        echo view('components/footer');
    }

    public function store() 
    {
        $name = $this->request->getVar('name');
        $id = $this->request->getVar('idresponsibles');
        //$responsibleModel = ResponsibleDAO::getInstance();
        $responsibleModel = new ResponsiblesModel();

        if(!empty($id)) {
            $data = [
                'name' => $name,
            ];
            $responsibleModel->update($id, $data);
        } else {
            $data = [
                'name' => $name,
            ];
            $responsibleModel->insert($data);
        }
        
        return $this->response->redirect(base_url('responsaveis'));
    }

    public function delete() {
        $id = $this->request->getVar('id');
        $responsiblesModel = new ResponsiblesModel();
        $ok = $responsiblesModel->where("idresponsibles = $id")->delete();
        return $this->response->redirect(base_url('responsaveis'));
    }
}
