<?php

session_start();
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('revenda');

if(isset($_POST['gravar']))
{
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];

    $foto1 = $_FILES['foto1'];
    $foto2 = $_FILES['foto2'];

    $diretorio ="fotos/";
    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time()).$extensao1;
    move_uploaded_file($_FILES['foto1']['tmp_name'],$diretorio.$novo_nome1);

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time()).$extensao2;
    move_uploaded_file($_FILES['foto2']['tmp_name'],$diretorio.$novo_nome2);

    $sql = "INSERT INTO veiculo (codigo,descricao,codmodelo,ano,cor,placa,opcionais,valor,foto1,foto2)
    VALUES ('$codigo','$descricao', '$codmodelo', '$ano', '$cor', '$placa', '$opcionais', '$valor','$novo_nome1','$novo_nome2')";

   ECHO $sql;
    $resultado = mysql_query($sql);

    if($resultado === TRUE)
    {
        echo 'Cadastro realizado com Sucesso';
    }
    else
    {
        echo 'Erro ao gravar dados.';
    }
}  

if (isset($_POST['pesquisar']))
{
   $sql = mysql_query("SELECT codigo,descricao,codmodelo,
                       ano,cor,placa,opcionais,valor,foto1,foto2
                       FROM veiculo");

   echo "<b>Veiculos Cadastrados:</b><br><br>";
   while ($dados = mysql_fetch_object($sql))
	{
               echo "Codigo     :".$dados->codigo."  ";
               echo "Descri  o  :".$dados->descricao." ";
               echo "Cod Modelo :".$dados->codmodelo."<br>";
               echo "Ano :       ".$dados->ano." ";
               echo "Cor :       ".$dados->cor." ";
               echo "Placa :     ".$dados->placa."<br>";
               echo "Opcionais : ".$dados->opcionais." ";
               echo "Valor R$  : ".$dados->valor."<br>";
   			   echo '<img src="fotos/'.$dados->foto1.'"  height="100" width="100" />'." ";
   			   echo '<img src="fotos/'.$dados->foto2.'"  height="100" width="100" />'."<br><br>";
	}
}
?>
