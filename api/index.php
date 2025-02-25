<?php require_once './src/Controller.php'; ?>

<!DOCTYPE html>
<html lang="en">
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./public/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
</head>

<body class="magical-bg">
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="/" style="font-family: 'Quintessential', cursive;">
                <span class="text-dark">Encryptor</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarText" aria-controls="navbarText" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?page=encrypt">Encrypt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?page=decrypt">Decrypt</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="https://www.razielrodrigues.dev/" target="_blank" rel="noopener noreferrer" class="text-decoration-none text-dark">
                        Made by raziel rodrigues
                    </a>
                </span>
            </div>
        </div>
    </nav>

    <main class="container mt-5 pb-5">
        <?php if (!empty($error)) { ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <?php if (!empty($success)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
        <?php } ?>

        <?php if ($page === null) { ?>
            <?php include './home.php'; ?>
        <?php } ?>

        <?php if ($page === 'encrypt') { ?>
            <?php include './encrypt.php'; ?>
        <?php } ?>

        <?php if ($page === 'decrypt') { ?>
            <?php include './decrypt.php'; ?>
        <?php } ?>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="./public/main.js"></script>
</body>
</html>
