<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="Author" content="Anderson Nunes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="report_icon.png" type="image/x-icon">
    <title>Cadastro de Disciplinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: monospace;
    }

    body {
        margin-top: 40px;
        display: flex;
        justify-content: center;
        background-color: #999;
    }

    form {
        width: 400px;
    }

    main {
        width: 1000px;
    }

    main section {
        display: flex;
        justify-content: space-between;
    }

    section img {
        width: 400px;
    }
    .buttom{
        display:inline;
    }
    thead{
        background-color:#DDD;
    }
    tr:nth-child(even){
        background-color:#ccc;
    }
</style>

<body>
    <?php
    if(isset($_GET['retorno'])==true){
        $retorno=$_GET['retorno'];
        if($retorno=='1'){
            echo "<script>
            alert('Disciplina Cadastrada com sucesso!');
            </script>";
        }elseif($retorno=='2'){
            echo "<script>
            alert('Houve algum problema ao cadastrar a disciplina!');
            </script>";
        }elseif($retorno=='3') {
            echo "<script>
            alert('Disciplina exclúida com sucesso!');
            </script>";
        }elseif($retorno=='4') {
            echo "<script>
            alert('Houve um problema ao exclúir a desciplina!');
            </script>";
        }elseif($retorno=='5') {
            echo "<script>
            alert('Não pode ser excluído pois a disciplina está alocada dentro de um curso!');
            </script>";
        }elseif($retorno=='6') {
            echo "<script>
            alert('Disciplina editada com sucesso!');
            </script>";
        }else{
            echo "<script>
            alert('Houve um problema ao editar a disciplina!');
            </script>";
        }
    }
    ?>
    <main>
        <section>
            <div>
                <h1>Cadastro de Disciplinas</h1>
                <form action="php/cadastrarDisciplina.php" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <h5>Nome da disciplina</h5>
                        </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <h5>Carga horária</h5>
                        </label>
                        <input type="number" class="form-control" name="cargaHoraria">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <h5>Sigla</h5>
                        </label>
                        <input type="text" class="form-control" name="sigla">
                    </div>
                    <button type="reset" class="btn btn-danger">Limpar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>

            <img src="books_study_icon.png" alt="">

        </section>
        <form action="#" method="get">
            <div class="mb-2">
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">
                        <h4>Busque pelo nome</h4>
                    </label>
                    <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="nomeBusca">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <th>
                    <h5><strong>Nome</strong></h5>
                </th>
                <th>
                    <h5><strong>Carga horária</strong></h5>
                </th>
                <th>
                    <h5><strong>Sigla</strong></h5>
                </th>
                <th>
                    <h5><strong>Ações</strong></h5>
                </th>
            </thead>

            <?php
                require_once("php/conexaoBanco.php");

                $comando="SELECT * FROM disciplinas";

                if(isset($_GET['nomeBusca'])==true && $_GET['nomeBusca']!=""){
                    echo "qualquer";
                    $pesquisa=$_GET['nomeBusca'];
                    $comando="SELECT * FROM disciplinas WHERE nome LIKE '".$pesquisa."%'";
                }
                $resultado=mysqli_query($conexao,$comando);
                $linhas=mysqli_num_rows($resultado);

                if($linhas==0){
                    echo"<tr><td colspan='4'><h5>Nenhum resultado encontrado</h5></td></tr>"; 
                }else{
                    $disciplinasRetornadas=array();
                    while($c=mysqli_fetch_assoc($resultado)){
                        array_push($disciplinasRetornadas,$c);
                    }
                    foreach($disciplinasRetornadas as $c){
                        echo"<tr>";
                            echo"<td><h5>".$c['nome']."</h5></td>";
                            echo"<td><h5>".$c['cargaHoraria']." horas </h5></td>";
                            echo"<td><h5>".$c['sigla']."</h5></td>";
                            echo"<td>";
                    
                

            ?>
            <form class="buttom" action="php/editarDisciplinaForm.php" method="post">
                <input type="hidden" name="idDisciplinas" value="<?=$c['idDisciplinas']?>">
                <button class="btn-primary btn-sm text-light" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg>
                </button>
            </form>

            <form class="buttom" action="php/excluirDisciplina.php" method="post">
                <input type="hidden" name="idDisciplinas" value="<?=$c['idDisciplinas']?>">
                <button class="btn-danger btn-sm" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path
                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                    </svg>

                </button>
            </form>
            <?php
                                        echo"</td>";
                                    echo"</tr>";
                        }
                }    
                                ?>
        </table>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</html>