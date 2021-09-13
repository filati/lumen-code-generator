<?php
/**
 * Created by PhpStorm.
 * User: FilaTI
 * Date: 13/09/2021
 * Time: 17:37
 */
?>
<form method="post" action="_geraObjeto.php">
    <label>Objeto (no singular):</label><br>
    <input type="text" name="objeto" placeholder="Dummy" /><br>
    <br>
    <label>Tabela relacionada:</label><br>
    <input type="text" name="table" placeholder="dummy_table"/><br>
    <br>
    <br>
    <label>Mostrar Objetos?</label><br>
    <select name="mostrar_objetos">
        <option value="0" selected>No</option>
        <option value="1">Yes</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Gerar"/>
</form>
