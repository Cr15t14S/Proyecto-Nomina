<?php
ob_start();

// Verificar que los datos existen
$nom = $_REQUEST['nomb'] ?? [];
$cen = $_REQUEST['cent'] ?? [];
$car = $_REQUEST['carg'] ?? [];
$id = $_REQUEST['id'] ?? [];
$suel = $_REQUEST['suel'] ?? [];
$dias = $_REQUEST['dias'] ?? [];
$sal2 = $_REQUEST['sal2'] ?? [];
$Auxtrans= $_REQUEST['Auxtrans'] ?? [];
$EPS= $_REQUEST['EPS'] ?? [];
$ARL= $_REQUEST['ARL'] ?? [];
$Recargo= $_REQUEST['Recargo'] ?? [];
$HDomin= $_REQUEST['HDomin'] ?? [];
$Total= $_REQUEST['Total'] ?? [];
$tam = count($nom);

?>

<h2>DATOS PERSONALES</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr class='bg-custom'>
        <td>Nombre</td>
        <td>Centro de costo</td>
        <td>Cargo</td>
        <td>No. Id</td>
        <td>Sueldo</td>
    </tr>
    <?php
    for ($i = 0; $i < $tam; $i++) {
        echo "<tr class='bg-custom'>
                <td>{$nom[$i]}</td>
                <td>{$cen[$i]}</td>
                <td>{$car[$i]}</td>
                <td>{$id[$i]}</td>
                <td>{$suel[$i]}</td>
              </tr>";
    }
    ?>    
</table>

<HR>

<h2>DEDUCCIONES</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr class='bg-custom'>
        <td>id</td>
        <td>Nombre</td>
        <td>Salario</td>
        <td>Salario según Días Laborados</td>
    </tr>
    <?php
    for ($i = 0; $i < $tam; $i++) {
        echo "<tr class='bg-custom'>
                <td>{$id[$i]}</td>
                <td>{$nom[$i]}</td>
                <td>{$suel[$i]}</td>
                <td>{$sal2[$i]}</td>
                <td>{$Auxtrans[$i]}</td>
                <td>{$EPS[$i]}</td>
                <td>{$ARL[$i]}</td>
                <td>{$Recargo[$i]}</td>
                <td>{$HDomin[$i]}</td>
                <td>{$Total[$i]}</td>
              </tr>";
    }
    ?>    
</table>

<?php
// Generación del PDF
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new DOMPDF();
$dompdf->loadHtml(ob_get_clean());
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('nomina.pdf', array("Attachment" => 0)); // Cambia a 1 si deseas que el archivo se descargue en lugar de visualizarse
?>