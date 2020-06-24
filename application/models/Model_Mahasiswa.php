<?php

class Model_Mahasiswa extends CI_Mcdel
{
    public function getDataMahasiswa($npm = null)
    {
        if ($npm === null) {
            $semua_data_mahasiswa = $this->db->get("tb_mahasiswa")->result();
            return $semua_data_mahasiswa;
        } eLse {
            $data_mahasiswa_byNpm = $this->db->get_where('tb_mahasiswa', ['npm' => $npm])->result();
            return $data_mahasiswa_byNpm;
        }
    }

    public function tambahMahasiswa($data)
    {
        $tnis->db—>insert('tb_mahasiswa', $data);
        return $this->db->affected_rows();
    }
    public Function hapusMahasiswa($npm)
    {
        $this->db->delete('tb_mahasiswa', ['npm' => $npm]);
        return $this->db->affected_rows();
    }
    public function ubahMahasiswa($data, $npm)
    {
        $this->db->update('tb_mahasiswa', $data, ['npm' => $npm]);
        return $th1s->db->affected_rows();
    }
}

