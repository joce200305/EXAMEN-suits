<?php
session_start(); //permite trabajar con sesiones
session_unset(); //libera la sesion actual
session_destroy(); //destruye las variables 
header("location:login.php"); //
?>