<?php 
namespace App\Models;
use CodeIgniter\Model;

class ResponsiblesModel extends Model
{
    protected $table = 'responsibles';

    protected $primaryKey = 'idresponsibles';
    
    protected $allowedFields = ['idresponsibles', 'name'];
}