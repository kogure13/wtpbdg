<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$data = $_GET['hash_code'];
$serial = base64_decode($data);
$array = unserialize($serial);

?>


<div class="content">
    <div class="main-header">
        <h2>Pembayaran Rekening AIR</h2>
    </div>
    <div class="main-content">
        <div class="invoice">
            <!-- invoice header -->
            <div class="invoice-header">
                <div class="row">
                    <div class="col-lg-3 col-print-3">
                        <img src="" alt="Bukti Pembayaran Air Bersih" />
                    </div>
                    <div class="col-lg-9 col-print-9">
                        <ul class="list-inline">
                            <li>Invoice #: <strong>15240776</strong></li>
                            <li>Invoice Date: <strong>Nov 22, 2013</strong></li>                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end invoice header -->
            <!-- invoice address -->
            <div class="invoice-from-to">
                <div class="row">
                    <div class="col-sm-6 col-print-6">                        
                        <p class="name">Nama Pelanggan</p>
                        <address>
                            12345 North Main Street
                            <br /> New York, 2233845
                            <br />
                            <div class="contact">
                                <p><span>Phone:</span> (1800) 765 - 4321</p>
                                <p><span>Email:</span> email@example.com</p>                                                                
                            </div>
                        </address>
                    </div>
                    <div class="col-sm-6 col-print-6 text-right">                        
                        <p class="name">Hardware Studio Inc.</p>
                        <address>
                            28435 East Main Street
                            <br /> New York, 2233845
                            <br />
                            <div class="contact">                                
                                <p><span>Phone:</span> (1800) 888 - 4321</p>
                                <p><span>Fax:</span> (1800) 888 - 4322</p>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
            <!-- end invoice address -->

            <!-- invoice item table -->
            <div class="table-responsive">
                <table class="table invoice-table">
                    <thead>
                        <tr>                            
                            <th>Stand Meter</th>
                            <th>Rincian</th>
                            <th>Uruaian(m3)</th>
                            <th>Tarif(m3)</th>                            
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span>Awal(m3) :</span> </td>
                            <td>1-10m3</td>
                            <td>urain</td>
                            <td>tarif</td>
                            <td>subtotal</td>
                        </tr>
                        <tr>
                            <td><span>Akhir(m3) :</span></td>
                            <td>10-20m3</td>
                            <td>urain</td>
                            <td>tarif</td>
                            <td>subtotal</td>
                        </tr>
                        <tr>
                            <td><span>Jumlah(m3) :</span></td>                                                        
                            <td>20-30m3</td>
                            <td>urain</td>
                            <td>tarif</td>
                            <td>subtotal</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&gt; 30m3</td>
                            <td>urain</td>
                            <td>tarif</td>
                            <td>subtotal</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- end invoice item table -->

            <!-- invoice footer -->
            <div class="invoice-footer">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 col-print-4 col-print-offset-2 right-col">
                        <div class="invoice-total">
                            <div class="row">
                                <div class="col-xs-4 col-xs-offset-4 col-print-6 col-print-offset-2">
                                    <p>Subtotal</p>
                                    <p>Abodemen)</p>
                                    <p>Denda</p>
                                    <p>Pembulatan</p>
                                    <p>Jml Bayar</p>
                                </div>
                                <div class="col-xs-4 text-right col-print-4">
                                    <p>$11,110</p>
                                    <p>$1,111</p>
                                    <p>$12,221</p>
                                    <p>sda</p>
                                    <p>sss</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-print-5 left-col">
                        <blockquote class="invoice-notes">                            
                            <p>Terima kasih telah membayar tepat waktu</p>
                        </blockquote>
                    </div>
                    <div class="col-sm-2 col-print-2 left-col">
                        <div class="text-center">
                            <p>Petugas</p>
                            <div style="margin-bottom: 65px;"></div>
                            <p>Nama Petugas</p>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- end invoice footer -->

            <!-- invoice action buttons -->
            <div class="col-sm-1 left">
                <div class="invoice-buttons">
                    <button class="btn btn-default print-btn"><i class="fa fa-print"></i> Print</button>                
                </div>
            </div>

            <!-- end invoice action buttons -->
        </div>
        <!-- INVOICE -->
    </div>
</div>