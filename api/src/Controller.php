<?php
$msg = null;
$page = $_GET['page'] ?? null;

if (!empty($_POST['toEncrypt'])) {
    $message = $_POST['toEncrypt'];

    $result = openssl_pkey_new(array(
        "digest_alg" => "sha512",
        "private_key_bits" => 512,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ));

    openssl_pkey_export($result, $privKey);
    $pubKey = openssl_pkey_get_details($result);
    $pubKey = $pubKey["key"];

    if (!openssl_public_encrypt($message, $encrypted, $pubKey)) {
        $msg = 'Failure during encryption of your message!';
    }
}

if (!empty($_POST['message']) && !empty($_POST['key'])) {
    $key = base64_decode($_POST['key']);
    $message = base64_decode($_POST['message']);

    if (!openssl_pkey_get_private($key)) {
        $msg = 'Your key is invalid!';
    } else {
        openssl_private_decrypt($message, $decrypted, $key);

        if (!$decrypted) {
            $msg = 'Failure during decryption of your message!';
        }
    }
}

if (openssl_error_string()) {
    $msg = openssl_error_string();
}
