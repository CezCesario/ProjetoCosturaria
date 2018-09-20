<?PHP
        //Criar a conexão
include_once("admin/functions/conexao.php");
$conexao = abreConexao();
$banco = mysqli_select_db($conexao,'epiz_22699421_confeccao') or die("Erro ao selecionar o banco de dados");
# Validar os dados do usuário

function anti_sql_injection($string)
	{
        $conexao = abreConexao();
        $banco = mysqli_select_db($conexao,'epiz_22699421_confeccao') or die("Erro ao selecionar o banco de dados");
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($conexao,$string);
		return $string;
	}

$sql = mysqli_query($conexao,"SELECT * FROM KACCESSK WHERE usuario='".anti_sql_injection($_POST['usuario'])."' AND senha='".anti_sql_injection($_POST['senha'])."' LIMIT 1") or die("Erro na ação.");
$linhas = mysqli_num_rows($sql);
if($linhas == '')
	{            
            session_start();            
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Usuário e/ou senha inválido.</div>";       
            header('Location: login.php');
	}
else
	{
		while($dados=mysqli_fetch_assoc($sql))
			{
				session_start();
				$_SESSION['usuarioNome'] = $dados['nome'];
				$_SESSION['usuarioAcesso'] = $dados['ACESSO'];
				header("Location: ./admin/home.php");
			}
	}
?>