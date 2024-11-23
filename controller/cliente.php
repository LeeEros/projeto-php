<?php
include("../model/banco.php");
include("../view/template.php");

switch(@$_REQUEST["page"]){
    case "novo":
        include("../view/cadastrar_cliente.php");
        break;
    case "listar":
        include("../view/listar_cliente.php");
        break;
    default:
        include ("../view/template.php");
        break;
    }
?>