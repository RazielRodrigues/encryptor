<?php
if (isset($_POST['message'])) {
    $message = $_POST['message'];

    $res = openssl_pkey_new(array(
        "digest_alg" => "sha512",
        "private_key_bits" => 512,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ));

    openssl_pkey_export($res, $privKey);
    $pubKey = openssl_pkey_get_details($res);
    $pubKey = $pubKey["key"];

    openssl_public_encrypt($message, $encrypted, $pubKey);
}

if (isset($_POST['message']) && isset($_POST['key'])) {
    $key = base64_decode($_POST['key']);
    $message = base64_decode($_POST['message']);

    openssl_private_decrypt($message, $decrypted, $key);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeMessage - Mensagens Criptografadas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #000000;
            /* Fundo preto */
            color: #00ff00;
            /* Verde estilo Matrix */
            font-family: 'Consolas', monospace;
            /* Fonte estilo digital */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-size: cover;
        }

        .hero {
            background-color: rgba(0, 0, 0, 0.8);
            /* Fundo preto com transparência */
            padding: 40px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 0 2px #00ff00;
        }

        .hero h1 {
            font-size: 3em;
            color: #00ff00;
            text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00;
        }

        .hero p,
        button {
            font-size: 1.2em;
            color: #00ff00;
            background-color: transparent;
        }

        .content-section {
            background-color: rgba(0, 0, 0, 0.8);
            /* Fundo preto com transparência */
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 0 2px #00ff00;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hero">
            <h1>Encryptor</h1>
        </div>

        <div class="content-section">
            <ol>
                <li>
                    Gerar suas chaves
                </li>
                <li>
                    Salvar suas chaves
                </li>
                <li>
                    Escrever sua mensagem
                </li>
                <li>
                    Encryptar sua mensagem
                </li>
                <li>
                    Compartilhar sua mensagem
                </li>
                <li>
                    Encryptar
                </li>
                <li>
                    Decryptar
                </li>
            </ol>
        </div>

        <!-- Formulário para Criptografar -->
        <form method="post">
            <textarea name="message" placeholder="Digite sua mensagem para criptografar"></textarea>
            <div>
                <button type="submit">Encrypt</button>
            </div>
        </form>

        <hr>

        <?php if (isset($privKey)) {  ?>
            <h2>*Salve as chaves para usar depois</h2>
            <div class="content-section">
                <?php echo base64_encode($privKey); ?>
            </div>
            <div class="content-section">
                <?php echo base64_encode($pubKey); ?>
            </div>
            <?php if (isset($encrypted)) {  ?>
                <div class="content-section">
                    <?php echo base64_encode($encrypted); ?>
                </div>
            <?php } ?>
        <?php } ?>

        <hr>

        <!-- Formulário para Descriptografar -->
        <form method="post">
            <textarea name="message" placeholder="Digite a mensagem criptografada"></textarea>
            <textarea type="key" name="key" placeholder="Digite a chave de criptografia"></textarea>
            <div>
                <button type="submit">Decrypt</button>

            </div>
        </form>

        <?php if (isset($decrypted)) {  ?>
            <div class="content-section">
                <?php echo $decrypted; ?>
            </div>
        <?php } ?>

    </div>

</body>

</html>