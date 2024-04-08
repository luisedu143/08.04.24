<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeRestricao = $_POST['txtNomeRestricao'];
$txtDescricaoRestricao = $_POST['txtDescricaoRestricao'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_restricao = "INSERT INTO `restricoes` (`nome`, `descricao`) VALUES ('$txtNomeRestricao', '$txtDescricaoRestricao')";

try {
    // Executa a consulta SQL
    $cadastrar_restricao = mysqli_query($conexao, $str_sql_cadastrar_restricao);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idRestricao'] = $ultimo_id;

    // Exibe o ID
    die('A restrição foi cadastrada com sucesso. ID da Restrição: ' . $_SESSION['idRestricao']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar a restrição. Erro: ' . $e->getMessage());
}
?>
