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
        <form action="">
            <label for="first">
                  Nome:
              </label>
            <input type="text" 
                   id="first"
                   name="first" 
                   placeholder="Digite seu nome" required>

            <label for="password">
                  Senha:
              </label>
            <input type="password"
                   id="password" 
                   name="password" 
                   placeholder="Digite sua senha" required>

            <div class="wrap">
                <button type="Cadastrar"
                        onclick="solve()">
                    Submit
                </button>
            </div>
        </form>
        <p>
              <a href="#" 
               style="text-decoration: none;">
                Esqueceu a senha?
            </a>
        </p>
    </div>
</body>

</html>
