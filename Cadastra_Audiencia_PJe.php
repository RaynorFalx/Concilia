<html>
<!--
Essa página é aberta em uma modal e serve para o usuário preencher os dados
de uma pauta nova. Importante notar que ela chama uma função em java script (funcao10.js) 
que vai servir para as dropdown lists "duracao" e "horarios" interagirem entre si, uma vez que 
elas estando em uma modal as funções javascrip ficam limitadas.
-->
  <head>
    <meta charset="ISO-8859-1">
    <title>Sistema de Agendamento de Audiencias de Conciliacao</title>
    <style>
    </style>
  </head>
  <body> 
  
<?php
//Atualizado 09/03/2017
include "conecta.inc";
$conexao2         = $_SESSION['conexao'];
$codigo_local     = $_SESSION['codigo_local'];
$sigla_local      = $_SESSION['lotacao'];
$id               = $_GET["id"];
$horario          = $_GET['horario'];
$total            = $_GET['total'];
$tipo_processo    = $_GET['tipo_processo'];
$entidade         = $_GET['entidade'];
$lotacao          = $_SESSION['lotacao'];
$localidade       = $_SESSION["localidade"];
$vara_user        = $_SESSION['vara_user'];
$total_disponivel = $_GET['total_disponivel'];
$data_aud         = $_GET['data_aud'];
$sala             = $_GET['sala'];
$perfil           = $_SESSION['perfil'];
$codigo_local     = $_SESSION['codigo_local'];
$duracao          = $_GET['duracao'];
$verifica         = 0;
$query2           = "SELECT Horario from setorial.Audiencias WHERE ID=$id and estado='ATIVO' ORDER BY Horario ASC";
$resultado        = ociparse($conexao2, $query2);
$teste            = ociexecute($resultado);
$nrows            = oci_fetch_all($resultado, $CampoResult);

$intervalo_ini    = $_GET['intervalo_ini'];
$intervalo_fim    = $_GET['intervalo_fim'];

//var_dump($intervalo_ini);
//var_dump($intervalo_fim);
//$query3           = "SELECT duracao from setorial.Controle WHERE ID=$id";
//$resultado        = ociparse($conexao2, $query3);
//ociexecute($resultado);
//$duracao = oci_fetch_array($resultado);

//var_dump($duracao);
//$codigo_local = $_GET["local"];
//$sigla_local = $_GET["sigla"];

$processo = $_GET['processo'];
$processo = str_replace('.', '', $processo);
$processo = str_replace('-', '', $processo);
$processo = str_replace(' ', '', $processo);
if ($codigo_local == 1000) {
    $codigo_local = 100;
}
$erro  = 0;
$achei = 0;
echo "<form method=\"POST\" action=\"inserir.php?id=$id&total=$total&horarios=$horario&lotacao=$lotacao&total_disponivel=$total_disponivel&entidade=$entidade&data=$data_aud&sala=$sala&processo=$processo&tipo_processo=$tipo_processo\">";
?>

    <table cellpadding="5" cellspacing="5" border="1" style="text-align:left; margin: 0 auto; width: 55%;">

        <tr><td>Polo Ativo:</td><td> <input id="parte_escolhida" type="text" required name="parte_escolhida" ></td></tr>
        <tr><td>Polo Passivo:</td><td> <input id="parte_escolhida_passiva" type="text" required name="parte_escolhida_passiva" ></td></tr>
        
        <?php
echo "</tr><tr><td>Horario:</td><td>";
$lista_horarios = array();

        if ($duracao == 20) {
            $lista_horarios = array();
            $lista_horarios[0] = "07:20"; $lista_horarios[1] = "07:40"; $lista_horarios[2] = "08:00"; $lista_horarios[3] = "08:20"; $lista_horarios[4] = "08:40";
            $lista_horarios[5] = "09:00"; $lista_horarios[6] = "09:20"; $lista_horarios[7] = "09:40"; $lista_horarios[8] = "10:00"; $lista_horarios[9] = "10:20";
            $lista_horarios[10] = "10:40"; $lista_horarios[11] = "11:00"; $lista_horarios[12] = "11:20"; $lista_horarios[13] = "11:40"; $lista_horarios[14] = "12:00";
            $lista_horarios[15] = "12:20"; $lista_horarios[16] = "12:40"; $lista_horarios[17] = "13:00"; $lista_horarios[18] = "13:20"; $lista_horarios[19] = "13:40";
            $lista_horarios[20] = "14:00"; $lista_horarios[21] = "14:20"; $lista_horarios[22] = "14:40"; $lista_horarios[23] = "15:00"; $lista_horarios[24] = "15:20";
            $lista_horarios[25] = "15:40"; $lista_horarios[26] = "16:00"; $lista_horarios[27] = "16:20"; $lista_horarios[28] = "16:40"; $lista_horarios[29] = "17:00";
            $lista_horarios[30] = "17:20"; $lista_horarios[31] = "17:40"; $lista_horarios[32] = "18:00"; $lista_horarios[33] = "18:20"; $lista_horarios[34] = "18:40";
          
        } else if ($duracao == 30) {
            $lista_horarios = array();
            $lista_horarios[0]  = "07:30"; $lista_horarios[1]  = "08:00"; $lista_horarios[2]  = "08:30"; $lista_horarios[3]  = "09:00"; $lista_horarios[4]  = "09:30";
            $lista_horarios[5]  = "10:00"; $lista_horarios[6]  = "10:30"; $lista_horarios[7]  = "11:00"; $lista_horarios[8]  = "11:30"; $lista_horarios[9]  = "12:00";
            $lista_horarios[10] = "12:30"; $lista_horarios[11] = "13:00"; $lista_horarios[12] = "13:30"; $lista_horarios[13] = "14:00"; $lista_horarios[14] = "14:30";
            $lista_horarios[15] = "15:00"; $lista_horarios[16] = "15:30"; $lista_horarios[17] = "16:00"; $lista_horarios[18] = "16:30"; $lista_horarios[19] = "17:00";
            $lista_horarios[20] = "17:30"; $lista_horarios[21] = "18:00"; $lista_horarios[22] = "18:30";
      
        } else if ($duracao == 40) {
            $lista_horarios = array();
            $lista_horarios[0]  = "07:40"; $lista_horarios[1]  = "08:20"; $lista_horarios[2]  = "09:00"; $lista_horarios[3]  = "09:40"; $lista_horarios[4]  = "10:20";
            $lista_horarios[5]  = "11:00"; $lista_horarios[6]  = "11:40"; $lista_horarios[7]  = "12:20"; $lista_horarios[8]  = "13:00"; $lista_horarios[9]  = "13:40";
            $lista_horarios[10] = "14:20"; $lista_horarios[11] = "15:00"; $lista_horarios[12] = "15:40"; $lista_horarios[13] = "16:20"; $lista_horarios[14] = "17:00";
            $lista_horarios[15] = "17:40"; $lista_horarios[16] = "18:20";
        }

$_SESSION['lista_horarios'] = $lista_horarios;
$counter                    = 0;
$i                          = 0;
$z                          = 0;
$achei                      = 0;
$n_found                    = 0;
$valor_inicio               = 0;
$limite                     = 0;
$contador                   = 0;
$orgao                      = $sigla_local;

 $counter      = 0;
            $i            = 0;
            $z            = 0;
            $x            = 0;
            $achei        = 0;
            $n_found      = 0;
            $valor_inicio = 0;
            $contador     = 0;
            $limite       = 0;


            $index        = 0;
            $posArray     = array();
            $reach_ini    = array_search($intervalo_ini, $lista_horarios); //$reach_ini indica a posiçao do horario do inicio do intervalo
            $reach_fim    = array_search($intervalo_fim, $lista_horarios); //$reach_fim indica a posiçao do horario do fim do intervalo
        
            //gambiarra
            if($reach_ini!==false && $reach_fim!==false){//os dois horários precisam ser válidos
                $tam_aux=($reach_fim-$reach_ini);
                $ini=$reach_ini;
                $vet_aux=array();
                $cont_aux=0;
                $p=0;

                for($cont_aux;$cont_aux<$tam_aux;$cont_aux++){
                    $vet_aux[$cont_aux] = $ini++;
                }
            }
            else{
                $vet_aux=array();
                $vet_aux[0]=-1;
                $p=0;           
            }
            //gambiarra
            for($i; $i < count($lista_horarios); $i = $i + 1) {     
                if($lista_horarios[$i] == $horario) {               
                    $valor_inicio = $i;                             
                }
            } 
            /*
            $nrows armazena um vetor com os horarios das audiencias cadastradas nessa pauta, retorna um int com a quatidade de linhas encontradas
            $CampoResult recebe um vetor com os horarios das audiencias cadastradas nessa pauta
            */
            for($contador; $contador <= ($nrows -1); $contador = $contador + 1) {
                $horarios_marcados[$n_found] = $CampoResult['HORARIO'][$contador]; 
                $n_found = $n_found + 1;

            }

            for($index; $index <= sizeof($horarios_marcados); $index = $index + 1){
                $posMarcadas        = array_search($horarios_marcados[$index], $lista_horarios);
                $posArray[$index]   = $posMarcadas;
            }

    
            if($perfil == "CEJUC") {

                echo "<select required name=\"horarios\" id=\"hora\" onkeypress=\"enter_usar(this)\">";                     // Inicio do select
            //if($perfil != "Usuario") {
                $index      = 0;
                $i          = $valor_inicio;        
                $limite     = $i + $total - 1;    
                for($i; $i <= $limite; $i = $i + 1) {      

                    if($i == $posArray[$index]){
                        $indisponivel = true;
                        $index ++;                          
                    } else {
                        $indisponivel = false;
                    }
           
                    if($i == $vet_aux[$p]) {                
                        $intervalo = true; 
                        $x = $x + 1;
                        $p++;
                    } else {
                        $intervalo = false;
                        $z =  $z + 1; 
                    }

                    if($intervalo == true) {

                        $limite = $limite + 1;                  
                        echo "<option disabled>Intervalo</option>\n";

                    } else if($indisponivel == false  ) {                 
                    
                        echo "<option value=$lista_horarios[$i]>$lista_horarios[$i]</option>\n"; 
                    }  
                }
              
            /*} else {

                if ($n_found == 0) {
                    echo "<option value=$lista_horarios[$valor_inicio]> $lista_horarios[$valor_inicio]</option>\n";
                } else {
                    $hora_certa = $valor_inicio + $n_found;
                    echo "<option value=$lista_horarios[$hora_certa]>$lista_horarios[$hora_certa]</option>\n";
                }        
                  
            }*/

                echo "</select>";  
                 
            } else {

                echo "<select required name=\"horarios\" id=\"hora\">";                     // Inicio do select

                $index      = 0;
                $i          = $valor_inicio;        
                $limite     = $i + $total - 1;      
                for($i; $i <= $limite; $i = $i + 1) {      

                    if($lista_horarios[$i] == $horarios_marcados[$z]){                    
                        $indisponivel = true;  
                    } else {
                        $indisponivel = false;
                    }
           
                    if($i == $vet_aux[$p]) {                
                        $intervalo = true; 
                        $x = $x + 1;
                        $p++;
                    } else {
                        $intervalo = false;
                        $z =  $z + 1; 
                    }

                    if($intervalo == true) {

                        $limite = $limite + 1;                  
                        //echo "<option disabled>Intervalo</option>\n";
                        

                    } else if($indisponivel == false  ) {               
                    
                        echo "<option value=$lista_horarios[$i]>$lista_horarios[$i]</option>\n";
                        break;
                    }  
      

                }
       

                echo "</select>";
                
            }

            echo "</td></tr></form></table>";
?>
       
    <br><br>
    <center><?
echo "<input class=\"button2\" type=\"submit\" name=\"Cadastrar\" value=\"Cadastrar\" id=\"Cadastrar\">";
?></center>      
                                                                           <!--Função que executa o arquivo funcao10.js com cadastrar=1 que indica que os dados da pauta devem ser enviados para inserir_pauta.php-->
    <script type="text/javascript" src="funcao10.js"></script>
  </body>
</html>