<?php
class Process {

    public function iniciaProcessamento(){
        $this->iniciaCalculadora();
        $this->realizaProcessamento();
    }

    public function iniciaCalculadora(){
        session_start();
        $_SESSION['tela'] = '';
    }

    public function realizaProcessamento(){
        if(!empty($_POST)){
            if(isset($_POST['valor'])){
                $this->setValorNumeros();
            }
            else if(isset($_POST['operador'])){
                $this->setValorOperador();
            }
            else if(isset($_POST['total'])) {
                $this->setValorTotal();
            }
            else if($_POST['limpa']) {
                $this->limpaTela();
            }
        }
    }
    
    public function setValorNumeros(){
        $iValor = $_POST['valor'];
        if(empty($_SESSION['valorAntigo'])){
            $_SESSION['valorAntigo'] = $iValor;
            $_SESSION['tela'] = $_SESSION['valorAntigo'];
        } 
        else if(!empty($_SESSION['valorAntigo']) && empty($_SESSION['operador'])){
            $_SESSION['valorAntigo'] .= $iValor;
            $_SESSION['tela'] = $_SESSION['valorAntigo'];
        }
        else if(!empty($_SESSION['valorAntigo2'])){
            $_SESSION['valorAntigo2'] = $iValor;
            $_SESSION['tela'] = $_SESSION['valorAntigo2'];
        }
        else {
            $_SESSION['valorAntigo2'] .= $iValor;
            $_SESSION['tela'] = $_SESSION['valorAntigo2'];
        }
    }
    
    public function setValorOperador(){
        $xOperador = $_POST['operador'];
        $_SESSION['operador'] = '';
        if(empty($_SESSION['operador'])){
            $_SESSION['operador'] = $xOperador;
        }
        if(!empty($_SESSION['valorAntigo']) && !empty($_SESSION['valorAntigo2'])){
            $this->realizaCalculo($xOperador, $_SESSION['valorAntigo'], $_SESSION['valorAntigo2']);
            $_SESSION['valorAntigo2'] = '';
        }
        $_SESSION['tela'] = '';
    }
    
    public function setValorTotal() {
        $this->realizaCalculo($_SESSION['operador'], $_SESSION['valorAntigo'], $_SESSION['valorAntigo2']);
        $_SESSION['valorAntigo2'] = '';
        $_SESSION['operador'] = '';
    }
    
    public function realizaCalculo($xOperador, $iValorA, $iValorB) {
        switch ($xOperador) {
            case '+':
                $_SESSION['tela'] = $iValorA + $iValorB;
                $_SESSION['valorAntigo'] = $iValorA + $iValorB;
                break;
            case '-':
                $_SESSION['tela'] = $iValorA - $iValorB;
                $_SESSION['valorAntigo'] = $iValorA - $iValorB;
                break;
            case '*':
                $_SESSION['tela'] = $iValorA * $iValorB;
                $_SESSION['valorAntigo'] = $iValorA * $iValorB;
                break;
            case '/':
                if($iValorA == 0 || $iValorB == 0){
                    $_SESSION['tela'] = 0;
                    $_SESSION['valorAntigo'] = 0;
                }
                else {
                    $_SESSION['tela'] = $iValorA / $iValorB;
                    $_SESSION['valorAntigo'] = $iValorA / $iValorB;
                }
                break;
            default:
                break;
        }
    }
    
    public function limpaTela(){
        $_SESSION['tela'] = '';
        $_SESSION['valorAntigo'] = '';
        $_SESSION['valorAntigo2'] = '';
        $_SESSION['valor'] = '';
        $_SESSION['operador'] = '';
    }

    public static function exibeVisor(){
        return $_SESSION['tela'];
    }

}
?>