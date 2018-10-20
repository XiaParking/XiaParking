<?php


if(isset($_POST["email"]) && !empty($_POST["email"])  && isset($_POST["nome"]) && !empty($_POST["nome"])  && isset($_POST["mensagem"]) && !empty($_POST["mensagem"])) {


$con = new PDO("mysql:host=localhost; dbname=xiaparking; charset=utf8", "root", "");
$sql = $con->prepare('INSERT INTO contato VALUES (null, ?, ?, ?);');
$sql->execute(array( $_POST["nome"] ,$_POST["email"],$_POST["mensagem"]));

if($sql->rowCount() > 0){

    echo "<script>
    alert('Mensagem enviada com sucesso!');
    window.location.href='index.html';
    </script>";

}
else{

    echo "<script>
    alert('Erro ao enviar mensagem!');
   window.location.href='index.html';
    </script>";
}



}
else{

}

?>