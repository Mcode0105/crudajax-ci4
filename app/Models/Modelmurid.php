<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmurid extends Model
{
    protected $table      = 'murid';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nisn', 'alamat', 'nohp'];
    protected $useTimestamps = true;
    public function getmurid()
    {
        return $this->findAll();
    }
    public function caridata($keyword)
    {
        return $this->table('murid')->like('nama', $keyword);
    }
}
