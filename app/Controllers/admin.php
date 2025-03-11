<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
    protected $ModelAdmin;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin;
    }

    public function index()
    {
        $data = [
            'menu' => 'Esemka Library | Admin',
            'submenu' => '',
            'title' => 'Esemka Library | Admin',
            'page' => 'v_admin',
            'totalmember' => $this->ModelAdmin->TotalMember(),
        ];
        return view('v_template_admin', $data);
    }
}
