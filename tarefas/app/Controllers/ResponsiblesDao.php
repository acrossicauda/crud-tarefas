<?php 
namespace App\Controllers;

use App\Models;
use App\Models\ResponsiblesModel;
use CodeIgniter\Controller;

class ResponsibleDao extends Controller
{

    private static $instance;

    public function __construct() {}

    public function __clone() {}

    public function __wakeup() {}

    
    // insert data
    public function store($data = array()) {
        $responsibleModel = new ResponsiblesModel();
        $ok = $responsibleModel->insert($data);
        return $ok;
    }

    // show single responsible
    public function singleUser($id = null){
        $responsibleModel = new ResponsiblesModel();
        $data['user_obj'] = $responsibleModel->where('idresponsible', $id)->first();
        return view('edit_responsible', $data);
    }

    // update responsible data
    public function update($id, $data = array()){
        $responsibleModel = new ResponsiblesModel();
        $ok = $responsibleModel->update($id, $data);
        return $ok;
    }
 
    // delete user
    public function delete($id = null){
        $responsibleModel = new ResponsiblesModel();
        $data['responsible'] = $responsibleModel->where('idresponsible', $id)->delete($id);
        return $this->response->redirect(site_url('/responsible-list'));
    }    

    public function getAllResponsible($id = null) {
        $responsibleModel = new ResponsiblesModel();
        if(!$id) {
            $data = $responsibleModel->orderBy('idresponsibles', 'DESC')->findAll();
        } else {
            //$data = $responsibleModel->orderBy('idresponsibles', 'DESC')->find($id);
            $query = "SELECT *
            FROM responsibles
            WHERE idresponsibles = $id
            ";
            $data = $responsibleModel->query($query)->getResult('array');
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