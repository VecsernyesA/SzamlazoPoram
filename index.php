<?php
    require('fpdf184/fpdf.php');
    $pdf=new FPDF();

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',25);

    //szöveg dekódolása
    function utftohun($string){
        $string=iconv('utf-8','ISO-8859-2',$string);
        return $string;
    }

    //-----------------------------
    $szovegem="Ez a szöveg";
    $pdf->Cell(40,50,utftohun($szovegem));

    //sotörés
    $pdf->Ln();

    //logó-------------------------
    $image1="logo.jpg";
    $pdf->Image($image1,10,5,-300);

    //-----------------------------
    //Vonal beszúrása
    $pdf->Line(5,20,205,20);

    //oldalszám
    $pdf->SetFont('Arial','B',10);
    $pdf->SetY(266);
    $pdf->totalPages='{totalPages}';
    $pdf->AliasNbPages('{totalPages}');
    $pdf->Cell(0,10,'Oldal: '.$pdf->totalPages.'/'.$pdf->PageNo().'.',0,0,'c');

    $aru_n='Áru neve';
    $afa='Afa';
    $netto_e='Nettó egységár';
    $brutto_e='Bruttó egységár';

    //Új oldal beszúrása
    $pdf->AddPage();

    //cellák beszúrása egymás mellé szegélyezve
    $pdf->Cell(46,5,utftohun($aru_n),'LTRB',0,'C',0);
    $pdf->Cell(46,5,utftohun($afa),1,0,'C',0);
    $pdf->Cell(46,5,utftohun($netto_e),1,0,'C',0);
    $pdf->Cell(46,5,utftohun($brutto_e),1,0,'C',0);

    //Új sor 4 cellával
    $pdf->Cell(46,5,'','L',1,'C',0);    //cell with left and right borders
    $pdf->Cell(46,5,'xy',1,0,'L',0);
    $pdf->Cell(46,5,'27%',1,0,'L',0);
    $pdf->Cell(46,5,'2300',1,0,'L',0);
    $pdf->Cell(46,5,'xxxxx',1,0,'L',0);
    //-----------------------------

    //mentés
    $pdf->Output("F","szamla.pdf",true);
    $pdf->Output();//képernyőn megjelenítjük
    $pdf->Close();
?>