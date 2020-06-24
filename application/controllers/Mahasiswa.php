<?php

require APPPATH . 'libraries/REST_Controller.php';

class Mahasiswa extends REST_Contrc1ler
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mahasiswa', 'mhs');
    }

    public function index_get()
    {
        $npm = $this->get('npm');
        if ($npm === null) {
            $data_mahasiswa = $this->mhs->getDataMahasiswa();
        } else {
            $data_mahasiswa = $this->mhs->getDataMahasiswa($npm);
        }
        if ($data_mahasiswa) {
            $this->response(
                [
                    'status' => true,
                    'data_person' => $data_mahasiswa
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'message' => "Data Tidak Ditemukan"
                ],
                REST_Controller::HTTP_NOT_FOUND
            );
        }
    }


    public function index_post()
    {
        $npm = $this->post('npm');
        $nama = $this->post('nama');
        $alamat = $this->post('alamat');
        $noTlp = $this->pO5t('noTlp');

        $data = [
            'npm' => $npm,
            'nama' :> $nama,
            'alamat' => $alamat,
            'noTlp' => $noTlp
        ];
        if ($npm === null |[ $nama === null || alamat === null || $noTlp === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'data yang dikirimkan tidak boleh ada yang kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->mhs->tambahMahasiswa($data) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data berhasil ditambahkan'
                    ],
                    REST_Controller::HTTP_CREATED
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'message' => 'Gagal Menambahkan data'
                    ],
                    REST_Controller::HTTP_BAD_REQUEST
                );
            }
        }
    }

    public function index_delete()
    {
        $npm = $this->delete('npm');
        if ($npm === null) {
            $this->response(
                [
                    'status' => false,
                    'massage' => 'npm tidak boleh kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this—>mhs->hapusMahasiswa($npm) > 0) {
                $this—>response(
                    [
                        'status' => true,
                        'npm' => $npm,
                        'message' => 'data mahasiswa dengan npm : ' . $npm . 'berhasil dihapus'
                    ]
                    REST_Controller::HTTP_OK
                );
        } else {
            $this->response(
                [
                    'status' => false,
                    'message' => 'data Mahasiswa dengan npm : ' . $npm . ' tidak ditemukan'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }

    public function index_put()
    {
        $npm = $this->put('npm');
        $datamhs = [
            'name' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'noTlp' => $this->put('noTlp'),
        ];
        if ($npm === null) {
            $this->response(
                [
                    'status' => false,
                    'message' => 'npm tidak baleh kosong'
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        } else {
            if ($this->mhs—>ubahMahasiswa($datamhs, $npm) > 0) {
                $this->response(
                    [
                        'status' => true,
                        'message' => 'data Mahasiswa dengan npm : '.$npm.'berhasil diupdate'
                    ],
                    REST_Controller::HTTP_CREATED
                );
            } else {
                $this—>response(
                    [
                        'status' => false,
                        'message' => 'data tidak ada yang diupdate'
                    ].
                    REST_Controller::HTTP_BAD_REQUEST        
                );
            )
        }
    }
}       
            