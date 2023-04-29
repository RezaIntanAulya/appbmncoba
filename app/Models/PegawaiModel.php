<?php
 namespace App\Models;

 use CodeIgniter\Model;

 class PegawaiModel extends Model 
 {
 	protected $table = 'pegawai';

 	public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function AllData()
    {
        return $this->db->table('pegawai')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $query = $this->db->table('pegawai')->insert($data);
        return $query;
    }
    
    public function DeleteData($data)
    {
        $this->db->table('pegawai')
            ->where('idPegawai', $data['idPegawai'])
            ->delete($data);
    }

    public function UpdateData($data)
    {
      $query = $this->db->table('pegawai')
            ->where('idPegawai', $data['idPegawai'])
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

?>