<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeBeneficio = $_POST['txtNomeBeneficio'];
$txtDescricaoBeneficio = $_POST['txtDescricaoBeneficio'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_beneficio = "INSERT INTO `beneficios` (`nome`, `descricao`) VALUES ('$txtNomeBeneficio', '$txtDescricaoBeneficio')";

try {
    // Executa a consulta SQL
    $cadastrar_beneficio = mysqli_query($conexao, $str_sql_cadastrar_beneficio);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idBeneficio'] = $ultimo_id;

    // Exibe o ID
    die('O benefício foi cadastrado com sucesso. ID do Benefício: ' . $_SESSION['idBeneficio']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar o benefício. Erro: ' . $e->getMessage());
}
?>
