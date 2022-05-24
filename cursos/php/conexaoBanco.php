<?php

$local="127.0.0.1:3307"; //dependendo da onde estiver codando reajustar o local;
$usuario="root";
$senha=""; //dependendo da onde estiver codando reajustar a senha;
$banco="cursos";

$conexao=mysqli_connect($local,$usuario,$senha,$banco);

mysqli_set_charset($conexao, "utf8");


?>