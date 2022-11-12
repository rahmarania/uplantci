<?php

namespace App\Controllers;
use App\Controllers\Chart;

// panggil pdf func
use Dompdf\Dompdf;

// model
use App\Models\Tanamanmdl;
use App\Models\Chartmdl;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// use CodeIgniter\HTTP\RequestInterface;
// $request = \Config\Services::request();

class Tanaman extends BaseController
{   
    private $_chartmdl;
    public function __construct(){
        $this->tanaman = new Tanamanmdl();
        $this->_chartmdl = new Chartmdl();
    }

    public function index()
    {

        // get db dg builder dari basecontroller
        $builder = $this->db->table('uplant');
        $query   = $builder->get()->getResult();
        $data['uplant'] = $query;

        // panggil file get.php folder tanaman di views
        return view('tanaman/get', $data);

        // $data['uplant'] = $this->tanaman->findAll();
        // return view('tanaman/get');

        // $tnm = new Tanamanmdl();
        // $jml_tanaman = $tnm->countAllResults();

        // return view('home',{
        //     'jml_tanaman'=>$jml_tanaman
        // });


    }

    // func add
    public function create()
    {
        // di views, tambah.php
        return view('tanaman/tambah');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->db->table('uplant')->insert($data);

        if ($this->db->affectedRows() > 0) {
            // return ke form, ada alert
            return redirect()->to(site_url('tanaman'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    // edit func
    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('uplant')->getWhere(['id_tanaman' => $id]);
            // kalau datanya ada
            if ($query->resultID->num_rows > 0) {
                $data['uplant'] = $query->getRow();
                return view('tanaman/edit', $data);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function update($id){
        $data = $this->request->getPost();
        unset($data['_method']);

        $this->db->table('uplant')->where(['id_tanaman'=>$id])->update($data);
        return redirect()->to(site_url('tanaman'))->with('success','Data berhasil disimpan');
    }

    public function destroy($id){
        $this->db->table('uplant')->where(['id_tanaman'=>$id])->delete();
        return redirect()->to(site_url('tanaman'))->with('success','Data berhasil dihapus');
    }

    // export excel
    public function exportexc(){
        $uplant = $this->tanaman->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1','ID');
        $sheet->setCellValue('B1','Nama Tanaman');
        $sheet->setCellValue('C1','Jenis');
        $sheet->setCellValue('D1','Nama Ilmiah');

        $column = 2; //mulai dari kolom 2
        foreach ($uplant as $key => $value) {
            $sheet->setCellValue('A'.$column, ($column-1));
            $sheet->setCellValue('B'.$column, $value->nama_tanaman);
            $sheet->setCellValue('C'.$column, $value->jenis);
            $sheet->setCellValue('D'.$column, $value->nama_ilmiah);
            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename = tanaman.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }

    // import excel
    public function import(){
        $file = $this->request->getFile('impexc');
        $ext = $file->getClientExtension();

        if($ext == 'xlsx' || $ext == 'xls'){
            if ($ext == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        
            $spreadsheet = $reader->load($file);
            $t = $spreadsheet->getActiveSheet()->toArray();
            
            foreach ($t as $key => $value) {
                if($key == 0){
                    continue;
                }
                $data = ['nama_tanaman'=>$value[1],
                      'jenis'=>$value[2],
                      'nama_ilmiah'=>$value[3],
                      'id_tanaman'=>0,
                     ];
                $this->tanaman->insert($data);
            }
                return redirect()->back()->with('success', 'Data berhasil diimport');
        }else{
                return redirect()->back()->with('error', 'Format tidak sesuai!');
            }
    }

    // export pdf
    public function exportpdf(){
        $laporan = $this->tanaman->findAll();

        $data = ['result'=>$laporan];
        $view = view('tanaman/export-pdf',$data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function show_perkat() {
        $jenis = 'Tanaman Hias';
        $data_tnm = $this->_chartmdl->getPerkat($jenis);
        
        $response = ['status'=>true,
                     'data'=>$data_tnm];
        echo json_encode($response);
    }


}
