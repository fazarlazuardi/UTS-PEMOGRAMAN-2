<?php
    namespace App\Controllers;
    use App\Models\Modelmahasiswa;

    class mahasiswa extends BaseController
    {
        public function index()
        {
            $mahasiswas = new Modelmahasiswa();
            $pager = \Config\Services::pager();

            $data = array (
                'mahasiswas' => $mahasiswas->paginate(10, 'mahasiswa'),
                'pager' => $mahasiswas->pager
            );

            return view('mahasiswa', $data);
        }

        public function update($id)
        {
            $model = new Modelmahasiswa();   
            $data['mahasiswa'] = $model->getmahasiswaById($id)->getRow();
            echo view('mahasiswaedit', $data);
        }

        public function edit()
        {
            $model = new Modelmahasiswa();
            $id = $this->request->getPost('id');
            $data = array (
                'NAMA_MAHASISWA'  => $this->request->getPost('NAMA_MAHASISWA'),
                'NIM' => $this->request->getPost('NIM'),
                'PRODI' => $this->request->getPost('PRODI'),
                'ALAMAT' => $this->request->getPost('ALAMAT'),
            );
            $model->updatemahasiswa($data, $id);
            return redirect()->to('/mahasiswa');

        }

        public function delete($id)
        {
            $model = new Modelmahasiswa();
            $model->deletemahasiswa($id);
            return redirect()->to('/mahasiswa');
        }

        public function input()
        {
            echo view('mahasiswainput');
        }

        public function insert()
        {
            $model = new Modelmahasiswa();
            //$id = $this->request->getPost('id');
            $data = array (
                'NAMA_MAHASISWA'  => $this->request->getPost('NAMA_MAHASISWA'),
                'NIM' => $this->request->getPost('NIM'),
                'PRODI' => $this->request->getPost('PRODI'),
                'ALAMAT' => $this->request->getPost('ALAMAT'),
            );
            $model->insertmahasiswa($data);
            return redirect()->to('/mahasiswa');   
        }

    }
    

?>