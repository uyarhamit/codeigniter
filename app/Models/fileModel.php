<?php

namespace App\Models;

use CodeIgniter\Model;

class fileModel extends Model
{

    protected $table = "files";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name', 'type', 'size'];
    protected $returnType       = 'array';
}
