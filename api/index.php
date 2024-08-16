<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeMessage - Mensagens Criptografadas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
            color: #333;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .hero {
            background-color: #ffefd5;
            padding: 50px 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .hero img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-family: 'Pacifico', cursive;
            font-size: 3em;
            color: #ff6347;
        }

        .features {
            display: flex;
            justify-content: space-around;
            text-align: center;
        }

        .feature-box {
            background-color: #ffe4e1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            margin: 10px;
        }

        .feature-box img {
            max-width: 80px;
            margin-bottom: 15px;
        }

        .feature-box h3 {
            margin-bottom: 10px;
        }

        .footer {
            background-color: #ffdead;
            padding: 15px;
            text-align: center;
            margin-top: auto;
            border-radius: 10px;
        }

        /* Sidebar Menu */
        #menu-toggle {
            display: none;
        }

        .menu-icon {
            cursor: pointer;
            font-size: 24px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .sidebar-menu {
            background-color: #333;
            color: white;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 999;
        }

        #menu-toggle:checked+.sidebar-menu {
            transform: translateX(0);
        }

        .sidebar-menu ul {
            list-style-type: none;
            padding: 0;
            margin-top: 50px;
        }

        .sidebar-menu ul li {
            margin: 15px 0;
        }

        .sidebar-menu ul li a {
            color: white;
            text-decoration: none;
        }

        /* Custom Section Styles */
        .content-section {
            padding: 20px;
            background-color: #fafad2;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .code-section {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        code {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            display: block;
        }
    </style>
</head>

<body>
    <!-- Menu Toggle Button -->
    <label class="menu-icon" for="menu-toggle">☰ Menu</label>
    <input type="checkbox" id="menu-toggle">

    <!-- Sidebar Menu -->
    <div class="sidebar-menu">
        <ul>
            <li><a href="#">Início</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Funcionalidades</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <img src="https://via.placeholder.com/150?text=🔐" alt="Cadeado Emoji" class="img-fluid">
            <h1>SafeMessage 🔐</h1>
            <p>Comunique-se com segurança usando mensagens criptografadas e protegidas.</p>
            <a href="/controller.php" class="btn btn-primary btn-lg">Comece Agora</a>
        </div>

        <!-- Content Section -->
        <div class="content-section">
            <h2>Segurança na Comunicação</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget quam id eros facilisis dignissim. Fusce fermentum sapien non arcu ullamcorper, ac tincidunt nunc cursus. Integer gravida elit eu suscipit laoreet.</p>
        </div>

        <!-- Features Section -->
        <div class="features row">
            <div class="feature-box col-md-4">
                <img src="https://via.placeholder.com/80?text=🔒" alt="Emoji de Cadeado Aberto">
                <h3>Criptografia Forte 🔒</h3>
                <p>Proteja suas mensagens com a mais recente tecnologia de criptografia.</p>
            </div>
            <div class="feature-box col-md-4">
                <img src="https://via.placeholder.com/80?text=🛡️" alt="Emoji de Chave">
                <h3>Segurança Total 🛡️</h3>
                <p>Garanta que apenas o destinatário correto possa ler sua mensagem.</p>
            </div>
            <div class="feature-box col-md-4">
                <img src="https://via.placeholder.com/80?text=📧" alt="Emoji de Mensagem">
                <h3>Fácil de Usar 📧</h3>
                <p>Envie mensagens seguras de forma simples e intuitiva.</p>
            </div>
        </div>



        <!-- Code Section -->
        <div class="row code-section">
            <div class="col-md-6">
                <h3>Exemplo de Código HTML</h3>
                <code>
                    &lt;div&gt;
                    &lt;h1&gt;SafeMessage&lt;/h1&gt;
                    &lt;p&gt;Mensagem criptografada segura&lt;/p&gt;
                    &lt;/div&gt;
                </code>
            </div>
            <div class="col-md-6">
                <h3>Outro Exemplo</h3>
                <code>
                    &lt;button&gt;Clique Aqui&lt;/button&gt;
                    &lt;p&gt;Proteja suas mensagens&lt;/p&gt;
                </code>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>© 2024 SafeMessage - Sua comunicação segura e divertida 💬</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>