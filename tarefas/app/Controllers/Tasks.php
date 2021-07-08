<?php

namespace App\Controllers;

use App\Models\TasksModel;
use App\Controllers\TaskDAO;

class Tasks extends BaseController
{

	public function index(Array $data = array())
	{
        $data = TaskDAO::getInstance()->getAllTasks();
        //print_r($data);
        echo view('components/header', ['title' => 'Lista de Tarefas']);
        echo view('pages/tarefas', ['tasks' => $data]);
        echo view('components/footer');
	}

    public function singleUser(Array $data = array())
	{
        $id = $this->request->getVar('idtasks');
        $data = TaskDAO::getInstance()->getAllTasks();
        //print_r($data);
        echo view('components/header', ['title' => 'Lista de Tarefas']);
        echo view('pages/tarefas', ['categories' => $data]);
        echo view('components/footer');
	}

    public function create(){
        $id = $this->request->getVar('id');
        $data = CategoriesDAO::getInstance()->getAllCategories($id);
        $categories = CategoriesDAO::getInstance()->getAllCategories();
        $data['categories'] = $categories;

        $categories = ResponsibleDAO::getInstance()->getAllResponsible();
        $data['responsibles'] = $categories;

        $title = (count($data) <= 0) ? 'Nova Tarefa' : 'Editar Tarefa';
        echo view('components/header', ['title' => $title]);
        echo view('pages/nova-tarefa', ['tasks' => $data]);
        echo view('components/footer');
    }

    public function store() 
    {
        $idtask = $this->request->getVar('idtask');
        $idcategory = $this->request->getVar('idcategory');
        $idresponsible = $this->request->getVar('idresponsible');
        $description = $this->request->getVar('description-task');
        $data_end = $this->request->getVar('data_end');

        $taskModel = TaskDAO::getInstance();
        
        $data = [
            'description' => $description,
            'idcategory' => $idcategory,
            'idresponsible' => $idresponsible,
            'data_end' => $data_end,
        ];
        if(!empty($id)) {
            $taskModel->update($id, $data);
        } else {
            $taskModel->store($data);
        }
        
        return $this->response->redirect(base_url('tarefas'));
    }
}
