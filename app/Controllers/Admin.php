<?php

namespace App\Controllers;
use App\Models\BarangModel;

class Admin extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel    = new BarangModel();
    }

    public function index()
    {   

        if (!session()->has('username')) {
            return redirect()->to('/login');
        }
        
        $data = [
            'username' => session()->get('username'),
            'tittle' => 'Dashboard',
            
        ];
        echo view('/pages/admin/dashboard', $data);
    }
    

}
