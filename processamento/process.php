<?php

class Process {

    public function iniciaProcessamento(){
        $this->iniciaCalculadora();
        $this->realizaProcessamento();
    }

    public function iniciaCalculadora(){
        session_start();
        if (!isset($_SESSION['tela']) && !isset($_SESSION['operador']) && !isset($_SESSION['valor']))
        {
            $_SESSION['tela'] = '';
            $_SESSION['operador'] = '';
            $_SESSION['valor'] = '';
        }
        
    }

    public function realizaProcessamento(){
        if(!empty($_GET)){
            if($_GET['valor']){
                
            }
        }
    }

    public static function exibeVisor(){
        return $_POST['tela'];
    }

}

?>