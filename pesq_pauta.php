      <!DOCTYPE HTML>

<html>
  <head>   
    <meta charset="ISO-8859-1">
    <title>Sistema de Agendamento de Audi&ecirc;ncia de Conciliç&atilde;o</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/reset.css">    
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/print.css">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
    <link href="./css/bootstrap2.css" rel="stylesheet" type="text/css"/>


    <!-- <link rel="stylesheet" href="css/???.css"> -->

<style> <!-- In&iacute;cio da exportaç&atilde;o para folha de estilo externa -->

header {
 
  position: fixed;
  float: right;
  width: 100%;
  top: 0px;
  background: #ECECEC;
  z-index: 2;
}
body{
	width: 100%;
	height: 100%;
	
}

@media screen and (min-width: 768px) {
        .modal-dialog {
          width: 1100px;
          position: absolute;
          left: 40%;
        }
}
@media print {    
    .no-print { 
        display: none; 
    }

    .print {
        display: block;
    }
}
.hidden {
    visibility: hidden;
}

.relative2 {
  position: relative;
  top: 20px;
  left: 20px;
  background-color: white;
  width: 500px;
}

#footer {
    position : absolute;
    bottom : 0;
    width: 60%;
    height : 20px;
    margin-top : 40px;
  }
.button {
    cursor: pointer;
    background-color: #285994; /* Cor antiga 152f4e */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;    
    display: inline-block;
    border-radius: 9px;
    width: 300px;
    height: 50px;
    font-size: 16px;
    box-shadow: 1px 1px 2px #000;
}

.closebtn {
cursor: pointer;
    background-color: #285994; 
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;    
    display: inline-block;
    border-radius: 8px;
    font-size: 14px;
    top: 20px;
    left: 1534px;

                
}

.button2 {
    cursor: pointer;
    background-color: #285994; 
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;    
    display: inline-block;
    border-radius: 8px;
    font-size: 14px;
    margin:auto;
}
.button3{
    cursor: pointer;
    font-size:13px;
    color: white;
    background-color: #1a1a1a;
    padding:5px;
    border-radius: 9px;
}
.center {
    margin: auto;
    width: 60%;
    padding: 10px;
}
.td-ajuste {
	align: center;
	border: none;
	text-align:center; 
	}
table-exit {
    border: none;    
    width: 90%;
    align: center;
    vertical-align:middle;
    text-align:left; 
    margin: 0 auto; 
    display: block;
}

td-exit {
    border: none;
    padding:7px;
    vertical-align:middle;
}

table {
    border: 1px solid #808080;    
    width: 90%;
    align: center;
    vertical-align:middle;

}
th {
    border-bottom: 1px solid #808080;
    font-size: 105%;
    padding: 7px;
    border: 1px solid #808080;
    background-color: #285994;
    color: white; 
    vertical-align:middle;
}

td {
    border: 1px solid #808080;
    padding:7px;
    vertical-align:middle;
}
tr:nth-child(even){background-color: white}
tr:hover{
    background-color:#cccccc;
}
.FAQ { 
    vertical-align: top;     
    height:auto !important; 
}

.list {
    display:none; 
    height:auto;
    horizontal-align: center;
    margin:0;
    float: center;
}  
.show {
    display: none; 
}
.hide:target + .show {
    display: inline;     
}
.hide:target {
    display: none; 
}
.hide:target ~ .list {
    display:inline; 
}

/*style the (+) and (-) */
.hide, .show {
	padding:14px;
    width: 80px;
    height: 80px;
    border-radius: 130px;
    font-size: 100%;
    color: #fff;
    text-shadow: 0 1px 0 #666;
    text-align: center;
    text-decoration: none;
    box-shadow: 1px 1px 2px #000;
    background: #152f4e;
    opacity: .95;
    margin-right: 0;
    float: center;
    margin-bottom: 25px;
}
.hide:hover, .show:hover {
    color: #eee;
    text-shadow: 0 0 1px #666;
    text-decoration: none;
    box-shadow: 0 0 4px #222 inset;
    opacity: 1;
    margin-bottom: 125px;
}
  
</style> <!-- Fim da exportaç&atilde;o para folha de estilo externa -->
</head>
<body>                    
                <form method="POST" action="resultado_pesq_pauta.php">
					<center>
						<table border="1" align="center" style="margin:auto; width:80%; " cellpadding="5" cellspacing="5" border="1" >
							<tr>
								<td align="center" width="100%" style="border-bottom-color:#ffffff;">
									<!-- <input type="radio" name="tipo_busca" value="tipo_2" checked="yes">Entre&nbsp;&nbsp; -->

									<input class="required" required="yes" type="number" name="dia1" id="dia1" value="" style='width: 35px;' min="1" max="31" 
									oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 31) this.value = 31;" 
									onKeyUp="if ((this.value.length +1) > 2) document.getElementById('mes1').focus();" autofocus />
									/
									<input class="required" required="yes" type="number" name="mes1" id="mes1" value="" style='width: 35px;' min="1" max="12" 
									oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 12) this.value = 12;"
									onKeyUp="if ((this.value.length +1) > 2) document.getElementById('ano1').focus();"/>
									/
									<input class="required" required="yes" type="number" name="ano1" id="ano1" 
									value="<?php print date('Y');?>" min="<?php echo '2017';?>" max="3000" maxlength="4"  
									oninput="javascript: if (this.value.length > this.maxLength) this.value = <?php echo '2018'; ?>;" 
									onblur="javascript: if (this.value < this.min) this.value = <?php echo '2018'; ?>;"
									style='width: 70px;' />&nbsp;&nbsp;e&nbsp;&nbsp;


									<input class="required" required="yes" type="number" name="dia2" id="dia2" value="" style='width: 35px;' min="1" max="31" 
									oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 31) this.value = 31;"
									onKeyUp="if ((this.value.length +1) > 2) document.getElementById('mes2').focus();"/>
									/
									<input class="required" required="yes" type="number" name="mes2" id="mes2" value="" style='width:35px;' min="1" max="12" 
									oninput="javascript: if (this.value < 0) this.value = 01; else if (this.value > 31) this.value = 12;"
									onKeyUp="if ((this.value.length +1) > 2) document.getElementById('ano2').focus();"/>
									/
									<input class="required" required="yes" type="number" name="ano2" id="ano2" maxlength="4" 
									value="<?php print date('Y') ?>" min="<?php echo '2017';?>" max="3000"
									oninput="javascript: if (this.value.length > this.maxLength) this.value = <?php print date('Y') ?>;" 
									onblur="javascript: if (this.value < this.min) this.value = <?php print date('Y') ?>;" style='width: 70px;' />
								</td>
							</tr>
						</table>
                        <table align="center" style="margin:auto; width:80%;" cellpadding="5" cellspacing="5" border="1">
                            <tr>
                                <td>
                                    <input class="entidade radio" required="yes" type="radio" name="tipo_busca" value="tipo_3" onClick="validacao_pesquisa()" />Somente pautas da entidade:&nbsp;&nbsp;&nbsp;
								</td>
								<td>
									<input id="entidade" required="yes" type="text" name="entidade_buscar" style="width:250px" disabled="true">
                                </td>                            

                            </tr>
                              
                            <tr>
								<td>
                                    <input class="assunto radio" required="yes" type="radio" class="check" name="tipo_busca" value="tipo_4" onClick="validacao_pesquisa()" />Somente pautas do assunto:&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>
									<input id="assunto" required="yes" type="text" name="assunto_buscar"style="width:250px" disabled="true">
                                </td>
                            </tr>
                        </table>         
                        <br><br>          
                        <input class="button2" type="submit" name="Visualisar" value="Visualizar" id="cadastrar">
                    </center>
                </form>    

              
</body>
</html>