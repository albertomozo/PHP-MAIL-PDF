<?


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();

// Guardar el PDF en el servidor
$pdfOutput = $dompdf->output();
$nombrearchivo = 'curso_'.time().'.pdf';
file_put_contents('pdf/'.$nombrearchivo, $pdfOutput);
echo '<a href="pdf/'.$nombrearchivo.'">'.$nombrearchivo.'</a>';