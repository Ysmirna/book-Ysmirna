<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="books.css">
    <script src="js/updateMark.js" defer></script>
    <script src="js/book.js" defer></script>
    <title>Books</title>
</head>
<body>
    <header class="p-relative">
        <aside class="p-absolute">
            <form action="">
                <div class="form-group">
                    <label for="txt_email">e-mail</label>
                    <input type="email" name="txt_email" 
                        id="txt_email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt_senha">Senha</label>
                    <input type="password" name="txt_senha" 
                        id="txt_senha" class="form-control">
                </div>
                <a href="#">Esqueci a senha</a>
                <div class="form-group">
                    <input type="submit" value="Login" 
                    class="btn btn-primary">
                    <a href="#" class="btn btn-primary">Cadastre-se</a>
                </div>
            </form>
        </aside>
        <h1>Books</h1>
    </header>
    <main>
        <form action="" class="form-inline justify-content-center">
            <div class="form-group">
                <input type="text" name="txt_livro" 
                    id="txt_livro" class="form-control">
                <input type="button" value="Salvar"
                    class="btn btn-primary">
            </div>
        </form>
        <div id="livros">
            <?php
            require_once "Conexao.php";

            $sql = "select * from book;";

            if(!Conexao::execWithReturn($sql)){
                echo Conexao::getErro();
                exit(1);
            }
            $dados = Conexao::getData();
            foreach($dados as $livro):
            
            ?>
            <section class="d-flex">
                <div class="livro-imagem">
                    <img src="img/livro.png" alt="Imagem do livro">
                </div>
                <div class="livro-contexto">
                    <p class="livro-dados">
                        Livro:
                        <span id="livro-nome">
                            <?= $livro["nome"]; ?>
                        </span>
                    </p>
                    <p class="livro-dados">
                        Páginas:
                        <span id="livro-paginas">
                            <?= $livro["paginas"]; ?>
                        </span>
                    </p>
                    <p class="livro-dados">
                        Autor/a/as/es:
                        <span id="livro-autores">
                            <?= $livro["autor"]; ?>
                        </span>
                    </p>
                </div>
                <div class="livro-marcos">
                    <div onclick="updateMark(this)">
                        <span class="material-icons">
                            book
                        </span>
                        <span class="round">
                            12
                        </span>
                    </div>
                    <div onclick="updateMark(this)">
                        <span class="material-icons">
                            favorite
                        </span>
                        <span class="round">
                            12
                        </span>
                    </div>
                </div>
            </section>
            <?php
            //}//foreach
            endforeach;
            ?>
        </div>
        <section>
            <article>
                <div>
                    <img src="img/livro.png" alt="Foto do livro">
                </div>
                <div class="livro-dados">
                    <h3>Livro: <span>A Redoma de Vidro</span></h3>
                    <h3>Páginas: <span>275</span></h3>
                    <h3>Autor/a/as/es: <span>Sylvia Plath</span></h3>
                </div>
                <div>
                    <div class="marcador">
                        <span class="material-icons">book</span>
                        <span class="contador">12</span>
                    </div>
                    <div class="marcador">
                        <span class="material-icons">favorite</span>
                        <span class="contador">12</span>
                    </div>
                </div>
            </article>
        </section>
    </main>
    
</body>
</html>