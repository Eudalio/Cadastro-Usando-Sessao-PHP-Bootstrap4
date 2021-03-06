<?php 
  session_start();
  require_once('estados.php');
  $pessoas = [];
  if (isset($_SESSION['cadastropessoal'])){
    $pessoas = $_SESSION['cadastropessoal'];
  }
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Pessoas</title>

    <!-- Bootstrap core CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Cadastro de Pessoas</a>
      
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link active" href="listar.php">Listar <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastrar.php">Cadastrar</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nome</th>
              <th scope="col">Idade</th>
              <th scope="col">Telefone</th>
              <th scope="col">Endereco</th>
              <th scope="col">Cidade</th>
              <th scope="col">Estado</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
<?php
            foreach($pessoas as $i => $pessoa){
              echo "<tr>";
              echo "<th scope='row'>" . $i . "</th>";
              foreach($pessoa as $atr => $value){
                $uf = $estados[$pessoa['estado']];
                if($atr == 'id')
                  continue;
                if($atr == 'estado'){
                  echo "<td>" . $uf . "</td>";
                  continue;
                }
                echo "<td>" . $value . "</td>";                
              }
              echo "<td><a class='btn btn-danger apagar' href='apagar.php?id=" . $i . "'> <i class='fa fa-trash-o fa-lg'></i></a>" .
              "<a class='btn btn-warning' href='cadastrar.php?id=" . $i . "'> <i class='fa fa-pencil fa-lg'></i></a></td>";
              echo "</tr>";
            }
?>
          </tbody>
        </table>
      </div>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
