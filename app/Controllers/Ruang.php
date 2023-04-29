<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RuangModel;

class Ruang extends BaseController
{
	public function __construct()
    {
        $this->ruangModel = new RuangModel();
    }

	public function index()
    {
       $data_ruang =  $this->ruangModel->AllData();
        $data = [
            'tittle' => 'Ruang',
            'ruang' => $data_ruang,
        ];
        echo view('ruang/view_ruang', $data);
    }

    public function Insert()
		{
		    if ($this->validate([
		        'nama_ruang' => [
		            'label' => 'Nama Ruangan',
		            'rules' => 'required',
		            'errors' => [
		                'required' => '{field} Tidak Boleh Kosong',
		            ],
		        ],
		    ])) {
		        $data = [
		        	'nama_ruang' => $this->request->getPost('nama_ruang'),
		        ];
		        session()->setFlashdata('insert', 'Data berhasil ditambahkan !!');
		        $this->ruangModel->InsertData($data);
		        return redirect()->to('ruang');
		    } else {
		        session()->setFlashdata('error', \Config\Services::validation()->listErrors());
		        return redirect()->to('ruang');
		    }
		}

		public function UpdateData($idRuang)
		{
		    $data = [
		    	'idRuang' => $idRuang,
	            'nama_ruang' => $this->request->getPost('nama_ruang'),
        	];
	        session()->setFlashdata('update', 'Diubah !!');
	        $this->ruangModel->UpdateData($data);
	        return redirect()->to('ruang');
		}
}

?>