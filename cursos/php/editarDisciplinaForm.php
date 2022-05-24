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
</style>

<body>

    <?php
        require_once("conexaoBanco.php");
        $idDisciplinas = $_POST['idDisciplinas'];

        $comando="SELECT * FROM disciplinas WHERE idDisciplinas=".$idDisciplinas;

        $resultado=mysqli_query($conexao,$comando);
        $c=mysqli_fetch_assoc($resultado);

    ?>

    <main>
        <section>
            <div>
                <h1>Edição disciplinas</h1>
                <form action="editarDisciplina.php" method="post">
                    <input type="hidden" value="<?=$c['idDisciplinas']?>" name="idDisciplinas">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <h5>Nome da disciplina</h5>
                        </label>
                        <input type="text" value="<?=$c['nome']?>" class="form-control" id="exampleFormControlInput1" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <h5>Carga horária</h5>
                        </label>
                        <input type="number" value="<?=$c['cargaHoraria']?>" class="form-control" name="cargaHoraria">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">
                            <h5>Sigla</h5>
                        </label>
                        <input type="text" value="<?=$c['sigla']?>" class="form-control" name="sigla">
                    </div>
                    <button type="reset" class="btn btn-danger">Limpar</button>
                    <button type="submit" class="btn btn-success">Editar</button>
                </form>
            </div>

            <img src="../books_study_icon.png" alt="">

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</html>