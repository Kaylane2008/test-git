<?php
  include("conexao.php");

  if(isset($_GET['deletar'])){
    $id = intval($_GET['deletar']);
    include("conexao.php");
    $sql_query = $mysqli->query("SELECT * FROM arquivos WHERE id = '$id'") or die($mysqli->error);
    $arquivos = $sql_query->fetch_assoc();

    if(unlink($arquivos['path'])){
    $deu_certo = $mysqli->query(" DELETE FROM arquivos WHERE `arquivos`.`id` = '$id'") or die($mysqli->error);
    if($deu_certo)
    echo "<p> arquivo excluido</p>";
    }
  }


function enviarArquivos($error, $size, $name, $tmp_name){

    include("conexao.php");

        if ($error)
            die("falha ao enviar arquivo");
        
        if ($size > 2097152)
            die("Arquivo muito grande!! Max: 2MB");

        $pasta = "arquivos/";
        $nomeArquivo =  $name;
        $nvNomeArq = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'jpeg')
            die("formato do arquivo é incompativel, tente jpg ou png!");

        $path = $pasta . $nvNomeArq . "." . $extensao;
        $deu_certo = move_uploaded_file($tmp_name, $path);

        if ($deu_certo) {
            $mysqli->query("INSERT INTO arquivos (nome, path) VALUES('$nomeArquivo', '$path')") or die($mysqli->error);
            return true;
         echo "<p> Arquivo enviado com sucesso!> </p>";
        } else
            return false;
         echo "falha ao enviar arquivo";
    }

   if (isset($_FILES['arquivos'])) {
    $arquivos = $_FILES['arquivos'];
    $tudo_certo = true; 
    foreach($arquivos['name'] as $index => $arq){
       $deu_certo = enviarArquivos($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index]); 
   if(!$deu_certo)
    $deu_certo = false;
    }
  if($tudo_certo)
  echo "<p> todos os arquivos foram enviados com sucesso";
    else 
    echo "<p> falha ao enviar um ou mais arquivos";

}

$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="">
        <p> <label for="">Selecione o arquivo</label>
            <input multiple name="arquivos[]" type="file">
        </p>
        <button name="upload" type=submit>Enviar arquivo</button>
    </form>
    <h1>lista de arquivos</h1>
    <p>

        <!-- começo da tabela -->

    <table border="4" , cellpadding="10">

        <thead>
            <th>preview</th>
            <th>arquivo</th>
            <th>data de envio</th>
            <th>delet</th>
        </thead>

        <tbody>
            <?php
            // laco de repeticao pra puxar as img 
            while ($arquivos = $sql_query->fetch_assoc()) {
            ?>
                <tr>
                    <td><a target="_blank" href="<?php echo $arquivos['path']; ?>"> <img height="60" src="<?php echo $arquivos['path']; ?>" alt=""></a></td>
                    <td><a target="_blank" href="<?php echo $arquivos['path']; ?>"> <?php echo $arquivos['nome']; ?> </a></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($arquivos['data_upload'])); ?></td>
                    <th><a href="index.php?deletar=<?php echo $arquivos['id']; ?>">deletar</a></th>
              
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- fim da tabela  -->
</body>

</html>