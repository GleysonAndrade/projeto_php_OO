<?php 

namespace Sts\Models\helper;

use PDO;
use PDOException;

//Redirecionar ou parar processamento quando o usuário não acessa o arquivo index.
//Verifica se o usuário está vindo da pagina index
if(!defined('C7E3L8K9E5')){
    header("Location: /");
    // die("Erro: Página não encontrada");
}

/**
 * Faz a conexão com banco de dados
 * 
 * @author Gleyson <email@email.com>
 */
abstract class Stsconn
{
    /** * @var string  $host Recebe o host da constante HOST*/
    private string $host = HOST;   
    /** * @var string  $user Recebe o usuário da constante USER*/
    private string $user = USER;   
    /** * @var string  $pass Recebe a senha da constante PASS*/
    private string $pass = PASS;   
    /** * @var string  $dbname Recebe a base de dados da constante DBNAME*/
    private string $dbname = DBNAME;   
    /** * @var int  $port Recebe a porta da constante PORT*/
    private int $port = PORT;
    /** * @var object  $connect Recebe a conexão com banco de dados */
    private object $connect;

    /**
     * Cria a conexão com banco de dados
     *
     * @return object
     */
    public function connectDb(): object
    {
        try {
            //Conexão com a porta
            $this->connect = new PDO("mysql:host{$this->host};port={$this->port};dbname=" . $this->dbname, $this->user, $this->pass);

            return $this->connect;
        } catch (PDOException $err) {
            die("Error: Por favor tente novamente. Caso o problema persista, entre em contato como a administrador" . EMAILADM);
        }
    }
}
?>