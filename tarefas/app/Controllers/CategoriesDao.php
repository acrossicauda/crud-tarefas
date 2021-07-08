<?php 
namespace App\Controllers;

use App\Models\CategoriesModel;
use CodeIgniter\Controller;

class CategoriesDAO extends Controller
{

    private static $instance;

    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}
    
 
    // insert data
    public function store($data = array()) {
        $categoriesModel = new CategoriesModel();
        $ok = $categoriesModel->insert($data);
        return $ok;
    }



    //'idcategory', 'description', 'responsible', 'data_end', 'idcategory']
    // update category data
    public function update($id, $data = array()){
        $categoryModel = new CategoriesModel();
        $ok = $categoryModel->update($id, $data);
        return $ok;
    }
 
    // delete user
    public function delete($id = null){
        $categoryModel = new CategoriesModel();
        $data['category'] = $categoryModel->where('idcategory', $id)->delete($id);
        return CategoriesDAO::getInstance()->response->redirect(site_url('/category-list'));
    }

    public function getAllCategories($id = null) {
        $categories = new CategoriesModel();
        if(!$id) {
            $data = $categories->orderBy('idcategory', 'DESC')->findAll();
        } else {
            $data = $categories->orderBy('idcategory', 'DESC')->find($id);
        }
        return (empty($data)) ? [] : $data;
    }

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}