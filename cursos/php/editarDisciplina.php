TA DANDO ERRO AINDA!! VOLTAR E CONSERTAR

<?php
require_once("conexaoBanco.php");

$idDisciplinas =$_POST['idDisciplinas'];
$nome=$_POST['nome'];
$cargaHoraria=$_POST['cargaHoraria'];
$sigla=$_POST['sigla'];

$comando="UPDATE disciplinas SET nome='".$nome."', cargaHoraria=".$cargaHoraria.", sigla='".$sigla."' WHERE idDisciplinas=".$idDisciplinas;

//echo $comando;

$resultado=mysqli_query($conexao,$comando);

if($resultado==true){
    header("Location: ../disciplinaForm.php?retorno=6");
    //echo"Disciplina editada com sucesso!";
}else{
    header("Location: ../disciplinaForm.php?retorno=7");
    //echo"Houve um problema ao editar a disciplina!";
}


?>