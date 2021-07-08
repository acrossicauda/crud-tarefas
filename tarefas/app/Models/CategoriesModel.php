<?php 
namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'idcategory';
    
    protected $allowedFields = ['idcategory', 'description'];
}