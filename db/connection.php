<?php

function novaConexao()
{
  $servidor = 'localhost';
  $usuario = 'aalissonaq';
  $senha = '4l15s0n3aQ!';
  $banco = 'lc';

  try {
    $conexao = new PDO(
      "mysql:host=$servidor;dbname=$banco",
      $usuario,
      $senha
    );
    return $conexao;
  } catch (PDOException $e) {
    die('Erro: ' . $e->getMessage());
    exit;
  }
}
