

<?php


include_once("path.php");

require_once(PATH."config.php");

require_once(PATH."src/source.php");

if( isset( $_POST['registrar'])){
    $filme = new Usuario();
    $filme->set($_POST['registrar']);
    $filme->add();
}
if( isset( $_POST['logar'])){
    $filme = new Usuario();
    $filme->set($_POST['logar']);
    $filme->log();
}

//Titulo da Pagina
$titulo = "Login";
//Se precisar incluir algum script no cabeçalho do documento
$addscripts = "";
//Para adicionar css no documento
$stylepageurl="css/loginregistro.css";


include_once(PATH."inc/cabecalho.php");

//Funcionou

echo"<div class=\"container\">

<div class=\"row\">

<div class=\"col-lg-4 col-md-2 col-sm-0\"></div>

<div class=\"col-lg-4 col-md-8 col-sm-12\">
<div class=\"card\">

<div class=\"form\">
<form name=\"logar\" method=\"POST\" action=\"\" style='display: block;'>

<h2 align=\"center\">Login</h2>
<div class=\"form-group\">
<label for=\"email\">Email</label>
<input class=\"form-control\" type=\"text\" name=\"logar[email]\" id=\"logar[email]\">
</div>

<div class=\"form-group\">
<label for=\"senha\">Senha</label>
<input class=\"form-control\" type=\"password\" name=\"logar[senha]\" id=\"logar[senha]\">
</div>

<div class=\"row\">
<div class=\"col-lg-6 input-group\">

<button type=\"button\" class=\"btn btn-outline-success btn-block google\" disabled id=\"btnentrargoogle\" name=\"btnentrargoogle\"><i class=\"fab fa-google\"></i><c class=\"whitep\">Google</c></button>
</div>
<div class=\"col-lg-6 input-group\">

<button type=\"button\" class=\"btn btn-outline-success btn-block facebook\" disabled id=\"btnentrargoogle\" name=\"btnentrargoogle\"><i class=\"fab fa-facebook\"></i><c class=\"whitep\">Facebook</c></button>

</div>
</div>

<div class=\"form-group\">
<button type=\"submit\" class=\"btn btn-outline-success btn-block\" id=\"btnentrar\" name=\"btnentrar\"><c class=\"whitep\">Entrar</c></button>
</div>
<p class=\"mensagem\">Não possui conta? <a href=\"#\">Registrar</a></p>
</form>

<form name=\"registrar\" method=\"POST\" action=\"\" style='display: none;'>
<h2 align=\"center\">Registrar</h2>
<div class=\"form-group\">
<label for=\"email\">Email</label>
<input class=\"form-control\" type=\"text\" name=\"registrar[email]\" id=\"registrar[email]\">
</div>

<div class=\"form-group\">
<label for=\"senha\">Senha</label>
<input class=\"form-control\" type=\"password\" name=\"registrar[senha]\" id=\"registrar[senha]\">
</div>


<div class=\"row\">
<div class=\"col-lg-6 input-group\">

<button type=\"button\" class=\"btn btn-outline-success btn-block google\" disabled><i class=\"fab fa-google\" id=\"btnregistrargoogle\" name=\"btnregistrargoogle\"></i><c class=\"whitep\">Google</c></button>
</div>
<div class=\"col-lg-6 input-group\">

<button type=\"button\" class=\"btn btn-outline-success btn-block facebook\" disabled><i class=\"fab fa-facebook\" id=\"btnregistrarfacebook\" name=\"btnregistrarfacebook\"></i><c class=\"whitep\">Facebook</c></button>

</div>
</div>

<div class=\"form-group\">
<button type=\"submit\" class=\"btn btn-outline-success btn-block\"><c class=\"whitep\" id=\"btnregistrar\" name=\"btnregistrar\">Registrar</c></button>
</div>
<p class=\"mensagem\">Já possui conta? <a href=\"#\">Logar</a></p>
</form>
</div>
</div>
</div>
<div class=\"col-lg-4 col-md-2 col-sm-0\"></div>
</div>
</div>
";




?>

<script src="<?php echo PATH; ?>js/loginregistro.js"></script>


