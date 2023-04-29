<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\RuangModel;
use App\Models\PegawaiModel;

class Barang extends BaseController
{   
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->ruangModel = new RuangModel();
        $this->modelPegawai = new PegawaiModel();
    }

    public function index()
    {
        $data_barang =  $this->barangModel->AllData();
        $data_ruang =  $this->ruangModel->AllData();
        $data_pegawai =  $this->modelPegawai->AllData();
        $data = [
            'tittle' => 'Barang',
            'barang' => $data_barang,
            'ruang'  => $data_ruang,
            'pegawai' => $data_pegawai,
        ];
        echo view('barang/view_barang', $data);
    }

    public function Insert()
    {   
        if ($this->validate([
            'kode_barang' => [
                'label' => 'Kode Barang',
                'rules' => 'required|is_unique[barang.kode_barang]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Ada',
                ],
            ],
            'nama_barang' => [
                'label' => 'Nama Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'nup' => [
                'label' => 'NUP',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'merk/type' => [
                'label' => 'Merk/Type Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'jumlah' => [
                'label' => 'Jumlah Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'tahun_perolehan' => [
                'label' => 'Tahun Perolehan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
            'kondisi' => [
                'label' => 'Kondisi Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ],
            ],
        ])) {
            $data = [
                'kode_barang' => $this->request->getPost('kode_barang'),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'nup' => $this->request->getPost('nup'),
                'merk/type' => $this->request->getPost('merk/type'),
                'jumlah' => $this->request->getPost('jumlah'),
                'tahun_perolehan' => $this->request->getPost('tahun_perolehan'),
                'idRuang' => $this->request->getPost('idRuang'),
                'idPegawai' => $this->request->getPost('idPegawai'),
                'kondisi' => $this->request->getPost('kondisi'),
            ];
            session()->setFlashdata('insert', 'Ditambahkan !!');
            $this->barangModel->InsertData($data);
            return redirect()->to('barang');
        } else {
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('barang');
        }
    }
    public function UpdateData($id)
    {
        $data = [
            'id' => $id,
            'kode_barang' => $this->request->getPost('kode_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'merk/type' => $this->request->getPost('merk/type'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tahun_perolehan' => $this->request->getPost('tahun_perolehan'),
            'idRuang' => $this->request->getPost('idRuang'),
            'idPegawai' => $this->request->getPost('idPegawai'),
            'kondisi' => $this->request->getPost('kondisi'),
        ];
        session()->setFlashdata('update', 'Diubah !!');
        $this->barangModel->UpdateData($data);
        return redirect()->to('barang');
    }

    public function DeleteData($id = null)
    {
        $data['barang'] = $this->barangModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('Barang'));
        session()->setFlashdata('delete', 'Dihapus !!');
    }
    public function htmlToPDF(){
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('view_barang'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
