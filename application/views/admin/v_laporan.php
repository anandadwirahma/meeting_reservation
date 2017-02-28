<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo base_url() ?>asset/img/solusi247.png" style="width:100%; max-width:250px;">
                            </td>
                            <td rowspan=2>
                                Created: <?php echo date("F j, Y"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                PT.SOLUSI247<br>
                                Jl. Prof Dr Satrio Kav. 6<br>
                                Karet Kuningan Setiabudi<br>
                                Jakarta Selatan DKI Jakarta
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="7">
                    <table>
                        <tr>
                            <td>
                                <center><h1>Laporan Peminjaman Ruang Meeting</h1></center>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                <?php
                    if(empty($start_date) && empty($end_date)){
                        foreach ($min_max_tgl as $row) : 
                            $start_date = $row->start_date;
                            $end_date = $row->end_date;
                        endforeach;
                    }
                ?>
                    Periode : <?php echo "$start_date - ";echo "$end_date"; ?>
                </td>
            </tr>
            <tr class="heading">
                <td><center>Nama Pemesan</center></td>
                <td><center>Judul Meeting</center></td>
                <td><center>Ruang</center></td>
                <td><center>Tanggal Pemesanan</center></td>
                <td><center>Tanggal Meeting</center></td>
                <td><center>Waktu</center></td>
                <td><center>Status</center></td>
            </tr>
            <?php foreach ($laporan as $lap) : ?>
            <tr class="item">
                <td><center><?php echo $lap->nama; ?></center></td>
                <td><center><?php echo $lap->topik; ?></center></td>
                <td><center><?php echo $lap->ruang; ?></center></td>
                <td><center><?php echo $lap->tgl_psn; ?></center></td>
                <td><center><?php echo $lap->tgl_meeting; ?></center></td>
                <td><center><?php echo $lap->waktu; ?></center></td>
                <td><center><?php echo $lap->status; ?></center></td>
            </tr>
            <?php endforeach; ?>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="4"><h3>Summary</h3></td>
            </tr>
            <?php foreach ($summary_booking as $row_sum) : ?>      
            <tr class="item">
                <td colspan="4"><center></center></td>
                <td><?php echo $row_sum->status; ?></td>
                <td>:</td>
                <td><center><?php echo $row_sum->jumlah; ?></center></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>