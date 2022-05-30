<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table            = "users";
    protected $primaryKey       = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name', 'surname', 'email', 'password'];
    protected $returnType       = 'array';
}
