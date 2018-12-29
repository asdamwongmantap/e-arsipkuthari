<?php
    session_start();
    include "../../../koneksi.php";
    require('laporan/fpdf.php');
	
	$noarsip=$_POST['no_arsip'];
    $query ="select no_arsip, tgl_arsip, perihal, lampiran, desc_jenis, lokasiarsip, a_masuk from view_arsip WHERE no_arsip='$noarsip'";
    $db_query = mysql_query($query) or die("Query gagal");
    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][0] = $data[0];
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        $cell[$i][3] = $data[3];
		$cell[$i][4] = $data[4];
       $cell[$i][5] = $data[5];
        $i++;
    }
    //memulai pengaturan output PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
			$this->image('laporan/logo.jpg');
            //Pengaturan Font Header
            $this->SetFont('helvetica','B',23); //jenis font : Times New Romans, Bold, ukuran 13
            //untuk warna background Header
            $this->SetFillColor(255,255,255);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
            $this->Cell(20,1,'LEMBAR DISPOSISI',"",1,'C',1); //TBLR (untuk garis)=> B = Bottom,
            // L = Left, R = Right
            //untuk garis, C = center
        }
		function Footer()
		{
			// Go to 1.5 cm from bottom
			$this->SetY(-07);
			// Select Arial italic 8
			$this->SetFont('Arial',"",8);
			// Print current and total page numbers
			$this->Cell(0,10,'Halaman ke '.$this->PageNo()."",0,0,'C');
		}
    }
    //pengaturan ukuran kertas P = Portrait, L=Landscape
	$pdf = new PDF('P','cm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('arial','B',10);
	// arti formatnya $pdf->Cell('Lebarnya','Tingginya','Header Text','LRTB',0,'C') 
   // $pdf->Cell(1,1,'NO','LRTB',0,'C');
	$pdf->SetFont('arial',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
       // $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
	    $pdf->Cell(5,1,'Diterima Tanggal','LRTB',0,'C');
		$pdf->Cell(5,1,$cell[$j][1],'LBTR',0,'C');
		$pdf->Cell(9,1,'','LRT',0,'C');
		$pdf->Ln();
		$pdf->Cell(5,1,'No. Surat','LRTB',0,'C');
		$pdf->Cell(5,1,$cell[$j][0],'LBTR',0,'C');
		$pdf->Cell(9,1,'','LR',0,'C');
		$pdf->Ln();
        $pdf->Cell(5,1,'Tanggal Surat','LRTB',0,'C');
		$pdf->Cell(5,1,$cell[$j][1],'LBTR',0,'C');
		$pdf->Cell(9,1,'','LR',0,'C');
		$pdf->Ln();
		$pdf->Cell(5,1,'Isi Ringkasan','LRTB',0,'C');
        $pdf->Cell(5,1,$cell[$j][2],'LBTR',0,'C');
		$pdf->Cell(9,1,'','LRB',0,'C');
		$pdf->Ln();
		$pdf->Cell(10,1,'Ditujukan Kepada Yth:','LRTB',0,'C');
		$pdf->Cell(9,1,'Isi Disposisi','LRTB',0,'C');
        $pdf->Ln();
		$pdf->Cell(10,5,'','LRTB',0,'C');
		$pdf->Cell(9,5,'','LRTB',0,'C');
		$pdf->Ln();
		
    }
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>

