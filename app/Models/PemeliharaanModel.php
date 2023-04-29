<?php
 namespace App\Models;

 use CodeIgniter\Model;

 class PemeliharaanModel extends Model 
 {
 	protected $table = 'pemeliharaan';

 	public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function AllData()
    {
        $builder = $this->db->table('pemeliharaan');
        $builder->select('*');
        $builder->join('barang', 'barang.kode_barang = pemeliharaan.kode_barang');
        $builder->join('pegawai', 'pegawai.idPegawai = pemeliharaan.idPegawai');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function InsertData($data)
    {
        $query = $this->db->table('pemeliharaan')->insert($data);
        return $query;
    }
    
    public function DeleteData($data)
    {
        $this->db->table('pemeliharaan')
            ->where('idPemeliharaan', $data['idPemeliharaan'])
            ->delete($data);
    }

    public function UpdateData($data)
    {
      $query = $this->db->table('pemeliharaan')
            ->where('idPemeliharaan', $data['idPemeliharaan'])
            ->update($data);
        return $query;
    }
 }

?>