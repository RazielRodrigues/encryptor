<?php require_once './src/Controller.php'; ?>

<!DOCTYPE html>
<html lang="EN">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO Meta Tags -->
    <meta name="title" content="Encryptor | Raziel Rodrigues" />
    <meta name="description" content="Welcome to Raziel Rodrigues' website. Explore web development projects, insights, and technical expertise." />
    <meta name="keywords" content="Raziel Rodrigues, web development, software engineer, JavaScript, PHP, Symfony, React, Go, programming" />
    <meta name="author" content="Raziel Rodrigues" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph Meta Tags (For social media sharing) -->
    <meta property="og:title" content="Encryptor | Raziel Rodrigues" />
    <meta property="og:description" content="Explore Raziel Rodrigues' web development projects and technical expertise." />
    <meta property="og:image" content="https://encryptor.razielrodrigues.dev/assets/raziel-pRRQJZz1.jpeg" />
    <meta property="og:url" content="https://encryptor.razielrodrigues.dev" />
    <meta property="og:type" content="website" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Website | Raziel Rodrigues" />
    <meta name="twitter:description" content="Explore Raziel Rodrigues' web development projects and technical expertise." />
    <meta name="twitter:image" content="https://encryptor.razielrodrigues.dev/assets/raziel-pRRQJZz1.jpeg" />

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.ico" />

    <title>Encryptor | Raziel Rodrigues</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&display=swap" rel="stylesheet">
    <link href="./public/index.css" rel="stylesheet">
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