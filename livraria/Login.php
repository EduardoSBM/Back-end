<!DOCTYPE html>
<html>

<head>
    <title>HTML Login Form</title>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <div class="main">
        <h1>My Book</h1>
        <h3>Cadastro:</h3>
        <form action="" method="POST">
            <label for="first">
                Nome:
            </label>
            <input type="text" id="first" name="login" placeholder="Digite seu nome" required>

            <label for="password">
                Senha:
            </label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>

            <div class="wrap">
                <button type="submit" name="conectar" id="conectar">
                Submit
                </button>
            </div>
        </form>
        <p>
            <a href="#" style="text-decoration: none;">
                Esqueceu a senha?
            </a>
        </p>
    </div>

    <?php
    if (isset($_POST['conectar'])) {
        $connect = mysqli_connect('localhost', 'root', '', 'livraria');

        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $login = mysqli_real_escape_string($connect, $_POST['login']);
        $senha = mysqli_real_escape_string($connect, $_POST['password']);

        $sql = "SELECT * FROM usuario WHERE login='$login' AND senha='$senha'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) == 0) {
            echo "login ou senha inválidos";
        } else {
            session_start();
            $_SESSION['login'] = $login;
            header("Location: menu.html");
        }

        mysqli_close($connect);
    }
    ?>
</body>

</html>
