<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class Chart extends Controller
{
    public function index() {
        return view('home');
    }
    
    public function initChart() {
        
        $db = \Config\Database::connect();
        $builder = $db->table('product');
        $query = $builder->select("SELECT *, COUNT(id) AS jml_tanaman FROM tanaman GROUP BY(jenis) ORDER BY id DESC";);
        $record = $query->getResult();
        $kattan = [];
        foreach($record as $row) {
            $products[] = array(
                'Kategori'   => $row->jenis,
                'jml' => floatval($row->s)
            );
        }
        
        $data['kattan'] = ($products);    
        return view('home', $data);                
    }
 
}