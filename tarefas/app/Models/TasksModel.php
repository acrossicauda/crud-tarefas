<?php 
namespace App\Models;
use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'tasks';

    protected $primaryKey = 'idtask';
    
    protected $allowedFields = ['idtask', 'description', 'responsible', 'data_end', 'idcategory'];
}