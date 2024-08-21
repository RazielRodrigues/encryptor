<?php
$error = null;

if (!empty($_POST['toEncrypt'])) {
    $message = $_POST['toEncrypt'];

    $res = openssl_pkey_new(array(
        "digest_alg" => "sha512",
        "private_key_bits" => 512,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ));

    openssl_pkey_export($res, $privKey);
    $pubKey = openssl_pkey_get_details($res);
    $pubKey = $pubKey["key"];

    if (!openssl_public_encrypt($message, $encrypted, $pubKey)) {
        $error = 'Failure during encryption of your message!';
    }
}

if (!empty($_POST['message']) && !empty($_POST['key'])) {
    $key = base64_decode($_POST['key']);
    $message = base64_decode($_POST['message']);

    if (!openssl_pkey_get_private($key)) {
        $error = 'Your key is invalid!';
    } else {
        openssl_private_decrypt($message, $decrypted, $key);

        if (!$decrypted) {
            $error = 'Failure during decryption of your message!';
        }
    }
}

if (openssl_error_string()) {
    $error = openssl_error_string();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ENCRYPTOR</title>
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
            margin-top: 3rem;
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

        @keyframes glow {
            0% {
                text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 20px #00ff00, 0 0 30px #00ff00, 0 0 40px #00ff00, 0 0 50px #00ff00, 0 0 60px #00ff00, 0 0 70px #00ff00;
            }

            50% {
                text-shadow: 0 0 10px #00ff00, 0 0 20px #00ff00, 0 0 30px #00ff00, 0 0 40px #00ff00, 0 0 50px #00ff00, 0 0 60px #00ff00, 0 0 80px #00ff00, 0 0 100px #00ff00;
            }

            100% {
                text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 20px #00ff00, 0 0 30px #00ff00, 0 0 40px #00ff00, 0 0 50px #00ff00, 0 0 60px #00ff00, 0 0 70px #00ff00;
            }
        }

        h1 {
            font-size: 3em;
            color: #fff;
            text-align: center;
            animation: glow 1.5s infinite alternate;
        }

        #charCount {
            font-size: 0.9em;
            margin-top: 5px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hero">
            <h1>THE ENCRYPTOR</h1>
        </div>

        <form method="post">
            <label for="toEncrypt">What to encrypt?</label>
            <textarea maxlength="50" id="toEncrypt" name="toEncrypt" rows="2" style="width: 100%;" required></textarea>
            <h3 id="charCount">50 characters remaining</h3> <!-- Character counter -->
            <div>
                <button type="submit">Encrypt</button>
            </div>
        </form>

        <hr>

        <div class="row" id="download">

            <div class="col-6">
                <?php if (!empty($privKey)) {  ?>

                    <div>
                        <label for="decryptkey">Key to decrypt</label>
                        <textarea id="decryptkey" disabled="true" rows="10" style="width: 100%;"><?php echo base64_encode($privKey); ?></textarea>
                    </div>


                <?php } ?>
            </div>

            <div class="col-6">

                <?php if (!empty($encrypted)) {  ?>
                    <div>
                        <label for="result">Result</label>
                        <textarea id="result" disabled="true" rows="10" style="width: 100%;"><?php echo base64_encode($encrypted); ?></textarea>
                    </div>
                <?php } ?>
            </div>

        </div>

        <div class="row <?php if (empty($encrypted)) {  ?> d-none <?php } ?>">

            <div class="col-12">
                <button id="download-button" type="submit">Save for later</button>
            </div>

        </div>

        <hr>

        <form method="post">
            <div class="row">

                <div class="col-6">
                    <label for="key">Decryption key</label>
                    <textarea id="key" type="key" name="key" rows="10" style="width: 100%;" required></textarea>
                </div>
                <div class="col-6">
                    <label for="message">Encrypted message</label>
                    <textarea id="message" name="message" rows="10" style="width: 100%;" required></textarea>
                </div>
            </div>
            <div>
                <button class="mb-5"="submit">Decrypt</button>
            </div>
        </form>

        <?php if (!empty($error)) {  ?>

            <hr>

            <h3>Error</h3>

            <div class="content-section">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <?php if (!empty($decrypted)) {  ?>

            <hr>

            <h3>Result</h3>

            <div class="content-section">
                <?php echo $decrypted; ?>
            </div>
        <?php } ?>

    </div>


    <script>
        document.getElementById('download-button').addEventListener('click', function() {
            // Get the content of the text areas
            var decryptKeyContent = document.getElementById('decryptkey') ? document.getElementById('decryptkey').value : '';
            var resultContent = document.getElementById('result') ? document.getElementById('result').value : '';

            // Combine the content into a single string
            var textToSave = 'Key to decrypt:\n' + decryptKeyContent + '\n\nResult:\n' + resultContent;

            // Create a blob with the text content
            var blob = new Blob([textToSave], {
                type: 'text/plain'
            });

            // Create a link element
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'decrypted_data.txt'; // Name of the file to be downloaded

            // Programmatically click the link to trigger the download
            link.click();

            // Cleanup
            URL.revokeObjectURL(link.href);
        });

        document.getElementById('toEncrypt').addEventListener('input', function() {
            var maxLength = this.maxLength;
            var currentLength = this.value.length;
            var remainingCharacters = maxLength - currentLength;

            var charCountElement = document.getElementById('charCount');
            charCountElement.textContent = remainingCharacters + ' characters remaining';
        });
    </script>

</body>

</html>