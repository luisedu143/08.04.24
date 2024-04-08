<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeJustificativa = $_POST['txtNomeJustificativa'];
$txtDescricaoJustificativa = $_POST['txtDescricaoJustificativa'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_justificativa = "INSERT INTO `justificativas` (`nome`, `descricao`) VALUES ('$txtNomeJustificativa', '$txtDescricaoJustificativa')";

try {
    // Executa a consulta SQL
    $cadastrar_justificativa = mysqli_query($conexao, $str_sql_cadastrar_justificativa);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idJustificativa'] = $ultimo_id;

    // Exibe o ID
    die('A justificativa foi cadastrada com sucesso. ID da Justificativa: ' . $_SESSION['idJustificativa']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar a justificativa. Erro: ' . $e->getMessage());
}
?>
