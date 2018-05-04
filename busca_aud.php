<html>
    <head>   
        <meta charset="ISO-8859-1">
    </head>
    <body>  
        <?php 
            include "conecta.inc";
            $codigo_local =$_SESSION['codigo_local'];
            $conexao=$_SESSION['conexao'];
            $query = "SELECT var_ds_vara from p_vara where var_sesu_cd_secsubsec = '$codigo_local'";
            $resultado = ociparse($conexao, $query);
            ociexecute($resultado);

            $consulta_codigo = "SELECT Codigo FROM setorial.Controle"

        ?>
        <form action="principal_proc.php" method="post" id="busc_aud">
            <input type="hidden" name="id" value="$id">
            <center>
                <br>
                Entre&nbsp;&nbsp; 

                <input type="number" id="dia1" required="yes" name="dia1" value="" style='width: 35px;' oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 31) this.value = 31;" 
                onKeyUp="if ((this.value.length +1) > 2) document.getElementById('mes1').focus();" autofocus />
                /
                <input type="number" id="mes1" required="yes" name="mes1" value="" style='width: 35px;'oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 12) this.value = 12;"
                onKeyUp="if ((this.value.length +1) > 2) document.getElementById('ano1').focus();"/>
                /
                <input type="number" id="ano1" required="yes" name="ano1" value="<? print date('Y') ?>" style='width: 50px;' maxlength="4"  
                oninput="javascript: if (this.value.length > this.maxLength) this.value = <?php echo '2018'; ?>;" 
                onblur="javascript: if (this.value < this.min) this.value = <?php echo '2018'; ?>;" />

                &nbsp;&nbsp; e &nbsp;&nbsp;

                <input type="number" required="yes" id="dia2" name="dia2" value="" style='width: 35px;' oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 31) this.value = 31;" 
                onKeyUp="if ((this.value.length +1) > 2) document.getElementById('mes2').focus();" autofocus/>
                /
                <input type="number" required="yes" id="mes2" name="mes2" value="" style='width: 35px;' oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 12) this.value = 12;"
                onKeyUp="if ((this.value.length +1) > 2) document.getElementById('ano2').focus();" />
                /
                <input type="number" required="yes" id="ano2" name="ano2" value="<?php print date('Y') ?>" style='width: 50px;' maxlength="4"  
                oninput="javascript: if (this.value.length > this.maxLength) this.value = <?php echo '2018'; ?>;" 
                onblur="javascript: if (this.value < this.min) this.value = <?php echo '2018'; ?>;"  />
            </center>

            <br>

            <center>
                    <table style="text-align:left; margin: 0 auto" cellpadding="4" cellspacing="4" border="1">                  
                             
                            <tr>
                            <td><input class="vara radio" type="radio" name="tipo_busca" value="tipo_1" onClick="validacao_aud()"/>Audiências da Vara/Processante</td>&nbsp
                            <td>
                                <select required id="vara" name="vara_buscar" style='width: 354px;' disabled="true">
                                    <option id="null" value="" disabled selected>Selecione</option>
                                    <option id="todas" value="Todas" >Todas</option>
                                    <?php
                                        if ($codigo_local=="100"||$codigo_local=="1000") { 
                                    ?>

                                    <option value="CEJUC"> CEJUC</option>

                                    <?php
                                        } else {
                                            while ($linha = oci_fetch_array($resultado)) {
                                                
                                                echo "<option value=".$linha[0].">".$linha[0]."</option>";
                                            }
                                        } 
                                    ?>
                            </tr>   
                                </select>                 
                                <tr>
                                    <td>
                                        <input class="processo_buscar radio" required="yes" type="radio" name="tipo_busca" value="tipo_2" onClick="validacao_aud()"/>Buscar por processo:
                                    </td> &nbsp

                                        <td>
                                            <input style='width: 350px;' required="yes" type="text" name="processo_buscar" id="processo_buscar" disabled="true"> </td>
                                </tr>

                                <br>
                          
                                <tr>
                                    <td>
                                        <input class="assunto_buscar radio" required="yes" type="radio" name="tipo_busca" value="tipo_4" onClick="validacao_aud()"/>Buscar por assunto:
                                    </td>&nbsp

                                        <td>
                                            <input style='width: 350px;' required="yes" type="text" name="assunto_buscar" id="assunto_buscar" disabled="true">
                                        </td>
                                </tr>
                                <br>

                                 <!--<tr>
                                    <td>
                                        <input type="radio" name="tipo_busca" value="tipo_3"/>Buscar por parte: 
                                    </td>&nbsp

                                        <td>
                                            <input style='width: 350px;' type="text" name="parte_buscar" id="parte_buscar">
                                        </td>
                                </tr> -->
                                    
                                <br> 
                    </table>  
                    <br><br>
            </center>       
                    <center>
                        <input class="button2" type="submit" name="Visualizar" value="Visualizar" id="cadastrar">
                    </center>
        </form>    
        <script>
        </script>
    </body>
                
                       
</html>
    
