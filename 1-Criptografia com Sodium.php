<?php

/**
 * no linux: sudo apt install php-libsodium
 * 
 * var_dump(SODIUM_LIBRARY_MAJOR_VERSION);
 * var_dump(SODIUM_LIBRARY_MINOR_VERSION);
 * var_dump(SODIUM_LIBRARY_VERSION);
 * 
 */


$mensagem = "Hcode Treinamentos";

// $chave = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
// file_put_contents("./chave.key", $chave);

$chave = file_get_contents("../chave.key");

$iv = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

$mensagemCifrada = sodium_crypto_secretbox($mensagem, $iv, $chave);

$mensagemDecifrada = sodium_crypto_secretbox_open($mensagemCifrada, $iv, $chave);

// var_dump(base64_encode($mensagemCifrada)); // se quiser trafegar via web use o base64_encode
// var_dump($mensagemCifrada);

var_dump($mensagem);
var_dump($mensagemCifrada);
var_dump($mensagemDecifrada);