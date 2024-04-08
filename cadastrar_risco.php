<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeRisco = $_POST['txtNomeRisco'];
$txtDescricaoRisco = $_POST['txtDescricaoRisco'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_risco = "INSERT INTO `riscos` (`nome`, `descricao`) VALUES ('$txtNomeRisco', '$txtDescricaoRisco')";

try {
    // Executa a consulta SQL
    $cadastrar_risco = mysqli_query($conexao, $str_sql_cadastrar_risco);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idRisco'] = $ultimo_id;

    // Exibe o ID
    die('O risco foi cadastrado com sucesso. ID do Risco: ' . $_SESSION['idRisco']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar o risco. Erro: ' . $e->getMessage());
}
?>
