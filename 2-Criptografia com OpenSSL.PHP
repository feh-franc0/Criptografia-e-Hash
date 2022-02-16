<?php

// var_dump(openssl_get_cipher_methods());

$cifra = "AES-128-CBC";

$chave = random_bytes(32);

// var_dump(bin2hex($chave));

// var_dump(openssl_cipher_iv_length($cifra));

$iv = random_bytes(openssl_cipher_iv_length($cifra));

// var_dump(bin2hex($iv));

$mensagemOriginal = "Curso de PHP 8 da Hcode";

$mensagemCriptografado = openssl_encrypt(
    $mensagemOriginal,
    $cifra,
    $chave,
    OPENSSL_RAW_DATA,
    $iv
);

$resultado = base64_encode($iv.$mensagemCriptografado);

// var_dump("base64", $resultado);

// var_dump(bin2hex($mensagemCriptografado));

////////////////////////////////////////////////////////////
// AQUI SERIA OUTRO ARQUIVO QUE DESCRIPTOGRAFA

$bytes = base64_decode($resultado);

$meuIv = mb_substr(
    $bytes, 
    0, 
    openssl_cipher_iv_length($cifra),
    "8bit"
);

$textoAberto = mb_substr(
    $bytes, 
    openssl_cipher_iv_length($cifra),
    null, 
    "8bit"
);

$mensagemDescriptografada = openssl_decrypt(
    $textoAberto,
    $cifra,
    $chave,
    OPENSSL_RAW_DATA,
    $meuIv
);

var_dump($mensagemDescriptografada);