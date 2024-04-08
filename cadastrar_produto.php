<?php
session_start(); // Start the session
require_once('./conexao.php');

// Retrieve form data
$txtNomeProduto = $_POST['txtNomeProduto'];
$txtDescricaoProduto = $_POST['txtDescricaoProduto'];

// SQL query to insert data into the database
$str_sql_cadastrar_produto = "INSERT INTO `produtos` (`nome`, `descricao`) VALUES ('$txtNomeProduto', '$txtDescricaoProduto')";

try {
    // Execute the SQL query
    $cadastrar_produto = mysqli_query($conexao, $str_sql_cadastrar_produto);

    // Get the last inserted ID
    $ultimo_id = mysqli_insert_id($conexao);

    // Store the last inserted ID in session variable
    $_SESSION['idProduto'] = $ultimo_id;

    // Output the ID
    die('idProduto: ' . $_SESSION['idProduto']);
} catch (Exception $e) {
    // Handle any exceptions
    die('Não foi possível cadastrar o produto. Erro: ' . $e->getMessage());
}
?>
