<?php

// Melhor tipo de criptografia para usar em senhas

$senha = "Hc0d3!:";

$hash = password_hash($senha, PASSWORD_DEFAULT);

$bancoDeDados = '$2y$10$raBX/a4vWGlz9WrfPqWP5ONasdTDdFbMEdpMPej16Vpuf.thr3qje';

// consegue comprar mesmo o hash sendo diferente cada vez que se usa
var_dump(password_verify($senha, $bancoDeDados));

// $2y$10$raBX/a4vWGlz9WrfPqWP5ONasdTDdFbMEdpMPej16Vpuf.thr3qje