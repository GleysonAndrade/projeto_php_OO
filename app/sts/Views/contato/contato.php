<?php 

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}
// var_dump($this->data['form']);
if(!empty($this->data['form'])){
  $valueForm = $this->data['form'];
  extract($valueForm);
}

echo "<h1>Entre em Contato</h1>";
if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>

<form action="" method="post">
    <div class="form-group">
      <label for="">Nome: </label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Nome completo" aria-describedby="helpId" value="<?php if(isset($name)){echo $name;}?>"><br><br>
    </div>
    <div class="form-group">
      <label for="">Email: </label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Digite seu email" aria-describedby="helpId" value="<?php if(isset($email)){echo $email;}?>"><br><br>
    </div>
    <div class="form-group">
      <label for="">Assunto: </label>
      <input type="text" name="subject" id="subject" class="form-control" placeholder="Assunto do contato" aria-describedby="helpId" value="<?php if(isset($subject)){echo $subject;}?>"><br><br>
    </div>
    <div class="form-group">
      <label for="">Mensagem: </label>
      <textarea type="text" name="content" rows="6" cols="50" id="content" class="form-control" placeholder="Conteúdo da mensagem" aria-describedby="helpId"><?php if(isset($content)){echo $content;}?></textarea><br><br>
    </div>

    <input type="submit" name="AddContMsg" value="Enviar">
</form>