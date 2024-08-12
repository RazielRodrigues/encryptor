<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;

$finder = new Finder();
$finder->in('./vendor');

$request = Request::createFromGlobals();

$text = $request->request->get('text');
$name = $request->request->get('name');

$config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 4096,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

$data = json_decode(file_get_contents('db.json'), true);


if (isset($data[$name]['pri'])) {
    $privKey = $data[$name]['pri'];
    $pubKey = $data[$name]['pub'];
} else {
    // Create the private and public key
    $res = openssl_pkey_new($config);

    // Extract the private key from $res to $privKey
    openssl_pkey_export($res, $privKey);

    // Extract the public key from $res to $pubKey
    $pubKey = openssl_pkey_get_details($res);
    $pubKey = $pubKey["key"];
}


if ($text &&  $name) {
    // Encrypt the data to $encrypted using the public key
    openssl_public_encrypt($text, $encrypted, $pubKey);

    // Decrypt the data using the private key and store the results in $decrypted
    openssl_private_decrypt($encrypted, $decrypted, $privKey);

    $data[$name]['name'] = $name;
    $data[$name]['messages'][] = base64_encode($encrypted);

    file_put_contents('db.json', json_encode($data));
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Form</title>
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

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .hero {
            background-color: #ffefd5;
            padding: 50px 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .hero h1 {
            font-family: 'Pacifico', cursive;
            font-size: 2.5em;
            color: #ff6347;
        }

        .card-header {
            background-color: #ffdead;
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
        }

        .sidebar-menu ul li {
            margin: 15px 0;
        }

        .sidebar-menu ul li a {
            color: white;
            text-decoration: none;
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

    <div class="container mt-5">
        <!-- Hero Section -->
        <div class="hero">
            <h1>Submit Your Message</h1>
            <p>Envie sua mensagem de forma segura e protegida!</p>
        </div>

        <!-- Form Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Submit Your Message</h3>
            </div>
            <div class="card-body">
                <form action="/controller.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                        <input required type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">Message<span class="text-danger">*</span></label>
                        <textarea required name="text" class="form-control" id="text" rows="4" placeholder="Write your message here"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>

        <!-- Messages Table Section -->
        <?php

        if (!empty($data)) {
        ?>
            <div class="card">
                <div class="card-header">
                    <h3>Messages</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $user) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user['name'] ?? 'aa'); ?></td>

                                    <td><?php echo htmlspecialchars(count($user['messages'])); ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        } else {
            echo '<div class="alert alert-info" role="alert">No messages to display.</div>';
        }
        ?>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>© 2024 SafeMessage - Sua comunicação segura e divertida 💬</p>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js and Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>