<?php
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	use App\Models\PegawaiModel;

	class Pegawai extends BaseController
	{
		public function __construct()
		{
		    $this->modelPegawai = new PegawaiModel();
		}

		public function index(){
			$data_pegawai =  $this->modelPegawai->AllData();
			 $data = [
			     'tittle' => 'Pegawai',
			     'pegawai' => $data_pegawai,
			 ];
			 echo view('pegawai/view_pegawai', $data);
		}

		public function Insert()
		{
		    if ($this->validate([
		        'nip' => [
		            'label' => 'Nomor Induk Pegawai',
		            'rules' => 'required|is_unique[pegawai.nip]',
		            'errors' => [
		                'required' => '{field} Tidak Boleh Kosong',
		                'is_unique' => 'Sudah Ada',
		            ],
		        ],
		        'nama_pegawai' => [
		            'label' => 'Nama Pegawai',
		            'rules' => 'required',
		            'errors' => [
		                'required' => '{field} Tidak Boleh Kosong',
		            ],
		        ],
		    ])) {
		        $data = [
		            'nip' => $this->request->getPost('nip'),
		            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
		        ];
		        session()->setFlashdata('insert', 'Ditambahkan !!');
		        $this->modelPegawai->InsertData($data);
		        return redirect()->to('pegawai');
		    } else {
		        session()->setFlashdata('error', \Config\Services::validation()->listErrors());
		        return redirect()->to('pegawai');
		    }
		}

		public function DeleteData($idPegawai)
		{
		    $data = [
		    	'idPegawai' => $idPegawai,
		    ];
		    $this->modelPegawai->DeleteData($data);
		    session()->setFlashdata('delete', 'Data berhasil dihapus !!');
		    return $this->response->redirect(base_url('pegawai'));
		}

		public function UpdateData($idPegawai)
		{
		    $data = [
		    	'idPegawai' => $idPegawai,
	            'nip' => $this->request->getPost('nip'),
	            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
        	];
	        session()->setFlashdata('update', 'Diubah !!');
	        $this->modelPegawai->UpdateData($data);
	        return redirect()->to('pegawai');
		}
	}
?>