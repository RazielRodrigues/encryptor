<?php
$error = null;
$success = null;
$page = $_GET['page'] ?? null;

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
