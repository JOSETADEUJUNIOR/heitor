<?php

class UtilDAO
{
    private static function IniciarSessao()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($nome, $id)
    {
        self::IniciarSessao();
        $_SESSION['cod'] = $id;
        $_SESSION['nome'] = $nome;
    }

    public static function CodigoLogado()
    {
        self::IniciarSessao();
        return $_SESSION['cod'];
    }

    public static function NomeLogado()
    {
        self::IniciarSessao();
        return $_SESSION['nome'];
    }

    private static function IrTelaLogar()
    {
        header('location: login.php');
        exit;
    }

    public static function Deslogar()
    {
        self::IniciarSessao();
        unset($_SESSION['cod']);
        unset($_SESSION['nome']);
        self::IrTelaLogar();
    }

    public static function VerLogado()
    {
        self::IniciarSessao();
        if (!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
            self::IrTelaLogar();
        }
    }

    public static function DataHoraAtual(){
        self::SetarFusuHorario();
        return date('Y-m-d H:i:s');
    }

    public static function DataAtual(){
        self::SetarFusuHorario();
        return date('Y-m-d');
    }

    public static function HoraAtual(){
        self::SetarFusuHorario();
        return ('H:i');
    }


    public static function SetarFusuHorario(){
        date_default_timezone_set('America/Sao_Paulo');
    }
    
    public static function ExibirDataBr($data){

        if ($data == "") {
            return "";
        }
        else{
        $data_array = explode('-', $data);
        $data_br = $data_array[2]. '/' . $data_array[1] . '/' . $data_array[0];
        
        return $data_br;
    }
    }

}