<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load Admin_model
        $this->load->model('Admin_model', 'model');
        is_logout();
        is_user();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function pengguna()
    {
        // siapkan data
        $data = [
            'judul' => 'Kelola Pengguna',
            'user' => $this->user,
            'pengguna' => $this->model->getPengguna()
        ];

        // load view
        $this->templating->load('admin/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        /*
            Validasi field {
                required => semua field harus diisi
                is_unique => field harus unik (tidak boleh sama)
                min_length => minimal panjang karakter
                matches => harus sama
                email => harus memakai @provider.com
            }
        */
        $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('pass1', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|matches[pass1]');

        // Jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Tambah Pengguna',
                'user' => $this->user
            ];

            $this->templating->load('admin/tambah-pengguna', $data);
            // jika lolos validasi
        } else {
            // tambah data ke database
            $this->model->tambah_pengguna();
        }
    }

    public function hapus_pengguna()
    {
        // tangkap id
        $id = $this->input->post('id');
        // Hapus data dari tabel user, dimana id user sesuai dengan yang dikirimkan
        // Hapus semua pengaduan dari data user yang dihapus
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->db->where('instansi_id', $id);
        $this->db->delete('pengaduan');
        // set session -> berhasil menghapus data
        $this->session->set_flashdata('msg', 'dihapus.');
        // redirect ke halaman pengguna
        redirect('data-pengguna');
    }
}
