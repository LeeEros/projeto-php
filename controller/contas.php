<?php
include '../model/Model_Contas.php';
include '../model/banco.php';

$id_parcela = $_GET['id'] ?? null;

switch (@$_REQUEST["page"]){
    case 'visualizar_parcela':
        if ($id_parcela) {
            include '../view/visualizar_parcela.php'; 
        } else {
            echo "<script>alert('ID da parcela não informado!'); window.location.href='contas.php?page=listar_parcelas';</script>";
        }
        break;
    
    case 'listar_parcelas':
        include '../view/listar_parcelas.php'; 
        break;
    
    default:
        echo "<script>alert('Página inválida!'); window.location.href='contas.php?page=listar_parcelas';</script>";
        break;
}
?>
