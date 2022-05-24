<?php


require_once("conexaoBanco.php");

$nome=$_POST['nome'];
$cargaHoraria=$_POST['cargaHoraria'];
$sigla=$_POST['sigla'];

$comando="INSERT INTO disciplinas (nome,cargaHoraria,sigla) VALUES('".$nome."',".$cargaHoraria.",'".$sigla."')";

$resultado = mysqli_query($conexao, $comando);


var_dump($resultado);

if($resultado==true){
    header("Location: ../disciplinaForm.php?retorno=1");
    //echo "Disciplina Cadastrada com sucesso!";
}else{
    header("Location: ../disciplinaForm.php?retorno=2");
    //echo "Houve algum problema ao cadastrar a disciplina!";
}

?>