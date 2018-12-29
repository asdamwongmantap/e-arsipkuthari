<?php
    session_start();
    include "../../../koneksi.php";
    require('laporan/fpdf.php');
	
    $query ="select no_arsip, tgl_arsip, perihal, lampiran, desc_jenis, lokasiarsip, a_masuk from view_arsip WHERE a_masuk='Arsip Masuk'";
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
			$this->image('laporan/filefolder.jpg');
			
            //Pengaturan Font Header
            $this->SetFont('helvetica','B',23); //jenis font : Times New Romans, Bold, ukuran 13
            //untuk warna background Header
            $this->SetFillColor(255,255,255);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
            $this->Cell(34,1,'LAPORAN DATA ARSIP MASUK',"",1,'C',1); //TBLR (untuk garis)=> B = Bottom,
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
	$pdf = new PDF('L','cm','legal');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('arial','B',10);
	// arti formatnya $pdf->Cell('Lebarnya','Tingginya','Header Text','LRTB',0,'C') 
   // $pdf->Cell(1,1,'NO','LRTB',0,'C');
	$pdf->Cell(4,1,'No. Arsip','LRTB',0,'C');
    $pdf->Cell(7,1,'Tanggal','LRTB',0,'C');
    $pdf->Cell(8,1,'Perihal','LRTB',0,'C');
    $pdf->Cell(3,1,'Lampiran','LRTB',0,'C');
	$pdf->Cell(6,1,'Jenis Arsip','LRTB',0,'C');
	$pdf->Cell(6,1,'Lokasi Arsip','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('arial',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
       // $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
		$pdf->Cell(4,1,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(7,1,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(8,1,$cell[$j][2],'LBTR',0,'C');
        $pdf->Cell(3,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(6,1,$cell[$j][4],'LBTR',0,'C');
		$pdf->Cell(6,1,$cell[$j][5],'LBTR',0,'C');
       
        $pdf->Ln();
    }
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>

