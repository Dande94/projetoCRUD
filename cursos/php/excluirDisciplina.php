<?php
require_once("conexaoBanco.php");

$idDisciplinas=$_POST['idDisciplinas'];

$verCursos="SELECT disciplinas_idDisciplinas FROM disciplinas_has_cursos WHERE disciplinas_idDisciplinas =".$idDisciplinas;

$resCursos=mysqli_query($conexao,$verCursos);

$linhasCursos=mysqli_num_rows($resCursos);

if($linhasCursos>0){
    header("Location: ../disciplinaForm.php?retorno=5");
    //echo"Não pode ser excluído pois a disciplina está alocada dentro de um curso!";
}else{
    $comando="DELETE FROM disciplinas WHERE idDisciplinas=".$idDisciplinas;
    $resultado=mysqli_query($conexao,$comando);
    if($resultado==true){
        header("Location: ../disciplinaForm.php?retorno=3");
        //echo "Disciplina exclúida com sucesso!";
    }else{
        header("Location: ../disciplinaForm.php?retorno=4");
        //echo"Houve um problema ao exclúir a desciplina!";
    }
}

?>