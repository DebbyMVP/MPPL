<?php 
include "../config/koneksi.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
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
$tgl_masuk1 = explode("-", $hasil ['tgl_masuk']);
$tgl_masuk = $tgl_masuk1[2]."-".$tgl_masuk1[1]."-".$tgl_masuk1[0];
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

?>
<!-- header title -->
<div class="card-body">
                    <div>
                       <style type="text/css">
                       th{
                        text-align:center;
                       }
                       </style>
                       
                       <table class="table table-bordered" >
                       <td><img src='../gambar/dgt.png' width="200" height="100" class="img-responsive"></td>
                       
                       <td>PAY SLIP for</td>
                       <td><input type="text" class="form-control" id="contract-name" name="bulan" size="1px"  readonly value="<?php echo "$bulan"; ?>"></td>
                       <td><input type="text" class="form-control" id="contract-name" name="tahun" size="1px"  readonly value="<?php echo "$tahun"; ?>"></td>
                       </table>
                       <table border="0">
                            <tr>
                                <td width="200px"><label for="contact-name" class="control-label"> Working Days</label></td>
                                <td>:</td>
                                <td width="100px" colspan="4"><?php  echo  "&nbsp$work_days"; ?></td>
                                <td width="300px"><label for="contact-name" class="control-label"> Net Payable Days</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"><?php  echo "&nbsp$net_pay_days"; ?></td>
                            </tr>
                            <tr>
                                <td width="200px"><label for="contact-name" class="control-label"> Employee Name</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo  "&nbsp$nama"; ?></td>
                                <td width="300px"><label for="contact-name" class="control-label"> Designation</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$nama_jabatan"; ?></td>
                            </tr>
                            <tr>
                                <td width="200px"><label for="contact-name" class="control-label"> Employee No</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$nip"; ?></td>
                                <td width="300px"><label for="contact-name" class="control-label"> Pay Mode</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$pay_mode"; ?></td>
                            </tr>
                            <tr>
                                <td width="200px"><label for="contact-name" class="control-label"> Joining Date</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$tgl_masuk"; ?></td>
                                <td width="300px"><label for="contact-name" class="control-label"> Bank Name</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$nama_bank"; ?></td>
                            </tr>
                            <tr>
                                <td width="200px"><label for="contact-name" class="control-label"> NPWP</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$npwp"; ?></td>
                                <td width="300px"><label for="contact-name" class="control-label"> Account No</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$no_rek"; ?></td>
                            </tr>
                            <tr>
                                <td width="200px"><label for="contact-name" class="control-label"> Status</label></td>
                                <td>:</td>
                                <td width="300px" colspan="4"> <?php  echo "&nbsp$status"; ?></td>
                            </tr>
                           </table><br>
                           <b>
                           <table border="1" width="100%">

                            <tr>
                                <td width="25%">
                                    BASIC SALARY
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($gaji_pokok,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    TAX PPH 21
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($pph_terhutang_seb,"2",",","."); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    PENSION ALLOWANCE (JHT)*
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($jht,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    ADDITIONAL PAYMENT FOR JPK
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($add_pay_jpk,"2",",","."); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    MEDICAL ALLOWANCE (JPK)*        
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($jpk,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    ADDITIONAL PAYMENT FOR JHT
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($add_pay_jht,"2",",","."); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    WORK SAFETY ALLOWANCE (JKK)*   
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($jkk,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    ADDITIONAL PAYMENT FOR JP
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($add_pay_jp,"2",",","."); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    DEATH ALLOWANCE (JKM)*    
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($jkm,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    
                                </td>
                                <td width="25%">
                                     
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    PENSION ALLOWANCE (JP)*  
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($jp,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    
                                </td>
                                <td width="25%">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    OVERTIME  
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($overtime,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    
                                </td>
                                <td width="25%">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    BONUS   
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($bonus,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    
                                </td>
                                <td width="25%">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"
                                height="20px">
                                   
                                </td>
                                <td width="25%" align="right">
                                   
                                </td>
                                <td width="25%">
                                    
                                </td>
                                <td width="25%">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    Total Earning   
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($total_ear,"2",",","."); ?>
                                </td>
                                <td width="25%">
                                    Total Deduction
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($total_dedu,"2",",","."); ?>
                                </td>
                            </tr>
                            </table>
                            <br>
                            <table border="1" width="50%">
                            <tr>
                                <td width="25%">
                                    Net Pay   
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($net_pay,"2",",","."); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    Take Home Pay   
                                </td>
                                <td width="25%" align="right">
                                    Rp <?php echo number_format($take_home_pay,"2",",","."); ?>
                                </td>
                            </tr>
                            </table>
                            <form method="POST" action="pengolahan_gaji/cetak_gaji.php">  
                            <br>
                            <input type="hidden" value="<?php echo"$nip" ; ?>" name="nip">
                            <input class="btn btn-success" type="submit" value="CETAK SLIP GAJI"></input></form>
                            </b>

