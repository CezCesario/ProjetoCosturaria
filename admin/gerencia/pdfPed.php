        <?php
    session_start();
    if(!isset($_SESSION['usuarioNome'])&& !isset($_SESSION['usuarioAcesso']))
	{
            session_destroy();
            header('Location: ../../login.php');
        }
        require_once __DIR__ . '/vendor/autoload.php';
        
        //Criar a conexão
	include_once("../functions/conexao.php");
	$conn = abreConexao();
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
        
	$idcliente=$_GET["idcliente"];
        $idpedido=$_GET["idpedido"];
	$result_cliente = "SELECT * FROM cliente WHERE IDCLIENTE = '$idcliente' LIMIT 1";
	$resultado_cliente = mysqli_query($conn, $result_cliente);	
	$row_cliente = mysqli_fetch_assoc($resultado_cliente);
        
	$result_ped = "SELECT * FROM pedido WHERE IDPEDIDO = '$idpedido' LIMIT 1";
	$resultado_ped = mysqli_query($conn, $result_ped);	
	$row_ped = mysqli_fetch_assoc($resultado_ped); 
        
        $result_pag = "SELECT * FROM pagamento WHERE IDPEDIDO = '$idpedido' LIMIT 1";
	$resultado_pag = mysqli_query($conn, $result_pag);	
	$row_pag = mysqli_fetch_assoc($resultado_pag);
        
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d M Y');
        $hora = date('H:i:s');

$pagina = "
    <html lang='pt-BR'>
        <body>    
                <div class='navbar-header'>
             <table class=\"tbl_header\" width=\"1000\">
             <tr>
                 <td align=\"left\"><img src='../../assets/images/logotipo.png' alt=''></td>  
                 <td align=\"right\">$data - $hora</td>
               </tr>  
             </table>
                </div><br/>

        <div class='text-center'>

		<div class='container zoomIn animated'>
			
			<h1 class='page-title'><u>Pedido n°".$row_ped['IDPEDIDO']." - de ".$row_cliente['NOME']."</u></h1>			
		</div>
	</div><br/><br/>
                            <div class='main-container'>
                                <div class='container'>
                                    <div class='row'>
                                    
                                    <div class='col-md-12'>
					<h3>Pedido</h3><br/>                                   
						<table class='table table-bordered' width=\"700\">
					      <thead>
					        <tr>
					          <th style='text-align:center;'>N°</th>
					          <th style='text-align:center;'>Descrição</th>
					          <th style='text-align:center;'>Quantidade</th>
                                                  <th style='text-align:center;'>Status</th>
					        </tr>
					      </thead>
					      <tbody>
                                              <tr>
                                              <td style='text-align:center;'>".$row_ped['IDPEDIDO']."</td>
                                              <td style='text-align:center;'>".$row_ped['OBSV']."</td>
                                              <td style='text-align:center;'>".$row_ped['QTDE']."</td>
                                              <td style='text-align:center;'>".$row_ped['STATUS']."</td>
                                                </tr>
					      </tbody>
					    </table>
                                    </div>
                                    
                                    <div class='col-md-12'>
						<table class='table table-bordered' width=\"700\">
					      <thead>
					        <tr>
                                                  <th style='text-align:center;'>Solicitação</th>
                                                  <th style='text-align:center;'>Início</th>
                                                  <th style='text-align:center;'>Prazo</th>                                                  
					        </tr>
					      </thead>
					      <tbody>
                                              <tr>
                                              <td style='text-align:center;'>".$row_ped['DTSOLICITACAO']."</td>
                                              <td style='text-align:center;'>".$row_ped['DTINICIO']."</td>
                                              <td style='text-align:center;'>".$row_ped['PRAZO']."</td>                                             
                                                </tr>
					      </tbody>
					    </table>
                                    </div>
                                
                                    <div class='col-md-12'>
					<h3>Pagamento</h3><br/>                                     
						<table class='table table-bordered' width=\"700\">
					      <thead>
					        <tr>
					          <th style='text-align:center;'>Tipo</th>
					          <th style='text-align:center;'>Data</th>
                                                  <th style='text-align:center;'>Valor</th>
                                                  <th style='text-align:center;'>Status</th>
					        </tr>
					      </thead>
					      <tbody>
                                              <tr>
                                              <td style='text-align:center;'>".$row_pag['TIPO']."</td>
                                              <td style='text-align:center;'>".$row_pag['DTPAGAMENTO']."</td>
                                              <td style='text-align:center;'>".$row_pag['VALOR']."</td>
                                              <td style='text-align:center;'>".$row_pag['STATS']."</td>
                                                </tr>
					      </tbody>
					    </table>
                                    </div>
                                    </div>
                            </div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

            <table class=\"tbl_footer\" width=\"1000\">  
               <tr>  
                 <td align=\"center\"><a href=''>www.sirlene.epizy.com</a></td>
                 </tr><tr>
                 <td align=\"center\">(13)99999-9999 / contact@contac.com</td>
                 </tr><tr>
                 <td align=\"center\">Sirlene Costura & Confecção @ Copyright 2018 - by LFS</td> 
               </tr>  
            </table>
                    </body>
                </html>";

$arquivo = "Pedido_".$row_cliente['NOME']."_".$row_ped['IDPEDIDO'].".pdf";
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents('../../assets/css/style.css');
$btm = file_get_contents('../../assets/css/bootstrap.min.css');
$btp = file_get_contents('../../assets/css/bootstrap.css');
$mpdf->WriteHTML($btm,1);
$mpdf->WriteHTML($btp,1);
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($pagina);
$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servidor
// D - Salva o arquivo no computador do usuário
?>