<?php 
namespace App\Controllers;

use App\Models\TasksModel;
use CodeIgniter\Controller;

class TaskDAO extends Controller
{

    private static $instance;

    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}

 
    // insert data
    public function store($data) 
    {
        $taskModel = new TasksModel();
        $ok = $taskModel->insert($data);
        return $ok;
    }


    //'idtask', 'description', 'responsible', 'data_end', 'idcategory']
    // update task data
    public function update($id, $data = array()){
        $taskModel = new TasksModel();
        $ok = $taskModel->update($id, $data);
        return $ok;
    }
 
    // delete user
    public function delete($id = null)
    {
        $taskModel = new TasksModel();
        $data['task'] = $taskModel->where('idtask', $id)->delete($id);
        return $this->response->redirect(site_url('/task-list'));
    }

    public function getAllTasks($id = null) {
        $categories = new TasksModel();
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