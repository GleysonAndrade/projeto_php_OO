<?php 
if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}
echo "<h1> Sobre Empresa</h1>";

// var_dump($this->data['about-company']);

if (!empty($this->data['about-company'])) {
    foreach ($this->data['about-company'] as $about_company) {
        // var_dump($about_company);
        extract($about_company);
        echo "ID: $id <br>";
        echo "Título: $title <br>";
        echo "Descrição: $description <br>";
        echo "Imagem: $image <br>";
        echo"<hr>";
    }
}else{
    echo"<p style='color: #F00;'>Erro: Nenhum registro encontado!</p>";
}