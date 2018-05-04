<!DOCTYPE html>
<head>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
	   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<?php 
    //Atualizado 09/03/2017
	
    include "conecta.inc";
   
    $total_disponivel  =  $_GET['total_disponivel'];
    $codigo_local  =  $_SESSION['codigo_local'];
    $localidade  =  $_SESSION["localidade"];    
    $vara_user  =  $_SESSION['vara_user'];
    $entidade  =  $_GET['entidade'];
    $data_aud  =  $_GET['data'];
    $verifica  =  0;
    $conexao  =  $_SESSION['conexao'];  
    $horario  =  $_GET['horario'];   
    $lotacao  =  $_SESSION['lotacao'];
    $perfil  =  $_SESSION['perfil'];   
    $query  =  "SELECT var_ds_vara from p_vara where var_sesu_cd_secsubsec = '$codigo_local'";
    $total  =  $_GET['total'];    
    $id  =  $_GET['id'];
    $sala = $_GET['sala'];
    $duracao = $_GET['duracao'];
    $intervalo_ini = $_GET['intervalo_ini'];
    $intervalo_fim = $_GET['intervalo_fim'];
    $resultado  =  ociparse($conexao, $query);
    //var_dump($intervalo_ini);
    //var_dump($intervalo_fim);
    //var_dump($duracao);

    ociexecute($resultado);
   
    //echo "<form target=\"_blank\" method=\"POST\" action=\"inserir.php?id=$id&total=$total&horarios=$horario&lotacao=$lotacao&total_disponivel=$total_disponivel&entidade=$entidade&data=$data_aud&sala=$sala&conciliador1=$conciliador1&conciliador2=$conciliador2&vara_selecionada=$vara_selecionada&verifica=$verifica\">";
  
    echo "<form name =\"verificaform\"id=\"verificaform\" action=\"javascript:void(0);\">";
		echo "<table style=\"margin:0 auto; width:45%\" cellpadding=\"5\" cellspacing=\"5\" border=\"1\">";
			echo "<center>";
				echo "<tr>";
		/* 
		if ($perfil!='TESTE') { echo "<tr><td>* Vara:</td><td>$vara_user</td>"; }
		else { 
		echo "<tr>";
		echo "<td>Vara/Processante:</td>";
		echo "<select name=\"vara_selecionada\">";
		echo "<option value=".$lotacao.">".$lotacao."";
		while ($linha=oci_fetch_array($resultado)){

			echo "<option value=".$linha[0].">".$linha[0]."</option>";
		}
		echo "</select>";
		echo "</td>"; 
		}
		*/	
				echo "</tr>";
				echo"
				<tr>
					<td style=\"border:1px solid #808080; padding:14px\">
						Processo:
					</td>
					<td style=\"border:1px solid #808080;\">
                        <input id=\"processo\" type=\"text\" size=\"55\" name=\"processo\" autofocus onKeyUp=\"if (event.keyCode == 13 ) $('[name=avnc]').click();\">
					</td>
				</tr>
			</center>";		
		echo "</table>
		<br>
		<center>	
			<input id=\"tipo_processo\" type=\"checkbox\" name=\"tipo_processo\" value=\"pje\" onclick=\"$('[name=avnc]').focus();\">
				Processo PJe
		</center>";
   
    /* 
    echo "</tr><tr><td>Hor�rio</td><td>";                        
    $lista_horarios=array();
    $lista_horarios[0]="07:30";
    $lista_horarios[1]="08:00";
    $lista_horarios[2]="08:30";
    $lista_horarios[3]="09:00";
    $lista_horarios[4]="09:30";
    $lista_horarios[5]="10:00";
    $lista_horarios[6]="10:30";
    $lista_horarios[7]="11:00";
    $lista_horarios[8]="11:30";
    $lista_horarios[9]="12:00";
    $lista_horarios[10]="12:30";
    $lista_horarios[11]="13:00";
    $lista_horarios[12]="13:30";
    $lista_horarios[13]="14:00";
    $lista_horarios[14]="14:30";
    $lista_horarios[15]="15:00";
    $lista_horarios[16]="15:30";
    $lista_horarios[17]="16:00";
    $lista_horarios[18]="16:30";
    $lista_horarios[19]="17:00";
    $lista_horarios[20]="17:30";
    $lista_horarios[21]="18:00";
    $lista_horarios[22]="18:30";    
    $_SESSION['lista_horarios']=$lista_horarios;
    $counter=0;
    $i=0;
    $z=0;
    $achei=0;
    $n_found=0;
    $valor_inicio=0;
    $limite=0;
    echo "<select name=\"horarios\">";
    while($i<=22) {
    if ($lista_horarios[$i]==$horario) { $valor_inicio=$i; }
        $i=$i+1;
    }    
    $query2="SELECT Horario from setorial.Audiencias WHERE ID=$id ORDER BY Horario ASC"; 
    $resultado=ociparse($conexao, $query2);
    ociexecute($resultado);
    while($linha2=oci_fetch_array($resultado)){
    $horarios_ja_marcados[$n_found]=$linha2[0];
    $n_found=$n_found+1;    
    }
    if($perfil!="Usu�rio"){
    $i=$valor_inicio;
    $limite=$i+$total-1;
    while ($i<=$limite) {
    $achei=0;
    $z=0;
    while ($z<$n_found) {
        if ($lista_horarios[$i]==$horarios_ja_marcados[$z]) { $achei=1; }
        $z=$z+1;
    }
    if ($achei==0) { echo "<option value=$lista_horarios[$i]> $lista_horarios[$i]</option>\n"; 
    }
    $i=$i+1;   
        }
    }else{
      if ($n_found==0){
        echo "<option value=$lista_horarios[$valor_inicio]> $lista_horarios[$valor_inicio]</option>\n"; 
      }else{
        $hora_certa = $valor_inicio + $n_found;
        echo "<option value=$lista_horarios[$hora_certa]>$lista_horarios[$hora_certa]</option>\n";
      }
    } 
    */
    
    //echo "<input type=\"submit\" value=\"Submit\" style=\"display:none;\"";
    echo "</form>";  
	
    echo "<br>";
    echo "<br>";
    echo "<br>";
        
    //echo "<td><button type=\"button\" class=\"button2\" processo='$processo' local='$codigo_local' sigla='$lotacao' onclick=\"carregaProcesso(this)\"> TESTE </td>";
        
    echo "<center>
			<tr>
				<td>
					<button type=\"submit\" class=\"button2\" name=\"avnc\"
					local='$codigo_local' 
					sigla='$lotacao' 
					total='$total' 
					id='$id' 
					horario='$horario' 
					total_disponivel='$total_disponivel' 
					entidade='$entidade' 
					data_aud='$data_aud'
                    intervalo_ini='$intervalo_ini'
                    intervalo_fim='$intervalo_fim' 
					sala='$sala' 
                    duracao='$duracao' onclick=\"carregaProc(this);\">
						Avan&ccedil;ar
					</button>
				</td>
			</tr>
		</center>";

    //echo "<center><input class=\"button2\" type=\"submit\" name=\"Cadastrar\" value=\"Marcar\" id=\"Cadastrar\" onclick='carregaProcesso(this)'></center>";
    //echo"<p id=\"teste\"></p>"
	 /*echo "<script language=\"javascript\">
	 function verificaEnter(evt, ths)
			{
				if(evt.keyCode==13)
				{
				document.getElementById(\"processo\").style.backgroundColor = \"red\";
				$(\"#avnc\").trigger('click');
				}
			}
</script>";*/
?>

