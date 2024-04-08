<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeObjetivoSmart = $_POST['txtNomeObjetivoSmart'];
$txtDescricaoObjetivoSmart = $_POST['txtDescricaoObjetivoSmart'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_objetivo_smart = "INSERT INTO `objetivos_smart` (`nome`, `descricao`) VALUES ('$txtNomeObjetivoSmart', '$txtDescricaoObjetivoSmart')";

try {
    // Executa a consulta SQL
    $cadastrar_objetivo_smart = mysqli_query($conexao, $str_sql_cadastrar_objetivo_smart);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idObjetivoSmart'] = $ultimo_id;

    // Exibe o ID
    die('O objetivo SMART foi cadastrado com sucesso. ID do Objetivo SMART: ' . $_SESSION['idObjetivoSmart']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar o objetivo SMART. Erro: ' . $e->getMessage());
}
?>
