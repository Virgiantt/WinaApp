<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ModelMember;

class DashboardMember extends BaseController
{
    protected $ModelMember;

    public function __construct()
    {
        helper('form');
        $this->ModelMember = new ModelMember();
    }

    public function index()
    {
        $id_member = session()->get('id_member');
        $data = [
            'menu' => 'Esemka Library | Member',
            'submenu' => '',
            'title' => 'Esemka Library | Profile Member',
            'page' => 'v_dashboard_member',
            'member' => $this->ModelMember->ProfileMember($id_member),
        ];
        return view('member/index', $data);
    }
}
