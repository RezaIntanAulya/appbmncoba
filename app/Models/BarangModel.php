<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function AllData()
    {
        $builder = $this->db->table('barang');
        $builder->select('*');
        $builder->join('ruang', 'ruang.idRuang = barang.idRuang', 'left');
        $builder->join('pegawai', 'pegawai.idPegawai = barang.idPegawai', 'left');
        $query = $builder->get()->getResultArray();
        return $query;

    }
     public function InsertData($data)
    {
        $query = $this->db->table('barang')->insert($data);
        return $query;
    }
    public function UpdateData($data)
    {
      $query = $this->db->table('barang')
            ->where('id', $data['id'])
            ->update($data);
        return $query;
    }
    public function DeleteData($data)
    {
        $query = $this->db->table('barang')
            ->where('id', $data['id'])
            ->delete($data);
        return $query;
    }
}
