<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeStakeholder = $_POST['txtNomeStakeholder'];
$txtDescricaoStakeholder = $_POST['txtDescricaoStakeholder'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_stakeholder = "INSERT INTO `stakeholders` (`nome`, `descricao`) VALUES ('$txtNomeStakeholder', '$txtDescricaoStakeholder')";

try {
    // Executa a consulta SQL
    $cadastrar_stakeholder = mysqli_query($conexao, $str_sql_cadastrar_stakeholder);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idStakeholder'] = $ultimo_id;

    // Exibe o ID
    die('O stakeholder foi cadastrado com sucesso. ID do Stakeholder: ' . $_SESSION['idStakeholder']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar o stakeholder. Erro: ' . $e->getMessage());
}
?>
