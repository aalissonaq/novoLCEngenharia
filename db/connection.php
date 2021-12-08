<?php

function novaConexao()
{
  $servidor = 'localhost';
  $usuario = 'root';
  $senha = '';
  $banco = 'new_lc';

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
