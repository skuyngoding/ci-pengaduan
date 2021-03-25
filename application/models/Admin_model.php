<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getPengguna()
    {
        // menggunankan where !=1 -> untuk menampilkan user instansi saja (tidak termasuk admin)
        return $this->db->get_where('user', 'user.role_id !=1')->result_array();
    }

    public function tambah_pengguna()
    {
        // tangkap data dan encrypt password
        $password = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
        $data = [
            'nama_instansi' => htmlspecialchars($this->input->post('nama_instansi', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => $password,
            'role_id' => 2
        ];

        // insert data ke database
        $this->db->insert('user', $data);
        // set session
        $this->session->set_flashdata('msg', 'ditambahkan.');
        // kembalikan ke halaman pengguna
        redirect('data-pengguna');
    }
}
