<?php namespace App\Models;

use CodeIgniter\Model;

class Modelpegawai extends Model
{
    //table name
    protected $table = "pegawai";

    //allowed fields
    protected $allowedFields = 
    [
        'NAMAPEGAWAI',
        'NIP',
        'JAWABAN',
        'ALAMAT'
    ];

    public function getpegawai()
    {
        return $this->findAll();
    }


    public function getpegawaiById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id' => $id]);
        }   
    }
	
	public function updatepegawai($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
	
	public function deletepegawai($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function insertpegawai($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>