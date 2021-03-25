<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    // Field yang orderable
    var $column_order = [null, 'tgl_pengaduan',  'nama_instansi', 'status_pengaduan', null];
    // field yang diizinkan utk pencarian data
    var $column_search = ['judul_pengaduan', 'tgl_pengaduan', 'nama_instansi', 'isi_pengaduan'];
    // default order by (tgl pengaduan yang terbaru)
    var $order = ['tgl_pengaduan' => 'desc'];

    // data tables untuk data pengaduan
    private function _get_datatables_query()
    {
        // ambil data dari table pengaduan join dengan tabel user untuk mendapatkan data instansi
        $this->db->select('p.*, u.id as user_id, u.nama_instansi')
            ->from('pengaduan p')
            ->join('user u', 'p.instansi_id = u.id');

        $i = 0;

        // looping awal
        foreach ($this->column_search as $item) {
            // jika datatable mengirimkan value untuk pencarian
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('pengaduan');
        return $this->db->count_all_results();
    }

    public function ubahStatusPengaduan()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status_pengaduan');
        $this->db->set('status_pengaduan', $status);
        $this->db->where('id', $id);
        $this->db->update('pengaduan');

        $this->session->set_flashdata('msg', 'diubah.');
        redirect('data-pengaduan');
    }

    public function getNamaInstansi()
    {
        return $this->db->get_where('user', 'user.role_id != 1')->result_array();
    }

    public function getPengaduanByDate($mulai, $selesai, $filter = false)
    {
        if ($filter == false) {
            return $this->db->select('p.*, u.*')
                ->from('pengaduan p')
                ->join('user u', 'p.instansi_id = u.id')
                ->where('tgl_pengaduan >=', $mulai)
                ->where('tgl_pengaduan <=', $selesai)
                ->get()->result_array();
        } else {
            return $this->db->select('p.*, u.*')
                ->from('pengaduan p')
                ->join('user u', 'p.instansi_id = u.id')
                ->where('tgl_pengaduan >=', $mulai)
                ->where('tgl_pengaduan <=', $selesai)
                ->where('instansi_id', $filter)
                ->get()->result_array();
        }
    }
}
