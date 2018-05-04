 <?php
    include "conecta.inc";
    $senha=$_POST['senha'];
    $senha2=$_POST['senha2'];
    $conexao=$_SESSION['conexao'];
    $login=$_SESSION['login'];
    if ($senha!=$senha2) { 
        header("Location:principal.php?senhaerro=1");
    }
    else { 
    $query="UPDATE Usuarios SET senha='$senha' WHERE matricula='$login'"; 
    $insere=mysqli_query($conexao, $query) or die("Problema de conexão com banco de dados". mysql_error());
    if ($insere) { 
        header("Location:principal.php?senhaok=1");
    }
    else {     
        echo"<script language='javascript' type='text/javascript'>alert('Erro na inserção!');window.location.href='executa_cadastro.php';</script>";
    }
}

?>
