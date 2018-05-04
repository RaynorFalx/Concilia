<?php
include "conecta.inc";
$codigo                  = $_GET['codigo'];
$conexao                 = $_SESSION['conexao'];
$id                      = $_GET['id'];
$vara                    = $_GET['vara'];
$lotacao                 = $_SESSION['lotacao'];
$perfil                  = $_SESSION['perfil'];
$data_aud                = $_GET["data"];
$assunto                 = $_GET["assunto"];
$sala                    = $_GET['sala'];
$entidade                = $_GET['entidade'];
$horario                 = $_GET['horario'];
$total                   = $_GET['total'];
$query_total_disp        = "SELECT Total_disponivel from setorial.Controle WHERE ID=$id";
$ajusta_total_disponivel = ociparse($conexao, $query_total_disp);
ociexecute($ajusta_total_disponivel);
$linha_ajuste     = oci_fetch_array($ajusta_total_disponivel);
$total_disponivel = $linha_ajuste[0] + 1;
if (!empty($_GET['origem'])) {
                $origem = $_GET['origem'];
}
$query        = "UPDATE setorial.Audiencias set estado='CANCELADO' WHERE CODIGO='$codigo'";
$query2       = "UPDATE setorial.Controle SET Total_disponivel='$total_disponivel' WHERE ID='$id'";
$apaga        = ociparse($conexao, $query);
$arruma_total = ociparse($conexao, $query2);
if ($apaga AND $arruma_total) {
                ociexecute($apaga);
                ociexecute($arruma_total);
                ocicommit($conexao);
                if ($origem != "lista") {
                                header("Location:listar.php?id=$id&assunto=$assunto&data=$data&total_disponivel=$total_ajustado&entidade=$entidade&sala=$sala&horario=$horario&total=$total");
                }
                if ($origem == "lista") {
                                
                                header("Location:principal.php?add=1");
                }
} else {
                ocirollback($conexao);
                header("Location:principal.php?del_aud=0");
}


?>
     