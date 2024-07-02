<?php
require 'vendor/autoload.php';


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
// leer datos curso
$curso = file_get_contents('datos/cursos.json');
// Decodificar el JSON
$data = json_decode($curso, true);

// Crear el contenido HTML
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Curso ' . htmlspecialchars($data['curso']) . '</title>
</head>
<body>
    <h1>Detalles del Curso</h1>
    <p><strong>Curso:</strong> ' . htmlspecialchars($data['curso']) . '</p>
    <p><strong>Fecha de Inicio:</strong> ' . htmlspecialchars($data['fecha inicio']) . '</p>
    <p><strong>Fecha de Fin:</strong> ' . htmlspecialchars($data['fecha fin']) . '</p>
    <p><strong>Lugar:</strong> ' . htmlspecialchars($data['lugar']) . '</p>
    <p><strong>Empresa:</strong> ' . htmlspecialchars($data['empresa']) . '</p>

    <h2>Tutor</h2>
    <p><strong>Nombre:</strong> ' . htmlspecialchars($data['tutor']['Nombre']) . '</p>
    <p><strong>Email:</strong> <a href="mailto:' . htmlspecialchars($data['tutor']['email']) . '">' . htmlspecialchars($data['tutor']['email']) . '</a></p>
    <p><strong>LinkedIn:</strong> <a href="' . htmlspecialchars($data['tutor']['linked']) . '">' . htmlspecialchars($data['tutor']['linked']) . '</a></p>
    <p><strong>GitHub:</strong> <a href="' . htmlspecialchars($data['tutor']['github']) . '">' . htmlspecialchars($data['tutor']['github']) . '</a></p>
    <p><strong>URL:</strong> <a href="' . htmlspecialchars($data['tutor']['url']) . '">' . htmlspecialchars($data['tutor']['url']) . '</a></p>

    <h2>Alumnos</h2>
';

foreach ($data['alumnos'] as $alumno) {
    $html .= '
    <div>
        <h3>' . htmlspecialchars($alumno['Nombre']) . '</h3>
        <p><strong>Email:</strong> <a href="mailto:' . htmlspecialchars($alumno['email']) . '">' . htmlspecialchars($alumno['email']) . '</a></p>
        <p><strong>LinkedIn:</strong> <a href="' . htmlspecialchars($alumno['linked']) . '">' . htmlspecialchars($alumno['linked']) . '</a></p>
        <p><strong>GitHub:</strong> <a href="' . htmlspecialchars($alumno['github']) . '">' . htmlspecialchars($alumno['github']) . '</a></p>
        <h4>Conocimientos al Inicio</h4>
        <ul>
            <li>HTML: ' . htmlspecialchars($alumno['inicio']['html']) . '</li>
            <li>CSS: ' . htmlspecialchars($alumno['inicio']['css']) . '</li>
            <li>JS: ' . htmlspecialchars($alumno['inicio']['JS']) . '</li>
            <li>Vue: ' . htmlspecialchars($alumno['inicio']['Vue']) . '</li>
        </ul>
        <h4>Conocimientos al Final</h4>
        <ul>
            <li>HTML: ' . htmlspecialchars($alumno['fin']['html']) . '</li>
            <li>CSS: ' . htmlspecialchars($alumno['fin']['css']) . '</li>
            <li>JS: ' . htmlspecialchars($alumno['fin']['JS']) . '</li>
            <li>Vue: ' . htmlspecialchars($alumno['fin']['Vue']) . '</li>
        </ul>
    </div>
    ';
}

$html .= '
</body>
</html>
';



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