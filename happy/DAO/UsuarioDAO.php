<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao{


    public function ValidarEmail($email){

        if (trim($email)== '') {
            return 0 ;
        }
        
        $conexao = parent::retornaConexao();
        $comando_sql = 'select email_usuario 
                            from tb_usuario where email_usuario = ?';

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->execute();

        $user_email = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($user_email) > 0) {
            
            return true;
        }else {
            return false;
        }
        
    }

    public function ValidarEmailAlterar($email)
    {
        if (trim($email) == '')
            return 0;
        $conexao = parent::retornaConexao();
        $comando_sql = 'select email_usuario 
                            from tb_usuario where email_usuario = ?
                            and id_usuario != ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->execute();

        $user_email = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($user_email) > 0)
            return true;
        else
            return false;
    }



    public function ValidarLogin($email, $senha)
    {
        if (trim($senha) == '' || trim($email) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_usuario, nome_usuario 
                        from tb_usuario where email_usuario = ? and senha_usuario = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        $sql->execute();

        $user = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($user) == 0) {
            return -5;
        } else {

            $id = $user[0]['id_usuario'];
            $nome = $user[0]['nome_usuario'];

            //Inicio da sessão
            UtilDAO::CriarSessao($nome, $id);
           
            header('location: meus_dados.php');
            exit;
        }
    }


    public function Cadastrar($nome,$email,$senha,$resenha){
        
        if (trim($nome) == '' || trim($email)== '' || trim($senha)== '' || trim($resenha)== '') {
            
            return 0;
        }
        if (strlen($senha) < 6) {
            return -7;
        }
        if (trim($senha) != trim($resenha))
            return -4;

        if ($this->ValidarEmail($email))
            return -6;

        $conexao = parent::retornaConexao();
        $comando_sql = 'insert into tb_usuario (nome_usuario, email_usuario, senha_usuario, data_usuario) values (?,?,?,?)';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $senha);
        $sql->bindValue(4, UtilDAO::DataHoraAtual());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
             echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarUsuario(){

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_usuario, nome_usuario, email_usuario, senha_usuario, data_usuario 
                            from tb_usuario where id_usuario = ? ';

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function DetalharUsuario($id_user){

        if ($id_user == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_usuario, nome_usuario, email_usuario, senha_usuario, data_usuario 
                             from tb_usuario where id_usuario = ? ';

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function AlterarUsuario($nome, $email, $senha, $cod){

        if (trim($nome) == '' || trim($senha)== '' || trim($email)== '' || trim($cod)== '') {
            
            return 0;
        }
        if ($this->ValidarEmailAlterar($email)) {
            return -6;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_usuario set nome_usuario = ?, email_usuario = ?, senha_usuario = ? where id_usuario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $senha);
        $sql->bindValue(4, $cod);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;

        }

    }


}