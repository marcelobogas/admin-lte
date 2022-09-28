<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class Users
{            
    /**
     * Method select
     *
     * @param string $email
     * @param integer $id
     *
     * @return array
     */
    public static function select($email = null, $id = null)
    {
        /* obtém uma lista com todos os usuários */
        if (is_null($email) && is_null($id)) {
            $sql = "SELECT * FROM users";
        }

        /* obtém os dados de um usário com base no seu e-mail */
        if (!is_null($email) && is_null($id)) {
            $sql = "SELECT * FROM users WHERE email LIKE '%{$email}%'";
        }

        /* obtém os dados de um usuário com base no id informado */
        if (!is_null($id) && is_null($email)) {
            $sql = "SELECT * FROM users WHERE id = {$id}";
        }

        try {

            /* obtém uma instância de conexão com o banco de dados */
            $conn = Database::getConnection();

            /* prepara e executa a query no banco */
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            /* armazena as informações obtidas pela query */
            $response = $stmt->fetchAll();

            /* fecha a conexão com o banco */
            unset($stmt);

            /* retorna um array as informações obtidas pela query */
            return $response;
        } catch (PDOException $ex) {
            die("ERROR: " . $ex->getMessage());
        }
    }

    /**
     * Método responsável por inserir um novo usuário
     *
     * @param array $postVars 
     *
     * @return integer
     */
    public static function insert($postVars)
    {
        try {
            /* obtém uma instância de conexão com o banco de dados */
            $conn = Database::getConnection();

            $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";

        /* prepara e executa a ação no banco */
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':first_name', $postVars['registerFirstName'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $postVars['registerLastName'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $postVars['registerEmail'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $postVars['registerPassword'], PDO::PARAM_STR);
        $stmt->execute();

            /* fecha a conexão com o banco */
            unset($stmt);

            /* retorna o id criado para o usuário */
            return $conn->lastInsertId();
        } catch (PDOException $ex) {
            /* mensagem de erro que ocorreu na transação */
            die("ERROR: " . $ex->getMessage());
        }
    }
}
