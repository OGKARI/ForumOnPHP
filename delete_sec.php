<?php 
    require "sys.php";
    require "Database.php";
    
    $Database = new Database();
    $qry = "DELETE FROM sections WHERE id_sections = :id";
    $parm = array(
        ":id"=>$_GET["id_sections"]);
    $Database->set($qry,$parm);
    require 'logs.php';

    if($_SESSION['rule'] == 100 ){
        $e_type = "Удаление раздела";
        logs($e_type); 
        }
    header('Location: /panel.php');
?>