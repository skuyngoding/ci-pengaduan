<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'model');
    }

    public function index()
    {
        is_user();
        $data = [
            'judul' => 'Data Pengaduan',
            'user' => $this->user
        ];

        $this->templating->load('menu/index', $data);
    }

    public function read_data()
    {
        // jika ada request ajax yang dikirimkan
        if ($this->input->is_ajax_request() == true) {
            // ambil data dari table
            $list = $this->model->get_datatables();
            $data = [];
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = [];

                // tombol action
                $btnAction = "<button type=\"button\" data-toggle=\"modal\" data-target=\"#detail-pengaduan\" class='btn btn-sm btn-info btn-hapus' data-id=\"$field->id\" data-tgl=\"" . date('d F Y', strtotime($field->tgl_pengaduan)) . "\" data-instansi=\"$field->nama_instansi\" data-judul=\"$field->judul_pengaduan\" data-isi=\"$field->isi_pengaduan\" data-status=\"$field->status_pengaduan\"><i class=\"fas fa-fw fa-edit\"></i> Detail</button>
                <button type=\"button\" data-toggle=\"modal\" data-target=\"#hapus-pengaduan\" class='btn btn-sm btn-danger btn-hapus' data-id=\"$field->id\"><i class=\"fas fa-fw fa-trash-alt\"></i> Hapus</button>";

                $status = $field->status_pengaduan;

                $row[] = $no;
                $row[] = date('d M Y', strtotime($field->tgl_pengaduan));
                $row[] = $field->nama_instansi;
                $row[] = ($status == 0 ? '<span class="badge-warning p-1 rounded-sm">antrian</span>' : ($status == 1 ? '<span class="badge-blue p-1 rounded-sm">proses</span>' : ($status == 2 ? '<span class="badge-success p-1 rounded-sm">selesai</span>' : '<span class="badge-danger p-1 rounded-sm">batal</span>')));
                $row[] = $btnAction;
                $data[] = $row;
            }

            $output = [
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->model->count_all(),
                "recordsFiltered" => $this->model->count_filtered(),
                "data" => $data,
            ];
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }

    public function ubah_status()
    {
        $this->model->ubahStatusPengaduan();
    }

    public function hapus_data()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('pengaduan');
        $this->session->set_flashdata('msg', 'dihapus.');
        redirect('data-pengaduan');
    }

    public function laporan()
    {
        is_user();
        $data = [
            'judul' => 'Cetak Laporan',
            'user' => $this->user,
            'instansi' => $this->model->getNamaInstansi()
        ];

        $this->templating->load('report/index', $data);
    }

    public function cetak_laporan()
    {
        // cek, fitur ini hanya bisa diakses oleh admin
        is_user();

        // jika user melalui button pengecekan
        if (isset($_POST['btn-cek'])) {
            // tangkap data
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $filter = $this->input->post('filter');

            // prepare data for view
            $data = [
                'judul' => 'Cetak Laporan',
                'user' => $this->user,
                'instansi' => $this->model->getNamaInstansi(),
                'data' => $this->model->getPengaduanByDate($mulai, $selesai, $filter)
            ];

            // load view
            $this->templating->load('report/index', $data);
            // jika melalui button export pdf
        } else if (isset($_POST['cetak-pdf'])) {
            $mulai = $this->input->post('tgl_mulai');
            $selesai = $this->input->post('tgl_selesai');
            $filter = $this->input->post('filter');

            // load library DOMPDF
            $this->load->library('dompdf_gen');

            // prepare data
            $data = [
                'data' => $this->model->getPengaduanByDate($mulai, $selesai, $filter)
            ];

            $this->load->view('report/laporan_pdf', $data);

            // konfigurasi dompdf
            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Laporan Pengaduan Jaringan.pdf', ['Attachment' => true]); // false atau 0 untuk preview sebelum download

            exit;
            // jika melalui url biasa, kembalikan
        } else {
            redirect('laporan-pengaduan');
        }
    }
}
