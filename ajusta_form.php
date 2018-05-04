<?php
$id=$_GET['id'];
$total=$_GET['total'];
$horario=$_GET['horario'];
$lotacao=$_SESSION['lotacao'];
$total_disponivel=$_GET['total_disponivel'];
$entidade=$_GET['entidade'];
$data=$_GET['data'];
$sala=$_GET['sala'];
echo "<form method=POST action=\"inserir.php?id=$id&total=$total&horario=$horario&lotacao=$lotacao&total_disponivel=$total_disponivel&entidade=$entidade&data=$data&sala=$sala>";
?>

