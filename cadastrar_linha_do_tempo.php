<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeLinhaDoTempo = $_POST['txtNomeLinhaDoTempo'];
$txtDescricaoLinhaDoTempo = $_POST['txtDescricaoLinhaDoTempo'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_linha_do_tempo = "INSERT INTO `linhas_do_tempo` (`nome`, `descricao`) VALUES ('$txtNomeLinhaDoTempo', '$txtDescricaoLinhaDoTempo')";

try {
    // Executa a consulta SQL
    $cadastrar_linha_do_tempo = mysqli_query($conexao, $str_sql_cadastrar_linha_do_tempo);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idLinhaDoTempo'] = $ultimo_id;

    // Exibe o ID
    die('A linha do tempo foi cadastrada com sucesso. ID da Linha do Tempo: ' . $_SESSION['idLinhaDoTempo']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar a linha do tempo. Erro: ' . $e->getMessage());
}
?>
