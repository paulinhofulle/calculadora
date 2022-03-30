<?php

class Process {

    public function iniciaProcessamento(){
        $this->iniciaCalculadora();
        $this->realizaProcessamento();
    }

    public function iniciaCalculadora(){
        session_start();

        if(!isset($_SESSION['tela']) && !isset($_SESSION['valor']) && !isset($_SESSION['operador'])){
            $_SESSION['tela'] = '';
            $_SESSION['valor'] = '';
            $_SESSION['operador'];
        }
    }

    public function realizaProcessamento(){
        if(!empty($_GET)){
            if(isset($_GET['valor'])){
                $_POST['tela'] = $_GET['valor'];
            }
        }
    }


}

?>