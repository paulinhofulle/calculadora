<?php
require_once('EnumCalculator.php');

class Process {

    public function iniciaProcessamento(){
        $this->iniciaCalculadora();
        $this->realizaProcessamento();
    }

    public function iniciaCalculadora(){
        session_start();
    }

    public function realizaProcessamento(){
        if(!empty($_POST)){
            if(isset($_POST['valor'])){
                $iValor = $_POST['valor'];
                if(empty($_SESSION['valorAntigo'])){
                    $_SESSION['valorAntigo'] = $iValor;
                    $_SESSION['tela'] = $_SESSION['valorAntigo'];
                } 
                else if(!empty($_SESSION['valorAntigo']) && empty($_SESSION['operador'])){
                    $_SESSION['valorAntigo'] .= $iValor;
                    $_SESSION['tela'] = $_SESSION['valorAntigo'];
                }
                else if(empty($_SESSION['valorAntigo2'])){
                    $_SESSION['valorAntigo2'] = $iValor;
                    $_SESSION['tela'] = $_SESSION['valorAntigo2'];
                }
                else {
                    $_SESSION['valorAntigo2'] .= $iValor;
                    $_SESSION['tela'] = $_SESSION['valorAntigo2'];
                }
            }
            else if(isset($_POST['operador'])){
                $xOperador = $_POST['operador'];
                if(empty($_SESSION['operador'])){
                    $_SESSION['operador'] = $xOperador;
                }
                $_SESSION['tela'] = '';
            }
            else if(isset($_POST['total'])) {
                $this->realizaCalculo($_SESSION['operador'], $_SESSION['valorAntigo'], $_SESSION['valorAntigo2']);
            }
            else if($_POST['limpa']) {
                $_SESSION['tela'] = '';
                $_SESSION['valorAntigo'] = '';
                $_SESSION['valorAntigo2'] = '';
                $_SESSION['valor'] = '';
                $_SESSION['operador'] = '';
            }
        }
    }
    
    public function realizaCalculo($xOperador, $iValorA, $iValorB) {
        switch ($xOperador) {
            case '+':
                $_SESSION['tela'] = $iValorA + $iValorB;
                $_SESSION['valorAntigo'] = $iValorA + $iValorB;
                $_SESSION['operador'] = '';
                break;
            case '-':
                $_SESSION['tela'] = $iValorA - $iValorB;
                $_SESSION['valorAntigo'] = $iValorA - $iValorB;
                $_SESSION['operador'] = '';
                break;
            case '*':
                $_SESSION['tela'] = $iValorA * $iValorB;
                $_SESSION['valorAntigo'] = $iValorA * $iValorB;
                $_SESSION['operador'] = '';
                break;
            case '/':
                $_SESSION['tela'] = $iValorA / $iValorB;
                $_SESSION['valorAntigo'] = $iValorA / $iValorB;
                $_SESSION['operador'] = '';
                break;
            default:
                break;
        }
    }

    public static function exibeVisor(){
        return $_SESSION['tela'];
    }

}
?>