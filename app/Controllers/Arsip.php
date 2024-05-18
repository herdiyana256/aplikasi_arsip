<?php namespace App\Controllers;

class Arsip extends BaseController
{
    public function index()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $data['title'] = 'Arsip';

        $data['arsip'] = $this->db->table('arsip')->get();

        return view('arsip/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Arsip';
        return view('arsip/create',$data);
    }

    public function store()
    {
        $file = $this->request->getFile('file');
        $filename = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads', $filename);


        $arr = array(
            'no_surat' => $this->request->getPost('no_surat'),
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'kategori' => $this->request->getPost('kategori'),
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => session()->email,
            'file' => $file->getName()
        );

        $this->db->table('arsip')->insert($arr);
        
        session()->setFlashdata('success', 'Berhasil Simpan Arsip');
        return redirect()->to(base_url('arsip'));
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Arsip';
        $data['arsip'] = $this->db->table('arsip')->get()->getRow();

        return view('arsip/edit',$data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $arsip = $this->db->table('arsip')->get()->getRow();
        $file_update = $arsip->file;

        $file = $this->request->getFile('file');
        if ($file->isValid()) {
            $filename = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $filename);

            $path = "uploads/{$arsip->file}";
            
            if (file_exists($path)) {
                unlink($path);
            }

            
            $file_update = $file->getName();
        }

        $arr = array(
            'no_surat' => $this->request->getPost('no_surat'),
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'kategori' => $this->request->getPost('kategori'),
            'file' => $file_update
        );

        $this->db->table('arsip')->where('id',$id)->update($arr);
        
        session()->setFlashdata('success', 'Berhasil Update Arsip');
        return redirect()->to(base_url('arsip'));
    }

    public function delete($id)
    {
        $arsip = $this->db->table('arsip')->get()->getRow();

        $path = "uploads/{$arsip->file}";
        
        if (file_exists($path)) {
            unlink($path);
        }

        $del = $this->db->table('arsip')->where('id',$id)->delete();

        if ($del) {
            session()->setFlashdata('success', 'Berhasil Delete Arsip');
            return redirect()->to(base_url('arsip'));
        }
    }

    private function isLoggedIn() : bool
    {
        if (session()->get('logged_in')) {
            return true;
        }

        return false;
    }

}