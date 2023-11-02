<?php

namespace App\Http\Controllers\bo\Bantuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    function __construct()
    {
        $this->data['title'] = 'Bantuan';
        $this->data['dropdown1'] = null;
        $this->data['dropdown2'] = null;
        $this->data['view'] = 'bo.page.pegawai.user';
    }

    public function index()
    {
        $data = $this->data;
        return view('bo.page.bantuan.index', $data);
    }
    public function kepegawaian()
    {
        $data = $this->data;
        return view('bo.page.bantuan.kepegawaian', $data);
    }
    public function sistem_informasi()
    {
        $data = $this->data;
        return view('bo.page.bantuan.sistem_informasi', $data);
    }
    public function esurat()
    {
        $data = $this->data;
        return view('bo.page.bantuan.esurat', $data);
    }
}
