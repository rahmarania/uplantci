<?php  
	namespace App\Models;

	use CodeIgniter\Model;

	class Chartmdl extends Model{
		public function getPerkat($jenis){
			return $this->db->table('uplant')
			->select("COUNT(id_tanaman) jml_tanaman")
			->where('jenis',$jenis)
			->groupBy($jenis)
			->get()->getResultArray();
		}
	}


?>