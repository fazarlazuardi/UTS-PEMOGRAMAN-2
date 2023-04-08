<?php
    namespace App\Controllers;
    use App\Models\Modelpegawai;

    class pegawai extends BaseController
    {
        public function index()
        {
            $pegawais = new Modelpegawai();
            $pager = \Config\Services::pager();

            $data = array (
                'pegawais' => $pegawais->paginate(10, 'pegawai'),
                'pager' => $pegawais->pager
            );

            return view('pegawai', $data);
        }

        public function update($id)
        {
            $model = new Modelpegawai();   
            $data['pegawai'] = $model->getpegawaiById($id)->getRow();
            echo view('pegawaiedit', $data);
        }

        public function edit()
        {
            $model = new Modelpegawai();
            $id = $this->request->getPost('id');
            $data = array (
                'NAMAPEGAWAI'  => $this->request->getPost('NAMAPEGAWAI'),
                'NIP' => $this->request->getPost('NIP'),
                'JABATAN' => $this->request->getPost('JABATAN'),
                'ALAMAT' => $this->request->getPost('ALAMAT'),
            );
            $model->updatepegawai($data, $id);
            return redirect()->to('/pegawai');

        }

        public function delete($id)
        {
            $model = new Modelpegawai();
            $model->deletepegawai($id);
            return redirect()->to('/pegawai');
        }

        public function input()
        {
            echo view('pegawaiinput');
        }

        public function insert()
        {
            $model = new Modelpegawai();
            //$id = $this->request->getPost('id');
            $data = array (
                'NAMAPEGAWAI'  => $this->request->getPost('NAMAPEGAWAI'),
                'NIP' => $this->request->getPost('NIP'),
                'JABATAN' => $this->request->getPost('JABATAN'),
                'ALAMAT' => $this->request->getPost('ALAMAT'),
            );
            $model->insertpegawai($data);
            return redirect()->to('/pegawai');   
        }

    }
    

?>