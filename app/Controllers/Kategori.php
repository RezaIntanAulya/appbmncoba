<?php
	namespace App\Controllers;
	
	use App\Controllers\BaseController;
	use App\Models\KategoriModel;

	class Kategori extends BaseController
	{
		public function __construct()
		{
		    $this->modelkategori = new KategoriModel();
		}

		public function index(){
			$data_kategori =  $this->modelkategori->AllData();
			 $data = [
			     'tittle' => 'Kategori',
			     'kategori' => $data_kategori,
			 ];
			 echo view('kategori/view_kategori', $data);
		}

		public function Insert()
		{
		    if ($this->validate([
		        'kode_kategori' => [
		            'label' => 'Kode Kategori',
		            'rules' => 'required|is_unique[kategori.kode_kategori]',
		            'errors' => [
		                'required' => '{field} Tidak Boleh Kosong',
		                'is_unique' => 'Sudah Ada',
		            ],
		        ],
		        'nama_kategori' => [
		            'label' => 'Nama Kategori',
		            'rules' => 'required',
		            'errors' => [
		                'required' => '{field} Tidak Boleh Kosong',
		            ],
		        ],
		    ])) {
		        $data = [
		            'kode_kategori' => $this->request->getPost('kode_kategori'),
		            'nama_kategori' => $this->request->getPost('nama_kategori'),
		        ];
		        session()->setFlashdata('insert', 'Data berhasil ditambahkan !!');
		        $this->modelkategori->InsertData($data);
		        return redirect()->to('kategori');
		    } else {
		        session()->setFlashdata('error', \Config\Services::validation()->listErrors());
		        return redirect()->to('kategori');
		    }
		}

		public function DeleteData($id = null)
		{
		    $data['kategori'] = $this->modelkategori->where('id', $id)->delete($id);
		    return $this->response->redirect(site_url('/kategori'));
		    session()->setFlashdata('delete', 'Data berhasil dihapus !!');
		}

		public function UpdateData($id)
		{
		    $data = [
		    	'id' => $id,
	            'kode_kategori' => $this->request->getPost('kode_kategori'),
	            'nama_kategori' => $this->request->getPost('nama_kategori'),
        	];
	        session()->setFlashdata('update', 'Diubah !!');
	        $this->modelkategori->UpdateData($data);
	        return redirect()->to('kategori');
		}
	}
?>