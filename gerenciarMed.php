<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Sirlene Costura & Confecção - Ver</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- PrettyPhoto -->
        <link rel="stylesheet" href="assets/css/prettyPhoto.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Modernizr -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
        
        <!-- Ordenar Tabela JS -->
        <script src="assets/js/sorttable.js"></script>

<?php include("./fix/header.php"); ?>
    
    <body>
        <div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title">Gerenciar Medidas <span class="title-under"></span></h1>
			<p class="page-description">
				Listadas abaixo, todos as medidas cadastradas.
			</p>			
		</div>
	</div>
            <div class="container">
            <div class="row">
<?php include("./fix/welcome.php"); ?>
            </div>
                <p><a style="text-decoration: underline" href="cad.php">Funções</a> &raquo; <a style="text-decoration: underline" href="gerenciaH.php">Gerenciar</a> &raquo; 
                    <b><a style="text-decoration: underline" href="manageMed.php">Medidas</a></b></p>
            </div>
        				<div class="main-container">
                                            <div class="container">                                            
                                            <div class="col-md-12 col-sm-12">

					<h2 class="title-style-2">Medidas <span class="title-under"></span></h2>

						<table class="table table-style-1 sortable">
					      <thead>
					        <tr>
					          <th style="text-align:center;">ID Medida</th>
					          <th style="text-align:center;">ID Cliente</th>
                                                  <th style="text-align:center;">Ver</th>
                                                  <th style="text-align:center;">Relatório</th>
                                                  <th style="text-align:center;">Editar</th>
                                                  <th style="text-align:center;">Excluir</th>
					        </tr>
					      </thead>
					      <tbody>
                                                    <?php
                                                      foreach($dadosmed as $i=>$v) {
                                                        echo "<tr>";
                                                        foreach ($v as $i2 => $v2) {
                                                          echo "<td style='text-align:center;'>$v2</td>";
                                                        }
                                                        echo "<td style='text-align:center;'><a  class='btn btn-info' href='detailsMed.php?idmedida={$v[0]}&idcliente={$v[1]}'><i class='fa fa-user'></i></a></td>";
                                                        echo "<td style='text-align:center;'><a target='_blank' class='btn btn-default' href='pdfMed.php?idmedida={$v[0]}&idcliente={$v[1]}'><i class='fa fa-file-pdf-o'></i></a></td>";
                                                        echo "<td style='text-align:center;'><a  class='btn btn-success' href='editMed.php?idmedida={$v[0]}&idcliente={$v[1]}'><i class='fa fa-pencil-square-o'></i></a></td>";
                                                        echo "<td style='text-align:center;'><a  class='btn btn-danger' href='deleteMed.php?idmedida={$v[0]}&idcliente={$v[1]}'><i class='fa fa-remove'></i></a></td>";                                                        
                                                      }
                                                    ?>
					      </tbody>
					    </table>
                                            </div>  
                                            </div>
        </div>
        
<?php include("./fix/private-footer.php"); ?> 
        
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

        <!-- Bootsrap javascript file -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- PrettyPhoto javascript file -->
        <script src="assets/js/jquery.prettyPhoto.js"></script>

        <!-- Template main javascript -->
        <script src="assets/js/main.js"></script>

    </body>
</html>