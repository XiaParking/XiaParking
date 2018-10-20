<?php
class Usuario{

    private $id;
    private $email;
    private $senha;
    private $tipo_usuario;

    public function __construct($id=NULL){
        $this->id = $id;
        if ( $id ){
            $con = new PDO(SERVIDOR, USUARIO, SENHA);
            $sql = $con->prepare("SELECT * FROM USUARIO WHERE ID=?");
            $sql->execute(array($this->id));
            $r = $sql->fetchObject();
            if ( $r ){
                $this->id = $r->ID;
                $this->email = $r->EMAIL;
                $this->senha = $r->SENHA;
                $this->tipo_usuario = $r->TIPO_USUARIO;
            }
        }
    }

    public function getId(){ return $this->id; }
    public function getEmail(){ return $this->email; }
    public function getSenha(){ return $this->senha; }
    public function getTipo(){ return $this->tipo_usuario; }


    public function set($u){
        $this->email = $u['email'];
        $this->senha = sha1($u['senha']);
    }

    public function add(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("INSERT INTO USUARIO (ID, EMAIL, SENHA, TIPO_USUARIO_ID) VALUES (NULL, ?, ?, 1)");
        $sql->execute(array($this->email, $this->senha));



        if ( $sql->errorCode()=='00000' ){
            $_SESSION['msg']="<div class='alert alert-success'>Parabens voce realizou seu cadastro</div>";
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[0]."</div>";
        }
    }

    public function log(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT EMAIL,TIPO_USUARIO_ID FROM USUARIO WHERE EMAIL = ? AND SENHA = ?");
        $sql->execute(array($this->email, $this->senha));



        if ( $sql->errorCode()=='00000' && $sql->rowCount() == 1){
            session_start();
            $_SESSION['USUARIO'] = $sql->fetchObject();
            $_SESSION['msg']="<div class='alert alert-success'>Parabens voce realizou seu cadastro</div>";
            header("Location: ./");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[0]."</div>";
        }
    }

}

class Menu{

    public function MenuSemDropdown(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT * FROM MENU WHERE MENU_DROPDOWN_ID = 1");
        $sql->execute();
        $filme = $sql->fetchAll(PDO::FETCH_CLASS);

    }



}

class Filme{

    private $id;
    private $title;
    private $description;
    private $last_update;

    public function __construct($id=NULL){
        $this->id = $id;
        if ( $id ){
            $con = new PDO(SERVIDOR, USUARIO, SENHA);
            $sql = $con->prepare("SELECT * FROM filme WHERE film_id=?");
            $sql->execute(array($this->id));
            $r = $sql->fetchObject();
            if ( $r ){
                $this->id = $r->film_id;
                $this->title = $r->title;
                $this->description = $r->description;
                $this->last_update = $r->last_update;
            }
        }
    }

    public function getId(){ return $this->id; }
    public function getTitle(){ return $this->title; }
    public function getDescription(){ return $this->description; }
    public function getLastUpdate(){ return $this->last_update; }


    public function set($u){
        $this->title = $u['title'];
        $this->description = $u['description'];
        $this->last_update = $u['last_update'];

    }


    public function add(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("INSERT INTO filme (film_id, title, description, last_update) VALUES (NULL, ?, ?, ?)");
        $sql->execute(array($this->title, $this->description, $this->last_update));



        if ( $sql->errorCode()=='00000' ){
            $_SESSION['msg']="<div class='alert alert-success'>Registro inserido</div>";
            header("Location: ./");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[2]."</div>";
        }
    }

    public function update(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        if ( isset($_POST['filme'])){
            $this->title = $_POST['filme']['title'];
            $this->description = $_POST['filme']['description'];
            $this->last_update = $_POST['filme']['last_update'];


            $sql = $con->prepare("UPDATE filme SET title=?, description=?, last_update=? WHERE film_id=?");
            $sql->execute(array($this->title, $this->description, $this->last_update, $this->id));

            echo $sql->errorInfo()[2];

            if ( $sql->errorCode()=='00000' ){
                $_SESSION['msg']="<div class='alert alert-success'>Registro alterado</div>";
                header("Location: ./");
            }else{
                $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[2]."</div>";
            }

        }

        $sql = $con->prepare("SELECT * FROM filme WHERE id=?");
        $sql->execute(array($this->id));
        $r = $sql->fetchObject();

        $this->title = $r->title;
        $this->description = $r->description;
        $this->last_update = $r->last_update;

    }

    public function delete(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("DELETE FROM filme WHERE film_id=?");
        $sql->execute(array($this->id ));
        if ( $sql->errorCode()=='00000' ){
            $_SESSION['msg']="<div class='alert alert-success'>Registro excluído</div>";
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[2]."</div>";
        }
        header("Location: ./");
    }

	
	    public function FilmeView(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT * FROM filme");
        $sql->execute();
        $filme = $sql->fetchAll(PDO::FETCH_CLASS);

        $html='';
        $html.= "<div class='pull-right'><a href='create.php' class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Incluir</a></div><br><br>";

        if ($filme){
        $html.="<table class='table table-bordered'>";
		$html.= "<tr><td>ID</td><td>Titulo</td><td>Descrição</td><td>Ultima Atualização</td><td>Botões</td></tr>";
            foreach($filme as $r){
                $html.= "<tr><td>$r->film_id</td><td>$r->title</td><td>$r->description</td><td>$r->last_update</td>";
                $html.= "<td><a href='update.php?id=$r->film_id' class='btn btn-primary'>Alterar</a> ";
                $html.= "<a href='delete.php?id=$r->film_id' class='btn btn-danger'>Excluir</a> ";
                $html.= "</td></tr>";
                
				
               
            }
            $html.= "</table>";
        } else {
            $html.= 'Nenhum registro encontrado';
        }
        return $html;
    }

}