<?php

namespace App\Controllers;

use App\Models\ModelPengaturan;

class Home extends BaseController
{
    protected $ModelPengaturan;

    public function __construct()
    {
        helper('form');
        $this->ModelPengaturan = new ModelPengaturan();
    }

    public function index()
    {
        $data = [
            'title' => 'Esemka Library | Home',
            'page' => 'v_home',
            'slider' => $this->ModelPengaturan->Slider(),
        ];
        return view('v_template', $data);
    }

    public function Sejarah()
    {
        $data = [
            'title' => 'Esemka Library | Sejarah',
            'page' => 'v_sejarah',
            'profile' => $this->ModelPengaturan->DetailWeb(),
        ];
        return view('v_template', $data);
    }

    public function VisiMisi()
    {
        $data = [
            'title' => 'Esemka Library | Visi & Misi',
            'page' => 'v_visi_misi',
            'profile' => $this->ModelPengaturan->DetailWeb(),
        ];
        return view('v_template', $data);
    }
}
