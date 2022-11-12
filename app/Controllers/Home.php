<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $record = $this->db->table('uplant')
        ->select("COUNT(id_tanaman) jml_tanaman, jenis")
        ->groupBy('jenis')
        ->get()->getResultArray();
        $data = ['record'=>$record];

        // print_r("<pre>"); print_r($record); die();
        return view('home',$data);
    }
}
