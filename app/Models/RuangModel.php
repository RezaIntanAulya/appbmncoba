<?php

namespace App\Models;

use CodeIgniter\Model;

class RuangModel extends Model
{
	protected $table = 'ruang';

	public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function AllData()
    {
        return $this->db->table('ruang')
        ->get()->getResultArray();
    }
    public function InsertData($data)
    {
        $query = $this->db->table('ruang')->insert($data);
        return $query;
    }
    public function UpdateData($data)
    {
      $query = $this->db->table('ruang')
            ->where('idRuang', $data['idRuang'])
            ->update($data);
        return $query;
    }

     public function joinTable()
    {   
        $builder = $this->db->table('barang');
        $builder->join('ruang', 'barang.id = ruang.idRuang');
        $builder->join('pegawai', 'ruang.idRuang = pegawai.idPegawai');
        return $builder->get()->getResultArray();
    }
}