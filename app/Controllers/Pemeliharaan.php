<?php
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	use App\Models\PemeliharaanModel;
	use App\Models\BarangModel;
	use App\Models\PegawaiModel;

	class Pemeliharaan extends BaseController
	{
		public function __construct()
		{
		    $this->modelPemeliharaan = new PemeliharaanModel();
		    $this->barangModel = new BarangModel();
		    $this->modelPegawai = new PegawaiModel();
		}

		public function index(){
			$data_pemeliharaan =  $this->modelPemeliharaan->AllData();
			$data_barang =  $this->barangModel->AllData();
			$data_pegawai = $this->modelPegawai->AllData();
			 $data = [
			     'tittle' => 'Pemeliharaan Barang',
			     'pemeliharaan' => $data_pemeliharaan,
			     'barang' => $data_barang,
			     'pegawai' => $data_pegawai,
			 ];
			 echo view('pemeliharaan/view_pemeliharaan', $data);
		}

		public function Insert()
		{
		    if ($this->validate([
		        'tanggal_pemeliharaan' => [
		            'label' => 'Tanggal Pemeliharaan',
		            'rules' => 'required',
		            'errors' => [
		                'required' => '{field} Tidak Boleh Kosong',
		            ],
		        ],
		        'jenis_pemeliharaan' => [
		            'label' => 'Jenis Pemeliharaan',
		            'rules' => 'required',
		            'errors' => [
		                'required' => '{field} Tidak Boleh Kosong',
		            ],
		        ],
		    ])) {
		        $data = [
		        	'kode_barang' => $this->request->getPost('kode_barang'),
		        	'idPegawai' => $this->request->getPost('idPegawai'),
		            'tanggal_pemeliharaan' => $this->request->getPost('tanggal_pemeliharaan'),
		            'jenis_pemeliharaan' => $this->request->getPost('jenis_pemeliharaan'),
		        ];
		        session()->setFlashdata('insert', 'Data berhasil ditambahkan !!');
		        $this->modelPemeliharaan->InsertData($data);
		        return redirect()->to('pemeliharaan');
		    } else {
		        session()->setFlashdata('error', \Config\Services::validation()->listErrors());
		        return redirect()->to('pemeliharaan');
		    }
		}

		public function DeleteData($idPemeliharaan)
		{
		    $data = [
		    	'idPemeliharaan' => $idPemeliharaan,
		    ];
		    $this->modelPemeliharaan->DeleteData($data);
		    session()->setFlashdata('delete', 'Data berhasil dihapus !!');
		    return $this->response->redirect(base_url('pemeliharaan'));
		}

		public function UpdateData($idPemeliharaan)
		{
		    $data = [
		    	'idPemeliharaan' => $idPemeliharaan,
	            'kode_barang' => $this->request->getPost('kode_barang'),
	            'tanggal_pemeliharaan' => $this->request->getPost('tanggal_pemeliharaan'),
	            'jenis_pemeliharaan' => $this->request->getPost('jenis_pemeliharaan'),
	            'biaya' => $this->request->getPost('biaya'),
	            'keterangan' => $this->request->getPost('keterangan')
        	];
	        session()->setFlashdata('update', 'Diubah !!');
	        $this->modelPemeliharaan->UpdateData($data);
	        return redirect()->to('pemeliharaan');
		}
	}
?>