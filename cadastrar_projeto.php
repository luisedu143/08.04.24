<?php
require_once('./conexao.php');

$txtNomeProjeto = $_POST['txtNome Projeto'];
$txtDescricaoProjeto = $_POST['txtDescricaoProjeto'];

$str_sql_cadastrar_projeto = "insert into 'projetos` ('nome',`descricao') values
('$txtNomeProjeto','$txtDescricaoProjeto');";

try {
    $cadastrar_projeto = mysqli_query($conexao, $str_sql_cadastrar_projeto);
    $ultimo_id = $conexao->insert_id;
    $_SESSION['idProjeto'] = $ultimo_id;
    die('idProjeto: ' . $_SESSION['idProjeto']);
} catch (Exception) {
    die('não foi possivel cadastrar o projeto. str sql: ' . $str_sql_cadastrar_projeto);
}
?>