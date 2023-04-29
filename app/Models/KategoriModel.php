<?php
 namespace App\Models;

 use CodeIgniter\Model;

 class KategoriModel extends Model 
 {
 	protected $table = 'kategori';

 	public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function AllData()
    {
        return $this->db->table('kategori')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $query = $this->db->table('kategori')->insert($data);
        return $query;
    }
    
    public function DeleteData($data)
    {
        $query = $this->db->table('kategori')
            ->where('id', $data['id'])
            ->delete($data);
        return $query;
    }

    public function UpdateData($data)
    {
      $query = $this->db->table('kategori')
            ->where('id', $data['id'])
            ->update($data);
        return $query;
    }
 }

?>