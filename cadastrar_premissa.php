<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomePremissa = $_POST['txtNomePremissa'];
$txtDescricaoPremissa = $_POST['txtDescricaoPremissa'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_premissa = "INSERT INTO `premissas` (`nome`, `descricao`) VALUES ('$txtNomePremissa', '$txtDescricaoPremissa')";

try {
    // Executa a consulta SQL
    $cadastrar_premissa = mysqli_query($conexao, $str_sql_cadastrar_premissa);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idPremissa'] = $ultimo_id;

    // Exibe o ID
    die('A premissa foi cadastrada com sucesso. ID da Premissa: ' . $_SESSION['idPremissa']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar a premissa. Erro: ' . $e->getMessage());
}
?>
