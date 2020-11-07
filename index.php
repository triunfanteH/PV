 <?php
//capturo os campos enviados via post da propria pag e salvo em variáveis
$nome = filter_input(INPUT_POST,"nome");
$senha = filter_input(INPUT_POST,"senha");
$med="";
$msg="";
//quando existir algo em $nome
if($nome){
  require '../lib/Connection.php';
  $conexao = new Connection();
  //pego tudo de paciente que tiver o nome e senha com o que foi solicitado
  $sql ='select * from usuarios where nome=:nome and senha =:senha';
  $salt='GFE%$#¨Y(Juge56GUh7y7tg6f85ddeMINHA ROLA';
  $rs =$conexao->prepare($sql);
  $rs->bindParam(':nome',$nome);
  $rs->bindParam(':senha',$senha);
  $rs->execute();
  $row = $rs->fetch(PDO::FETCH_OBJ);
//se sair algo eu crio a sessão logado com o id do mesmo se não mando uma msg de erro
 if($row){
    session_start();
    $_SESSION['logado'] =$row->id;
    header('Location:../indexLogado.php');
  }else{
    $msg ='<div class="alert alert-danger">Dados não conferem!</div>';
  }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <title>PortalDeVendas</title>
    <link href="assets/bootstrap-4.1.3-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
  </head>

  <body>
    <div style="text-align: center;width: 20%;margin-left: 40%; margin-top: 12%">
      <form class="form-signin" method="post">
      
        <img src="img/logo.png" alt="Logotipo" style="margin-left: -17%" width="500" height="200">
        <h1 class="h3 mb-3 font-weight-normal">Portal De Vendas</h1>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input name="nome" type="email" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus style="margin-bottom: 5%">
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <div class="checkbox mb-3"></div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
      </form>
    </div>
  </body>
</html>