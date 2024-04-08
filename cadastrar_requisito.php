<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeRequisito = $_POST['txtNomeRequisito'];
$txtDescricaoRequisito = $_POST['txtDescricaoRequisito'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_requisito = "INSERT INTO `requisitos` (`nome`, `descricao`) VALUES ('$txtNomeRequisito', '$txtDescricaoRequisito')";

try {
    // Executa a consulta SQL
    $cadastrar_requisito = mysqli_query($conexao, $str_sql_cadastrar_requisito);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idRequisito'] = $ultimo_id;

    // Exibe o ID
    die('O requisito foi cadastrado com sucesso. ID do Requisito: ' . $_SESSION['idRequisito']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar o requisito. Erro: ' . $e->getMessage());
}
?>
