<?php
  if ($_SERVER["REQUEST_METHOD"]=="GET") {
  	$idserv=$_GET["idserv"];
        $tp=$_GET["tp"];
  	include_once("./layout/deletarServ.php");
  } else if ($_SERVER["REQUEST_METHOD"]=="POST") {
  	$MensagemErro="Serviço excluído com sucesso.";
	if (!isset($_POST["IDSERV"])
                ) 
	{
		$MensagemErro="Parametros inválidos. Por favor, tente novamente.";
	}
	else
                {       
                include_once("../functions/conexao.php");
		$con=abreConexao();
                $pm=mysqli_prepare($con,"DELETE FROM SERVICO WHERE idserv=?");
		mysqli_stmt_bind_param($pm,"i",$idserv);
                $idserv=$_POST["IDSERV"];
                mysqli_stmt_execute($pm); 
	}
    include_once("./manageServ.php");
  } else {
  	include_once("../report.php");
  }
?>