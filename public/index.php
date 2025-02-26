<?php require_once __DIR__ . '/src/Controller.php'; ?>

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
    <link rel="icon" type="image/svg+xml" href="./assets/favicon.ico" />

    <title>Encryptor | Raziel Rodrigues</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./assets/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
</head>

<body>

    <?php include_once __DIR__ . '/navbar.php'; ?>

    <main class="container mt-5 pb-5">
        <?php if (!empty($msg)) { ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $msg; ?>
            </div>
        <?php } ?>
        <?php
        match ($page) {
            null => include_once __DIR__ . '/home.php',
            'encrypt' => include_once __DIR__ . '/encrypt.php',
            'decrypt' => include_once __DIR__ . '/decrypt.php',
            default => include_once __DIR__ . '/home.php'
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
