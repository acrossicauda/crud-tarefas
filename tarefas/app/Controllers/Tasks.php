<?php

namespace App\Controllers;

use App\Models\ResponsiblesModel;
use App\Models\TasksModel;
use App\Controllers\TaskDAO;
use App\Controllers\ResponsibleDAO;

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

    
	public function getTasks(Array $data = array())
	{
        $id = $this->request->getVar('id');
        $data = TaskDAO::getInstance()->getAllTasks($id);
        echo view('components/header', ['title' => 'Lista de Tarefas']);
        echo view('pages/tarefas-view', ['tasks' => $data]);
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

        //$categories = ResponsibleDAO::getInstance()->getAllResponsible();
        $responsibleModel = new ResponsiblesModel();
        $responsibles = $responsibleModel->orderBy('idresponsibles', 'DESC')->findAll();
        $data['responsibles'] = $responsibles;

        $title = (count($data) <= 0) ? 'Nova Tarefa' : 'Editar Tarefa';
        echo view('components/header', ['title' => $title]);
        echo view('pages/nova-tarefa', ['tasks' => $data]);
        echo view('components/footer');
    }

    public function store()
    {
        $id = $this->request->getVar('idtask');
        $idcategory = $this->request->getVar('category');
        $idresponsible = $this->request->getVar('responsible');
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

    public function delete() {
        $id = $this->request->getVar('id');
        $taskModel = new TasksModel();
        $ok = $taskModel->where("idtasks = $id")->delete();
        return $this->response->redirect(base_url('tarefas'));
    }
}
