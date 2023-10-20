<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta as informações em uma string
    $htmlContent = "<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9\" crossorigin=\"anonymous\">
<link rel=\"stylesheet\" href=\"style.css\">
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
    }
    h1, h2 {
        text-align: center;
    }
</style>
<title>Currículo Gerado</title>
</head>
<body>
<h1>Currículo Gerado</h1>";

    $htmlContent .= "<h2>Dados Pessoais</h2>";
    $htmlContent .= "<p>Nome: " . $_POST["nome"] . "</p>";
    $htmlContent .= "<p>Data de Nascimento: " . $_POST["data_nasc"] . "</p>";
    $htmlContent .= "<p>Gênero: " . $_POST["genero"] . "</p>";
    $htmlContent .= "<p>Tel/Cel: " . $_POST["telefone"] . "</p>";
    $htmlContent .= "<p>Email: " . $_POST["email"] . "</p>";

    $htmlContent .= "<h2>Endereço</h2>";
    $htmlContent .= "<p>Logradouro: " . $_POST["logradouro"] . "</p>";
    $htmlContent .= "<p>Nº: " . $_POST["numero"] . "</p>";
    $htmlContent .= "<p>Bairro: " . $_POST["bairro"] . "</p>";
    $htmlContent .= "<p>Cidade: " . $_POST["cidade"] . "</p>";
    $htmlContent .= "<p>UF: " . $_POST["uf"] . "</p>";

    $htmlContent .= "<h2>Habilitação</h2>";
    if (isset($_POST["habilitacao"])) {
        $htmlContent .= "<p>Habilitações: " . implode(", ", $_POST["habilitacao"]) . "</p>";
    }

    $htmlContent .= "<h2>Habilidades</h2>";
    if (isset($_POST["habilidades"])) {
        $htmlContent .= "<p>Habilidades: " . implode(", ", $_POST["habilidades"]) . "</p>";
    }

    $htmlContent .= "<h2>Competências</h2>";
    if (isset($_POST["competencias"])) {
        $htmlContent .= "<p>Competências: " . implode(", ", $_POST["competencias"]) . "</p>";
    }

    $htmlContent .= "<h2>Experiências</h2>";
    if (isset($_POST["cargo1"])) {
        $htmlContent .= "<p>1)<br>";
        $htmlContent .= "Cargo/Função: " . $_POST["cargo1"] . "<br>";
        $htmlContent .= "Data de Início: " . $_POST["inicio1"] . "<br>";
        $htmlContent .= "Data de Término: " . $_POST["termino1"] . "<br>";
        $htmlContent .= "Local de Trabalho: " . $_POST["local1"] . "<br>";
        $htmlContent .= "Descrição das Atividades: " . $_POST["descricao1"] . "</p>";
    }
    if (isset($_POST["cargo2"])) {
        $htmlContent .= "<p>2)<br>";
        $htmlContent .= "Cargo/Função: " . $_POST["cargo2"] . "<br>";
        $htmlContent .= "Data de Início: " . $_POST["inicio2"] . "<br>";
        $htmlContent .= "Data de Término: " . $_POST["termino2"] . "<br>";
        $htmlContent .= "Local de Trabalho: " . $_POST["local2"] . "<br>";
        $htmlContent .= "Descrição das Atividades: " . $_POST["descricao2"] . "</p>";
    }

    // Fecha o arquivo HTML
    $htmlContent .= "</body></html>";

    // Nome do arquivo HTML a ser criado
    $nomeArquivo = "curriculo.html";

    // Escreve o conteúdo no arquivo HTML
    file_put_contents($nomeArquivo, $htmlContent);

    // Redireciona para o arquivo HTML recém-criado
    header("Location: $nomeArquivo");
    exit();
}
?>
