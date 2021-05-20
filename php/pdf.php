<?php
    //Importamos el mPDF
    require_once('../MPDF/vendor/autoload.php');
   
    //Plantilla HTML
    require_once('./plantilla.php');   
   
     

    $mpdf = new \Mpdf\Mpdf([


 ]);


$sheet = getPlantilla($fila);
$style = file_get_contents('../css/pdf_Styles.css');

$mpdf->writeHtml($style, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($sheet, \Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();


?>