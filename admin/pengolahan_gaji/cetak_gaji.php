<?php 
include "../../config/koneksi.php";
include "../cetak/fpdf.php";


if (isset($_POST['nip'])) {
    $nip = $_POST['nip'];
} else {
    die ("Error, Tidak ada kode terpilih");
}

// tampilkan data
$query =  "SELECT *FROM `slip_gaji` 
           JOIN`t_gaji_pegawai`USING(`id_gaji`)
           JOIN `t_pegawai` USING(`nip`) 
           JOIN `t_jabatan` USING(`kd_jabatan`)
           JOIN `k_t_bank` USING(`kd_bank`)
           where nip='$nip';";

$sql = mysqli_query($koneksi,$query);
$hasil = mysqli_fetch_array($sql);
$id_slip = $hasil['id_slip'];
$work_days = $hasil['work_days'];
$net_pay_days = $hasil['net_pay_days'];
$pay_mode = $hasil['pay_mode'];
$nama = $hasil ['nama'];
$nama_jabatan = $hasil['nama_jabatan'];
$nip = $hasil ['nip'];
$tgl_masuk = date_create($hasil ['tgl_masuk']);
$nama_bank = $hasil ['nama_bank'];
$npwp = $hasil ['npwp'];
$no_rek = $hasil ['no_rek'];
$status = $hasil ['status'];
$gaji_pokok = $hasil['gaji_pokok'];
$jht = $hasil['jht'];
$jpk = $hasil['jpk'];
$jkk = $hasil['jkk'];
$jkm = $hasil['jkm'];
$jp = $hasil['jp'];
$pph_terhutang_seb = $hasil ['pph_terhutang_seb'];
$overtime = $hasil ['overtime'];
$bonus = $hasil['bonus'];
$id_gaji = $hasil['id_gaji'];
$add_pay_jpk = $hasil['add_pay_jpk'];
$add_pay_jht = $hasil['add_pay_jht'];
$add_pay_jp= $hasil['add_pay_jp'];
$total_ear = $hasil['total_ear'];
$total_dedu = $hasil['total_dedu'];
$net_pay = $hasil['net_pay'];
$take_home_pay = $hasil ['take_home_pay'];
$bulan = $hasil ['bulan'];
$tahun = $hasil ['tahun'];

$logo = "../../gambar/dgt.png";
// session_start();
// $nf = $_SESSION['nf'];

$pdf = new FPDF();
$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(52,17,$pdf -> Image($logo,$pdf-> GetX(),$pdf-> GetY(), 50.78),'0','0','L',false);
$pdf->Ln(10);
$pdf->SetFont('Arial','b',9);
$pdf->Ln(11);
$pdf->Cell(52,10,'',0,0,'L');
$pdf->Cell(140,6,'PAY SLIP for',1,0,'L');
$pdf->Ln(0);
$pdf->Cell(52,10,'',0,0,'L');
$pdf->Cell(80,6,$bulan,0,0,'R');
$pdf->Cell(20,6,$tahun,0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Ln(6);
$pdf->Cell(192,36,'',1,0,'L');
$pdf->Ln(0);
$pdf->Cell(2,10,'',0,0,'L');
$pdf->Cell(40,6,'Working Days',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$work_days,0,0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(40,6,'Net Payable Days',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$net_pay_days,0,0,'L');
$pdf->Ln(6);
$pdf->Cell(2,10,'',0,0,'L');
$pdf->Cell(40,6,'Employee Name',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$nama,0,0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(40,6,'Designation',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$nama_jabatan,0,0,'L');
$pdf->Ln(6);
$pdf->Cell(2,10,'',0,0,'L');
$pdf->Cell(40,6,'Employee No',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$nip,0,0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(40,6,'Pay Mode',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$pay_mode,0,0,'L');
$pdf->Ln(6);
$pdf->Cell(2,10,'',0,0,'L');
$pdf->Cell(40,6,'Joining Date',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,date_format($tgl_masuk,'d/m/Y'),0,0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(40,6,'Bank Name',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$nama_bank,0,0,'L');
$pdf->Ln(6);
$pdf->Cell(2,10,'',0,0,'L');
$pdf->Cell(40,6,'NPWP',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$npwp,0,0,'L');
$pdf->Cell(40,6,'',0,0,'L');
$pdf->Cell(40,6,'Account No',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$no_rek,0,0,'L');
$pdf->Ln(6);
$pdf->Cell(2,10,'',0,0,'L');
$pdf->Cell(40,6,'Status',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(20,6,$status,0,0,'L');
$pdf->Ln(10);
$pdf->Cell(63,6,' BASIC SALARY',1,0,'L');
$pdf->Cell(30,6,number_format($gaji_pokok,"0",",","."),1,0,'R');
$pdf->Cell(62,6,' TAX PPH 21',1,0,'L');
$pdf->Cell(37,6,number_format($pph_terhutang_seb,"0",",","."),1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(0);
$pdf->Cell(163,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,' PENSION ALLOWANCE (JHT)*',1,0,'L');
$pdf->Cell(30,6,number_format($jht,"0",",","."),1,0,'R');
$pdf->Cell(62,6,' ADDITIONAL PAYMENT FOR JPK',1,0,'L');
$pdf->Cell(37,6,number_format($add_pay_jpk,"0",",","."),1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(0);
$pdf->Cell(163,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,' MEDICAL ALLOWANCE (JPK)*',1,0,'L');
$pdf->Cell(30,6,number_format($jpk,"0",",","."),1,0,'R');
$pdf->Cell(62,6,' ADDITIONAL PAYMENT FOR JHT',1,0,'L');
$pdf->Cell(37,6,number_format($add_pay_jht,"0",",","."),1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(0);
$pdf->Cell(163,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,' WORK SAFETY ALLOWANCE (JKK)*',1,0,'L');
$pdf->Cell(30,6,number_format($jkk,"0",",","."),1,0,'R');
$pdf->Cell(62,6,' ADDITIONAL PAYMENT FOR JP',1,0,'L');
$pdf->Cell(37,6,number_format($add_pay_jp,"0",",","."),1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(0);
$pdf->Cell(163,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,' DEATH ALLOWANCE (JKM)*',1,0,'L');
$pdf->Cell(30,6,number_format($jkm,"0",",","."),1,0,'R');
$pdf->Cell(62,6,'',1,0,'L');
$pdf->Cell(37,6,'',1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,' PENSION ALLOWANCE (JP)*',1,0,'L');
$pdf->Cell(30,6,number_format($jp,"0",",","."),1,0,'R');
$pdf->Cell(62,6,'',1,0,'L');
$pdf->Cell(37,6,'',1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,' OVERTIME',1,0,'L');
$pdf->Cell(30,6,number_format($overtime,"0",",","."),1,0,'R');
$pdf->Cell(62,6,'',1,0,'L');
$pdf->Cell(37,6,'',1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,' BONUS',1,0,'L');
$pdf->Cell(30,6,number_format($bonus,"0",",","."),1,0,'R');
$pdf->Cell(62,6,'',1,0,'L');
$pdf->Cell(37,6,'',1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->Cell(63,6,'',1,0,'L');
$pdf->Cell(30,6,'',1,0,'R');
$pdf->Cell(62,6,'',1,0,'L');
$pdf->Cell(37,6,'',1,0,'R');
$pdf->Ln(6);
$pdf->SetFont('Arial','b',9);
$pdf->Cell(63,6,' Total Earning',1,0,'L');
$pdf->Cell(30,6,number_format($total_ear,"0",",","."),1,0,'R');
$pdf->Cell(62,6,' Total Deduction',1,0,'L');
$pdf->Cell(37,6,number_format($total_dedu,"0",",","."),1,0,'R');
$pdf->Ln(0);
$pdf->Cell(71,6,'Rp.',0,0,'R');
$pdf->Ln(0);
$pdf->Cell(163,6,'Rp.',0,0,'R');
$pdf->Ln(12);
$pdf->SetFont('Arial','b',9);
$pdf->Cell(37,6,' Net Pay',1,0,'L');
$pdf->Cell(26,6,number_format($total_ear,"0",",","."),1,0,'R');
$pdf->Ln(0);
$pdf->Cell(44,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->SetFont('Arial','b',9);
$pdf->Cell(37,6,' Take Home Pay',1,0,'L');
$pdf->Cell(26,6,number_format($take_home_pay,"0",",","."),1,0,'R');
$pdf->Ln(0);
$pdf->Cell(44,6,'Rp.',0,0,'R');
$pdf->Ln(6);
$pdf->SetFont('Arial','i',8);
$allow = "*Allowance has been paid by Company before it's tranferred to Staff";
$pdf->Cell(150,6,$allow,0,0,'L');
$pdf->SetFont('Arial','b',9);
$pdf->Cell(37,6,'Chief Financial Officer',0,0,'L');
$pdf->Output();

 ?>