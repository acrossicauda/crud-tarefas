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
        $taks = new TasksModel();
        if(!$id) {
            $data = $taks->orderBy('idtasks', 'DESC')->findAll();
        } else {

            // $taks->select('t.*, c.*, r.*');
            // $data2 = $taks->select('*')
            //     ->from('tasks')
            //     ->join('category', 'tasks.idcategory = category.idcategory', 'left')
            //     ->join('responsibles', 'tasks.idresponsible = responsibles.idresponsibles', 'left')
            //     ->where("tasks.idtasks = $id")
            //     ->get()->getResult('array'); 

            $query = "SELECT t.*, c.description as cat_description, r.name 
            FROM tasks t
            LEFT JOIN category c ON t.idcategory = c.idcategory
            LEFT JOIN responsibles r ON t.idresponsible = r.idresponsibles
            WHERE t.idtasks = $id
            ";
            $data = $taks->query($query)->getResult('array');
            
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