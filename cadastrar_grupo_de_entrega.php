<?php
session_start(); // Inicia a sessão
require_once('./conexao.php');

// Obtém os dados do formulário
$txtNomeGrupoEntrega = $_POST['txtNomeGrupoEntrega'];
$txtDescricaoGrupoEntrega = $_POST['txtDescricaoGrupoEntrega'];

// Consulta SQL para inserir os dados no banco de dados
$str_sql_cadastrar_grupo_entrega = "INSERT INTO `grupos_de_entrega` (`nome`, `descricao`) VALUES ('$txtNomeGrupoEntrega', '$txtDescricaoGrupoEntrega')";

try {
    // Executa a consulta SQL
    $cadastrar_grupo_entrega = mysqli_query($conexao, $str_sql_cadastrar_grupo_entrega);

    // Obtém o último ID inserido
    $ultimo_id = mysqli_insert_id($conexao);

    // Armazena o último ID inserido na variável de sessão
    $_SESSION['idGrupoEntrega'] = $ultimo_id;

    // Exibe o ID
    die('O grupo de entrega foi cadastrado com sucesso. ID do Grupo de Entrega: ' . $_SESSION['idGrupoEntrega']);
} catch (Exception $e) {
    // Trata qualquer exceção
    die('Não foi possível cadastrar o grupo de entrega. Erro: ' . $e->getMessage());
}
?>
