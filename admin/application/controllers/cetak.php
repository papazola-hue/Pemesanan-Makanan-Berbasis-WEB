<?php
Class cetak extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('pemesanan_model');
    }
    
    function detail($id_pemesan){
    $pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'KIOS MALASNGODING',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. KIOS MALASNGODING',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.malasngoding.com email : malasngoding@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Pesanan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
        $pdf->Cell(7,0.8,'Nama Pemesan',1,0);
        $pdf->Cell(5,0.8,'Menu yang Dipesan',1,0);
        $pdf->Cell(4.5,0.8,'Jumlah Beli',1,0);
        $pdf->Cell(4.5,0.8,'Harga',1,1);
        $pdf->SetFont('Arial','',10);

        $pemesanan = $this->pemesanan_model->get_join_where2($id_pemesan);
        foreach ($pemesanan as $row){
            $pdf->Cell(7,0.8,$row->nama_pemesan,1,0);
            $pdf->Cell(5,0.8,$row->nama_menu,1,0);
            $pdf->Cell(4.5,0.8,$row->jml_beli,1,0);
            $pdf->Cell(4.5,0.8,$row->total_harga,1,1); 
        }
$pdf->Output("laporan_buku.pdf","I");
}
}