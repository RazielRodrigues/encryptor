<html>
<h1>Write your text...and your email</h1>
<form action="/" method="post">
    <input required type="text" name="text" id="">
    <input required type="name" name="name" id="">
    <input type="submit" value="send">
</form>
<?php

/* namespace App;
 */
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;

$finder = new Finder();
$finder->in('./vendor');

$request = Request::createFromGlobals();

$text = $request->request->get('text');
$email = $request->request->get('name');

$config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 4096,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

// Create the private and public key
$res = openssl_pkey_new($config);

// Extract the private key from $res to $privKey
openssl_pkey_export($res, $privKey);

// Extract the public key from $res to $pubKey
$pubKey = openssl_pkey_get_details($res);
$pubKey = $pubKey["key"];

// Encrypt the data to $encrypted using the public key
openssl_public_encrypt($text, $encrypted, $pubKey);

// Decrypt the data using the private key and store the results in $decrypted
openssl_private_decrypt($encrypted, $decrypted, $privKey);



?>

<code>
    <span>Chave publica</span>
    <?= $pubKey ?>
</code>

<hr>

<code>
    <span>Chave publica</span>
    <?= $privKey ?>
</code>
<hr>

<code>
    <span>Text</span>
    <?= $text ?>
</code>
<hr>

<code>
    <span>encrypted</span>
    <?= $encrypted ?>
</code>
<hr>

<code>
    <span>decrypted</span>
    <?= $decrypted ?>
</code>

</html>