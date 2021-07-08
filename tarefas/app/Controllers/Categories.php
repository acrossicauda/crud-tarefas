<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Controllers\CategoriesDAO;

class Categories extends BaseController
{

	public function index(Array $data = array())
	{
        $data = CategoriesDAO::getInstance()->getAllCategories();
        //print_r($data);
        echo view('components/header', ['title' => 'Lista de Categorias']);
        echo view('pages/categorias', ['categories' => $data]);
        echo view('components/footer');
	}

	public function singleUser(Array $data = array())
	{
        $id = $this->request->getVar('idcategory');
        $data = CategoriesDAO::getInstance()->getAllCategories();
        //print_r($data);
        echo view('components/header', ['title' => 'Lista de Categorias']);
        echo view('pages/categorias', ['categories' => $data]);
        echo view('components/footer');
	}

    public function create(){
        $id = $this->request->getVar('id');
        $data = CategoriesDAO::getInstance()->getAllCategories($id);
        
        $title = (count($data) <= 0) ? 'Nova Tarefa' : 'Editar Tarefa';
        echo view('components/header', ['title' => $title]);
        echo view('pages/nova-categoria', ['category' => $data]);
        echo view('components/footer');
    }

    public function store() 
    {
        $description = $this->request->getVar('description');
        $id = $this->request->getVar('idcategory');
        $categoryModel = CategoriesDAO::getInstance();
        if(!empty($id)) {
            $data = [
                'description' => $description,
            ];
            $categoryModel->update($id, $data);
        } else {
            $data = [
                'description' => $description,
            ];
            $categoryModel->store($data);
        }
        
        return $this->response->redirect(base_url('categorias'));
    }

    public function delete() {
        $id = $this->request->getVar('id');
        $categoriesModel = new CategoriesModel();
        $ok = $categoriesModel->where("idcategory = $id")->delete();
        return $this->response->redirect(base_url('categorias'));
    }
}
