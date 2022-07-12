<?php
require_once 'Conexao.php';



class validarCupom extends Conexao
{
    public function ValidaCupom($cupom)
    {

        $conexao = parent::retornaConexao();

        $comando_sql = 'Select count(UserCupom) as cp from cupom Where UserCupom = ?';

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $cupom);
        $sql->execute();

        $cp = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($cp[0]['cp'] == 0) {
            
            return -4;
        }

        //Passo 1 = Variavel de conexão.
        $conexao = parent::retornaConexao();

        //Passo 2 = Comando SQL
        $comando_sql = 'Select validar, UserCupom from cupom Where UserCupom = ?';

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $cupom);
        $sql->execute();

        $cp = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ($cp[0]['validar'] == 'S') {

            return -3;
        } else {

            $comando_sql = ('Update cupom set validar = ? where UserCupom = ?');

            // Passo 3 = sql recebe conexão preparando a conexçaão

            $sql = $conexao->prepare($comando_sql);

            // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações

            $sql->bindValue(1, 'S');
            $sql->bindValue(2, $cupom);
            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                return -1;
            }
        }
    }
}
