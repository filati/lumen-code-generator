<?php

include_once ('geradorDeObjetos.class.php');

if (!isset($_POST['objeto']) || empty($_POST['objeto'])) {
    die('Objeto não informado');
}

$gerador = new geradorDeObjetos($_POST['objeto'], $_POST['table']);

echo "Objetos criados:<br><br>\n";
$tipos = $gerador->obterTipos();
foreach ($tipos as $tipo) {
    $codigo = $gerador->obterCodigoPorTipo($tipo);
    echo $gerador->fabricarObjetoVazio($tipo, $_POST['table'], $codigo, $_POST['mostrar_objetos']);
}
?>

