<html>
<head>
<meta charset="ISO-8859-1">
        <script src="jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script> 
        <link rel="stylesheet" href="css/print.css">
</head>

    <style> 
        @media print {    
            .no-print { 
                display: none; 
            }

            .print {
                display: block;
            }

            .td4 { 
                display: none;
                padding: 10px;
                text-align: center;
                border-bottom:1;
                border:1;
            }
           
        }

         .hidden {
            visibility: hidden;
        }

        .table1 {
            width: 80%;
            border:1;

            
        }
        .table2{
            width: 70%;
            border:0;
        }
        .tr1{
            width: 100%;        
        }
        .td1 {
            width: 33%;
            font-size: 18px;
            padding: 14px;
            text-align: center;
            // border: 5px ;
        }
        .td2 {
            padding: 10px;
            text-align: center;
            border-bottom:1; 
            border:1;
        }
        .td4 { 
            padding: 10px;
            text-align: center;
            border-bottom:1;
            border:1;
        }
        .td3 {
            font-size: 18px;
            padding:3px;
            text-align: center;
            
        }

        .th 
        {
            width: 33%;
        }
        .tr1:nth-child(even){background-color: #f2f2f2}
        .tr1:hover{background-color:#cccccc;}
    </style>
</head>
<body>
 <div id="tabela_listar">

        <!--<div class="print">
            <div class="hidden">
                <div class="pen-title">
                    <img width="70px" height="70px" src="JFtransp.png" >
                    <span>
                        <h1><font size="4px">  Sistema de Agendamento de Audi&ecirc;ncia de Concili&ccedil;&atilde;o  </font>  </h1>
                    </span>
                </div>
            </div>
        </div>-->
  
    <?php
        include "conecta.inc";
        include_once 'trf1_Biblioteca.php';
        $id               = $_GET["id"];
        $codigo_local     = $_SESSION["codigo_local"];
        $secao            = $codigo_local;
        utf8_encode($conciliador = $_GET["conciliador"]);
        //$conciliador = $_GET["conciliador"];
        $data_aud         = $_GET["data"];
        $assunto          = $_GET["assunto"];
        $sala             = $_GET['sala'];
        $entidade         = $_GET['entidade'];
        $conexao          = $_SESSION['conexao'];
        $total_disponivel = $_GET['total_disponivel'];
        $horario          = $_GET['horario'];
        $total            = $_GET['total'];
        $perfil           = $_SESSION['perfil'];
        $lotacao          = $_SESSION['lotacao'];
        $intervalo_ini    = $_GET['intervalo_ini'];

        $intervalo_fim    = $_GET['intervalo_fim'];
        $sigla_local      = $_SESSION['lotacao'];
        $orgao = $sigla_local;

        if($codigo_local == 1000){
            $codigo_local = 100;
        }




        $SecaoCodigo = $codigo_local;
        $resultado1 = ociparse($conexao, $query1);
        ociexecute($resultado1);
        $data = oci_fetch_array($resultado1);

        $query2 = "     SELECT Codigo, Processo, Vara, Parte, Horario, Resultado 
                        FROM setorial.Audiencias 
                        WHERE ID=$id and estado='ATIVO' 
                        ORDER BY Horario ASC";

        $resultado2 = ociparse($conexao, $query2);
        ociexecute($resultado2);

        $query3 = " SELECT Codigo, Processo
                    FROM setorial.Audiencias
                    WHERE ID=$id and estado='ATIVO'";

        $resultado3 = ociparse($conexao, $query2);
        ociexecute($resultado3);

        while ($linha = oci_fetch_array($resultado3)) {
            $proc = $linha[1];     
        };
            
        $TNS = Conexao($orgao, 1);
        if (($orgao == "DF") || ($orgao == "JFDF")) {
            $uStENT  = Conexao($TNS, 2);
            $conexao = @ocilogon(Conexao($TNS, 2), Conexao($TNS, 3), $TNS, 'WE8ISO8859P1');
        } else {
            $uStENT  = Conexao($TNS, 2);
            $conexao = @ocilogon(Conexao($TNS, 2), Conexao($TNS, 3), $TNS, 'WE8ISO8859P1');
        }

        if ($conexao == false) 
        {
            $conexao = @ocilogon(Conexao($TNS, 2), Conexao($TNS, 3), $TNS, 'WE8ISO8859P1');
            $uStENT  = Conexao($TNS, 2);
            if ($conexao == false) 
            {
                $conexao = @ocilogon(Conexao($TNS, 10), Conexao($TNS, 11), $TNS, 'WE8ISO8859P1');
                $uStENT  = Conexao($TNS, 8);
                if ($conexao == false) 
                {
                    $conexao = @ocilogon(Conexao($TNS, 8), Conexao($TNS, 9), $TNS, 'WE8ISO8859P1');
                    $uStENT  = Conexao($TNS, 2);
                    if ($conexao == false) 
                    {
                        $conexao = @ocilogon(Conexao($TNS, 4), Conexao($TNS, 5), $TNS, 'WE8ISO8859P1');
                        $uStENT  = Conexao($TNS, 10);
                        if ($conexao == false) 
                        {
                            $oerr = OCIError();
                            if ($oerr) 
                            {
                                if ($oerr["code"] == "1017")
                                    $ErrMsg = "";
                                else
                                    $ErrMsg = "Error " . $oerr["message"] . "[5675]";
                            }
                            
                            $txtmsg2 = "<center><font size=2 color=red>\n
                                <strong>Servi&ccedil;o indispon&iacute;vel no momento ![82]</strong></font><font size=2>\n
                                <br />O erro foi encaminhado ao setor respons&aacute;vel para verifica&ccedil&atilde;o..<br />\n
                                Espere alguns instantes e fa&ccedil;a uma nova tentativa.<br />\n
                                <!-- $ErrMsg -->\n
                                </font></center>\n";
                            $MSgMai  = $oerr["message"] . "\\n\n Usu&aacute;rio: " . $uStENT . " \n\n secao[ " . $TNS . "]\n\n[" . $ErrMsg . "] \n\n";
                            
                            // @mail("tr224ps@trf1.jus.br","Erro Emissï¿½o Certidï¿½o[83] $TNS ",$MSgMai);
                            
                            ImprimeBarraInfoAtencao($txtmsg2);
                            exit;
                        }
                    }
                }
            }
        }

        echo "<table class=\"table1\" style=\"margin:0 auto; background-color: #285994; color: white\">\n";
            echo "<tr class=\"tr1\">\n";
                echo "<th width=\"42.5%\" align=\"center\"> <font size=\"3px\"> Data: $data_aud </font> </th>\n";
                echo "<th width=\"15%\" align=\"center\"> <font size=\"3px\"> Sala: $sala </font> </th>\n";
                echo "<th width=\"42.5%\" align=\"center\"> <font size=\"3px\"> Conciliador: ".strtoupper($conciliador)." </font> </th>\n"; //INDICES 
                //echo "<th align=\"center\" width=\"184px\"> <font size=\"3px\"> Intervalo: <br> $intervalo_ini - $intervalo_fim </font> </th>\n";
            echo "</tr class=\"tr1\">\n";
      

        echo "<table class=\"table1\" style=\"margin:0 auto\">\n";
            echo "<tr class=\"tr1\">\n";
                echo "<td width=\"30px\" align=\"center\" > <font size=\"4px\"> Hor&aacute;rio </font> </td>\n";
                echo "<td width=\"190px\" align=\"center\"> <font size=\"4px\"> Processo </font>  </td>\n"; //TABELA VIEW
            
                echo  "<td width=\"130px\" align=\"center\"> <font size=\"4px\">";    //PARTE
                $xml = retornaDados($conexao, $proc, $SecaoCodigo);      
                if ($xml) {
                    $RetornoXML = getResult($xml);
                    foreach($RetornoXML[1]->partes->parte as $partes){
                      $partes->tipo = strtoupper($partes->tipo); 
                        if ($partes->tipo != "REQUISITANTE" && $partes->tipo != "REMETENTE" && $partes->tipo != "APELADO" && $partes->tipo != "PROCURADOR" && $partes->tipo != "ADVOGADO")
                        {
                            if($partes->tipo == "AGRAVANTE" || $partes->tipo == "REQUERENTE" || $partes->tipo == "APELANTE" || $partes->tipo == "RECORRENTE" || $partes->tipo == "IMPETRANTE" || $partes->tipo == "EMBARGANTE" || $partes->tipo == "INTERPELANTE" || $partes->tipo == "ASSISTENTE" || $partes->tipo == "AUTOR" && $partes->tipo != "RECDO") 
                            {
                                echo $partes->tipo;
                                break;  
                             }
                        }
                    }
                }

                echo "</font>";
                echo  "<td align=\"center\">"; 

                    echo "<font size=\"4px\">  "; 

                    $xml = retornaDados($conexao, $proc, $SecaoCodigo);      
                    if ($xml) {
                        $RetornoXML = getResult($xml);
                        foreach($RetornoXML[1]->partes->parte as $partes){
                          $partes->tipo = strtoupper($partes->tipo); 
                            if ($partes->tipo != "REQUISITANTE" && $partes->tipo != "REMETENTE" && $partes->tipo != "APELANTE" && $partes->tipo != "PROCURADOR" && $partes->tipo != "ADVOGADO")
                            {
                                if($partes->tipo == "AGRAVADO" || $partes->tipo == "REQUERIDO" || $partes->tipo == "APELADO" || $partes->tipo == "RECORRIDO" || $partes->tipo == "IMPETRADO" || $partes->tipo == "EMBARGADO" || $partes->tipo == "INTERPELADO" || $partes->tipo == "OPOENTE" || $partes->tipo == "REU" && $partes->tipo != "RECTE") 
                                {
                                    if($partes->tipo == "REU") {
                                        echo "R&Eacute;U";
                                        break;
                                    } else {
                                        echo $partes->tipo;
                                        break;  
                                    }
                                  
                                 }
                            }
                        }
                    }

                  
                    echo "</font>"; //PARTE

                echo  "</td>\n";

                echo "<td class=\"td4\"></td>\n";
              
        echo "</tr class=\"table1\">\n";

        echo "<tr class=\"tr1\">\n";
    //echo "</div>";
            $query1 = " SELECT DATA 
                        FROM setorial.Controle          
                        WHERE ID=$id"; //SELECIONAR DATA


            while ($linha = oci_fetch_array($resultado2)) {
                            $proc = $linha[1];
                            $parte = $linha[3];
                    
                            echo "<td class=\"td2\"> $linha[4] </td>\n"; //HOR�RIO
                            echo "<td class=\"td2\"> $linha[1] </td>\n"; //PROCESSO
                            //echo "<td class=\"td2\"> $linha[3] </td>\n"; //PARTE

      
            if($parte !== NULL){
                
                            echo "<td align=\"center\" width=\"100%\"> $linha[3] </td>\n"; //PARTE
                            echo "<td align=\"center\" width=\"100%\"> </td>\n";
                          
                    
            } else {
                                  
                            echo "<td width=\"50%\" class=\"td2\">";
                                 
            $count_autor = 0;
            $xml = retornaDados($conexao, $proc, $SecaoCodigo);
                if ($xml) {
                    $RetornoXML = getResult($xml);
                    foreach ($RetornoXML[1]->partes->parte as $partes){
                        $encoding = 'UTF-8';
                        $partes->tipo = mb_convert_case($partes->tipo, MB_CASE_UPPER, $encoding);
                        if ($partes->tipo != "REQUISITANTE" && $partes->tipo != "REMETENTE" && $partes->tipo != "APELADO" && $partes->tipo != "PROCURADOR" && $partes->tipo != "ADVOGADO"){     
                            if($partes->tipo != "AGRAVADO" && $partes->tipo != "REQUERIDO" && $partes->tipo != "APELADO" && $partes->tipo != "RECORRIDO" && $partes->tipo != "IMPETRADO" && $partes->tipo != "EMBARGADO" && $partes->tipo != "INTERPELADO" && $partes->tipo != "OPOENTE" && $partes->tipo != "RU" && $partes->tipo != "REU") {
              
                                if($count_autor < 2){
                                    echo "<font size=\"3px\">";
                                        $count_autor++;  
                                        echo $count_autor . "-" . $partes->nome . "<br>"; 
                                    
                                    echo "</font>";
                                } else {
                                    echo "OUTROS"; 
                                    break;
                                }
                                                                
                            }
              
                        }
                
                    }           
                            echo "</td>\n"; 

                            echo "<td width=\"50%\" class=\"td2\">";
                    $count_reu = 0;
                    foreach ($RetornoXML[1]->partes->parte as $partes){
                        $partes->tipo = strtoupper($partes->tipo);    
                        if ($partes->tipo != "REQUISITANTE" && $partes->tipo != "REMETENTE" && $partes->tipo != "APELANTE" && $partes->tipo != "PROCURADOR" && $partes->tipo != "ADVOGADO")
                        {
                            if($partes->tipo != "AGRAVANTE" && $partes->tipo != "REQUERENTE" && $partes->tipo != "APELANTE" && $partes->tipo != "RECORRENTE" && $partes->tipo != "IMPETRANTE" && $partes->tipo != "EMBARGANTE" && $partes->tipo != "INTERPELANTE" && $partes->tipo != "ASSISTENTE" && $partes->tipo != "AUTOR") 
                            {
        
                                if($count_reu < 2){
                                    $count_reu++;
                                    echo $count_reu . "-" .$partes->nome . "<br>"; 
                                } else {
                                    echo "OUTROS"; 
                                    break;
                                }
                                                                
                            }
                        }

                    }
                            echo "</td>";
            }             
        }

            /*}
                            else { echo "<td>-</td>"; }*/
                         

                            echo "<div class=\"no-print\">";
                                echo "<td class=\"td4\">
                                        <button type=\"button\" 
                                                class=\"button2\" 
                                                class=\"noprint\" 
                                                id=\"cancel\" 
                                                data-id=\"$id\" 
                                                data-codigo=\"$linha[0]\" 
                                                data-vara=\"$linha[2]\" 
                                                data-total_disponivel=\"$total_disponivel\" 
                                                data-assunto=\"$assunto\" 
                                                data-data_aud=\"$data_aud\" 
                                                data-sala=\"$sala\" 
                                                data-entidade=\"$entidade\" 
                                                data-horario=\"$horario\" 
                                                data-total=\"$total\" 
                                                onclick=\"apaga(this)\" 
                                                style='padding:10px'>
                                                    Apagar
                                                </button>
                                        </td>";
                           echo "</div>";
                           
            echo "</tr>";                          
            }   

        echo "</table>";
//echo "<center><input class=\"button2\" type=\"submit\" name=\"Salvar\" value=\"Salvar\" id=\"Salvar\"></center>";
echo "<br><br>";
echo " </div>";
?>
  

    </div>
    <br>
    <br>
    <center>
        <button target="_blank" 
                class="button2"
                name="print" 
                onclick="printDiv2('printableArea')"
                value="Imprimir" 
                style="padding:10px;margin:10px"> 
                Imprimir
        </button>
        <!--<button class="button2" id="btn-print" onclick="printPage('listar.php');" style="padding:10px;margin:10px"
            data-id="$id" 
            data-conciliador="$conciliador"
            data-sala="$sala"
            data-data="$data_aud"> 
            Imprimir
        </button>-->
      

    </center>
    <?php

        function retornaDados($conn, $proc, $secao) {
        if (!$conn) {
            $msg              = 'Conex&atilde;o inv&aacute;lida';
            $this->messages[] = $msg;
            return false;
        }
        
        $sql  = "SELECT ocjp.pkg_consulta_processual_v2.getdadosprocessuais(:proc, :secao) AS XML FROM dual";
        $stmt = oci_parse($conn, $sql);
        if (!$stmt) {
            $msg              = Connection::mountErrorMsg(DBInteraction::PARSE, $conn);
            $this->messages[] = $msg;
            return false;
        }
        
        oci_bind_by_name($stmt, ":proc", $proc, -1, SQLT_CHR);
        oci_bind_by_name($stmt, ":secao", $secao, 4, SQLT_CHR);
        $result = oci_execute($stmt);
        if (!$result) {
            $msg = Connection::mountErrorMsg(DBInteraction::EXECUTE, $stmt);
            @oci_free_statement($stmt);
            $this->messages[] = $msg;
            return false;
        }
        
        $result = oci_fetch($stmt);
        if (!$result) {
            $msg = Connection::mountErrorMsg(DBInteraction::FETCH, $stmt);
            @oci_free_statement($stmt);
            $this->messages[] = $msg;
            return false;
        }
        
        $lob = oci_result($stmt, "XML");
        
        // $resultado = $lob->read($lob->size());
        
        $resultado = $lob->load();
        $lob->free();
        @oci_free_statement($stmt);
        
        // var_dump($resultado);
        // die;
        
        return ($resultado);
    }

    function isValid($xml) {
        libxml_use_internal_errors(true);
        $dom                      = new DOMDocument("1.0", "UTF-8");
        $dom->strictErrorChecking = false;
        $dom->validateOnParse     = false;
        $dom->recover             = true;
        $dom->loadXML($xml);
        
        // header('Content-type: text/xml');
        // echo $dom->saveXML();
        // exit;
        // $xml = simplexml_import_dom($dom);
        
        $_sXml = simplexml_import_dom($dom);
        
        // var_dump($this->_sXml);
        // exit;
        
        libxml_clear_errors();
        libxml_use_internal_errors(false);
        
        // $this->_sXml = simplexml_load_string($this->_xml);
        
        if (!$_sXml) {
            $messages[] = 'Erro ao consultar o processo [XML].';
            
            // mail("giuseppe.junior@trf1.jus.br","Consulta Processual [XML]",$this->_xml);//echo $query;
            
            return false;
        }
        
        if (isset($_sXml->erro)) {
            return false;
        }
        
        return $_sXml;
    }

    function getResult($xml) {
        $_xml = sanitizeXml($xml);
        
        // var_dump($_xml);
        // die;
        
        $_sxml = isValid($_xml);
        
        // var_dump($_sXml->processos->processo);
        // die;
        
        $retorno      = array();
        $j            = 0;
        $qtd_processo = count($_sxml->processos->processo);
        if (count($_sxml->processos->processo) > 1) {
            $retorno[1] = $_sxml->processos->processo[0];
        } else {
            $retorno[1] = $_sxml->processos->processo;
        }
        
        // $this->iniciaSessao();
        
        return $retorno;
    }

    function imprimirErros() {
        $msn = array_shift($this->messages);
        return $msn;
    }

    function sanitizeXml($xml) {
        
        // ESPACOS DUPLOS
        
        $xml = str_replace("   ", " ", $xml);
        $xml = str_replace("  ", " ", $xml);
        
        // $xml = str_replace(" ", " ", $xml); // FIXME
        //  $xml = str_replace("  ", " ", $xml);
        // return array();
        
        $xml = str_replace("&", 'E', $xml);
        $xml = str_replace("'", ' ', $xml);
        $xml = str_replace('"', ' ', $xml);
        
        // TAB
        
        $xml = str_replace("    ", "", $xml);
        $xml = str_replace("\r\n", "", $xml);
        $xml = str_replace("\n", "", $xml);
        $xml = str_replace("\t", "", $xml);
        
        // ASCII 18DC2(Device control 2)
        // $xml = str_replace(" ", "", $xml); // FIXME
        // $xml = str_replace(" ", "", $xml); // FIXME
        
        $xml = preg_replace('!^[^>]+>(\r\n|\n)!', '', $xml);
        
        // ----------------------------------------------------- cÃ³digo para tratar v2
        
        $xml = str_replace("<dados_padrao_proc_v2>", "", $xml);
        $xml = str_replace("</dados_padrao_proc_v2>", "", $xml);
        $xml = str_replace("<classe_padrao_v2>", "<classe>", $xml);
        $xml = str_replace("</classe_padrao_v2>", "</classe>", $xml);
        $xml = str_replace("<partes_padrao_v2>", "<parte>", $xml);
        $xml = str_replace("</partes_padrao_v2>", "</parte>", $xml);
        $xml = str_replace("<mv_padrao_v2>", "<mv>", $xml);
        $xml = str_replace("</mv_padrao_v2>", "</mv>", $xml);
        $xml = str_replace("_padrao_v2", "", $xml);
        $xml = str_replace("_v2", "", $xml);
        $xml = str_replace("_padrao_v2", "", $xml);
        
        // ----------------------------------------------------- cÃ³digo para tratar v2
        
        $xml = str_replace("<dados>", "", $xml);
        $xml = str_replace("</dados>", "", $xml);
        $xml = str_replace("<CD_OBJ>", "", $xml);
        $xml = str_replace("</CD_OBJ>", "", $xml);
        $xml = str_replace("<DS_OBJ>", "", $xml);
        $xml = str_replace("</DS_OBJ>", "", $xml);
        $xml = str_replace('"<?xml version="1.0"?>"', "", $xml);
        $xml = str_replace("Elt;", "<", $xml);
        $xml = str_replace("Egt;", ">", $xml);
        $xml = str_replace("<num_trf><![CDATA[", "<num_trf>", $xml);
        $xml = str_replace("]]></num_trf>", "</num_trf>", $xml);
        $xml = str_replace("<num_cnj><![CDATA[", "<num_cnj>", $xml);
        $xml = str_replace("]]></num_cnj>", "</num_cnj>", $xml);
        
        // $xml = str_replace("<![CDATA[", "", $xml);
        // $xml = str_replace("]]>", "", $xml);
        
        $format = '<?xml version="1.0" encoding="UTF-8"?><root>%s</root>';
        /*
         * $xml = str_replace('"<?xml version="1.0"?>"', '"<?xml version="1.0" encoding="UTF-8"?><processos>%s</processos>"', $xml);
         *
         * <dat_autuac>&lt;![CDATA[18/08/2005]]&gt;</dat_autuac>
         *
         *
         * $format = '<root>%s</root>';
         * /*$format = '<?xml version="1.0" encoding="UTF-8"?><root>%s</root>';
         */
        
        // $xml = preg_replace('/\&/', 'e', $xml);
        // $xml_parser = new Xml($xml, null);
        // $this->notify('retornoArray' , $xml_parser->Data);
        // return Xml::toArray(sprintf($format, $xml));
        // return self::xml_entities(sprintf($format, $xml));
        
        return sprintf($format, $xml);
    }

    ?>
    </body>
</html>