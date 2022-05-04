<?php

function novaConexao()
{
  $servidor = 'localhost';
  $usuario = 'ci';
  $senha = 't5r4e3w2q1';
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
