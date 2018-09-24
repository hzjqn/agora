<?php
spl_autoload_register(function($class){
  require_once "./classes/$class.php";
});
// Esta funcion nos permite debuggear de una manera simple y linda
function dd($var){
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
  exit;
}// ***
// Esta simple funcion nos devuelve lo que ingresamos si esta setteado 
function old($input){
  if(isset($_POST["$input"])){
    return $_POST["$input"];
  } else {
    return "";
  }
}// ***
// Funcion que hace un poco mas facil la redireccion a otra pagina
function redirect($url, $permanent = false){
  header("Location:" . $url, true, $permanent ? 301 : 302);
  exit;
}// ***
function isEmail(string $email):bool{
  $return = (filter_var($email, FILTER_VALIDATE_EMAIL))? true : false;
  return $return;
}
?>
