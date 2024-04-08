<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeCusto = $_POST['txtNomeCusto'];
$txtDescricaoCusto = $_POST['txtDescricaoCusto'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_custo = "INSERT INTO `custos` (`nome`, `descricao`) VALUES ('$txtNomeCusto', '$txtDescricaoCusto')";

try {
    // Executa a consulta SQL
    $cadastrar_custo = mysqli_query($conexao, $str_sql_cadastrar_custo);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idCusto'] = $ultimo_id;

    // Exibe o ID
    die('O custo foi cadastrado com sucesso. ID do Custo: ' . $_SESSION['idCusto']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar o custo. Erro: ' . $e->getMessage());
}
?>
