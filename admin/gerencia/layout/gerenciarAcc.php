<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Sirlene Costura & Confecção - Gerencia</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootsrap -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

        <!-- PrettyPhoto -->
        <link rel="stylesheet" href="../../assets/css/prettyPhoto.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="../../assets/css/style.css">
        
        <!-- Modernizr -->
        <script src="../../assets/js/modernizr-2.6.2.min.js"></script>
        
        <!-- Ordenar Tabela JS -->
        <script src="../../assets/js/sorttable.js"></script>

<?php include("../../fix/header.php"); ?>
    
    <body>
        <div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title">Gerenciar Contas de acesso <span class="title-under"></span></h1>
			<p class="page-description">
				Listadas abaixo, todas as contas de acesso cadastradas.
			</p>			
		</div>
	</div>
            <div class="container">
            <div class="row">
<?php include("../../fix/welcome.php"); ?>
            </div>
                <p><a style="text-decoration: underline" href="../home.php">Funções</a> &raquo; <a style="text-decoration: underline" href="../gerencia.php">Gerenciar</a> &raquo; 
                    <b><a style="text-decoration: underline" href="manageAcc.php">Contas de acesso</a></b></p>
            </div>
        				<div class="main-container">
                                            <div class="container">                                            
                                            <div class="table-responsive col-md-12 col-sm-12">

					<h2 class="title-style-2">Contas de acesso <span class="title-under"></span></h2>

						<table class="table table-style-1 sortable">
					      <thead>
					        <tr>
					          <th style="text-align:center;">ID</th>
					          <th style="text-align:center;">Nome</th>
					          <th style="text-align:center;">Usuário</th>
                                                  <th style="text-align:center;">Acesso</th>
                                                  <th style="text-align:center;">Editar</th>
                                                  <th style="text-align:center;">Excluir</th>
					        </tr>
					      </thead>
					      <tbody>
                                                    <?php
                                                      foreach($dadosacc as $i=>$v) {
                                                        echo "<tr>";
                                                        foreach ($v as $i2 => $v2) {
                                                          echo "<td style='text-align:center;'>$v2</td>";
                                                        }
                                                        echo "<td style='text-align:center;'><a  class='btn btn-success' href='editAcc.php?id={$v[0]}'><i class='fa fa-pencil-square-o'></i></a></td>";
                                                        echo "<td style='text-align:center;'><a  class='btn btn-danger' href='deleteAcc.php?id={$v[0]}&usu={$v[2]}'><i class='fa fa-remove'></i></a></td>";                                                        
                                                      }
                                                    ?>
					      </tbody>
					    </table>
                                            </div><br/>                                           
                                        <div class="form-group">
                                            <a href="../gerencia.php" class="btn btn-default">&larr; Voltar</a>
                                        </div>
            <?php if(isset($_SESSION['alerta'])){
                echo $_SESSION['alerta'];
                unset($_SESSION['alerta']);
            }
            ?>
            <?php if(isset($_SESSION['erro'])){
                echo $_SESSION['erro'];
                unset($_SESSION['erro']);
            }
            ?>                                             
                                            </div>
        </div>
        
<?php include("../../fix/private-footer.php"); ?> 
        
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/jquery-1.11.1.min.js"><\/script>')</script>

        <!-- Bootsrap javascript file -->
        <script src="../../assets/js/bootstrap.min.js"></script>

        <!-- PrettyPhoto javascript file -->
        <script src="../../assets/js/jquery.prettyPhoto.js"></script>

        <!-- Template main javascript -->
        <script src="../../assets/js/main.js"></script>

    </body>
</html>