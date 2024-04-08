<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeEquipe = $_POST['txtNomeEquipe'];
$txtDescricaoEquipe = $_POST['txtDescricaoEquipe'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_equipe = "INSERT INTO `equipes` (`nome`, `descricao`) VALUES ('$txtNomeEquipe', '$txtDescricaoEquipe')";

try {
    // Executa a consulta SQL
    $cadastrar_equipe = mysqli_query($conexao, $str_sql_cadastrar_equipe);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idEquipe'] = $ultimo_id;

    // Exibe o ID
    die('A equipe foi cadastrada com sucesso. ID da Equipe: ' . $_SESSION['idEquipe']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar a equipe. Erro: ' . $e->getMessage());
}
?>
