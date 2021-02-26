<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penerimaan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        // // panggil fungsi cek not login
        check_not_login();

        //load data di modal barang, supplier dan Penerimaan
        $this->load->model(['Barang_Model', 'Supplier_Model', 'Penerimaan_Model']);
    }

    public function cetak_penerimaan()
    {
        // mengambil data di method get_stock _in dan lakukan result untuk mencetak semua data nya
        $data['row'] = $this->Penerimaan_Model->ambil_penerimaan_brg()->result();


        $this->template->load('template', 'laporan/laporan_penerimaan/form_penerimaan', $data);
    }

    public function cetak_periode()
    {
        $content = '
        <style type="text/css">
            img {
                float: left;
                margin-bottom: 20px;
            }
            p {
                font-size: 14px;
                padding-left: 20px;
                text-align: center;
            }
            .tabel { 
                border-collapse: collapse;
                padding: 20px;
            }
            .tabel th 
            { 
                background-color: grey; color: #fff; 
                padding: 6px;
            }

            .tabel td
            {
                padding: 8px;
            }
        </style>';

        $content .= '
        <page>
            <div style="padding: 4mm;"> 
                <br>
                <img src="assets/img/smk.png" style="width: 120px;">
                    <h1 style="text-align: center;">
                        SMK MUHAMMADIYAH 3 YOGYAKARTA
                    </h1>
                    <p>
                        Alamat: Jl. Pramuka No.62, Giwangan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55163 <br>
                        Call: (0274) 372778 | Email: info@smkmuh3-yog.sch.id
                    </p> <hr>
            </div>

            <h3 style="text-align: center;">
                Laporan Data Penerimaan Barang
            </h3>
            
            <table border="1px" class="tabel" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th align="center">Tanggal</th>
                    <th>Kode Barang</th>
                    <th align="center">Nama Barang</th>
                    <th class="text-center">Jumlah Barang</th>
                    <th>Nama Supplier</th>
                </tr>';
        $no = 1;

        $data = $this->Penerimaan_Model->cetak_tanggal(@$_POST['tgl_awal'], @$_POST['tgl_akhir'])->result();

        foreach ($data as $key => $laporan) {
            $content .= '
            <tr>
                <td align="center">' . $no++ . '</td>
                <td align="center">' . date('d F Y', strtotime($laporan->tanggal)) . '</td>
                <td align="center">' . $laporan->kode_barang . '</td>
                <td>' . $laporan->barang . '</td>
                <td align="center">' . $laporan->jumlah . '' .  '</td>
                <td>' . $laporan->supplier . '</td>
            </tr> 
            ';
        }

        $content .= '
            </table>
        </page>';

        require 'assets/vendor/autoload.php';
        ob_start();
        $html2pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $html2pdf->writeHTML($content);
        $html2pdf->output('barang_masuk.pdf');
    }
}
