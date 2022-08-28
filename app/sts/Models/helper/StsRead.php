<?php 

namespace Sts\Models\helper;

if(!defined('C7E3L8K9E5')){
    // header("Location: /");
    die("Erro: Página não encontrada");
}

use PDO;
use PDOException;

/**
 * Helper reponsevel em buscar os regitros no banco de dados
 * 
 * @author Gleyson <email@email.com>
 */
class StsRead extends StsConn
{
    private string $select;
    private array $values = [];
    private array $result = [];
    private object $query;
    private object $conn;

    function getResult(): array
    {
        return $this->result;
    }

    /** 
     * Recebe os valores para montar a QUERY.
     * Converte a parseString de string para array.
     * @param string $table Recebe o nome da tabela do banco de dados
     * @param string $terms Recebe os links da QUERY, ex: sts_situation_id =:sts_situation_id
     * @param string $parseString Recebe o valores que devem ser subtituidos no link, ex: sts_situation_id=1
     * 
     * @return void
     */
    public function exeRead(string $table, string $terms = null, string $parseString = null)
    {

        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
            
        }

        $this->select = "SELECT * FROM {$table} {$terms}";

        $this->exeInstruction();
    }

    /**
     * Recebe os valores para montar a QUERY.
     * Converte a parseString de string para array.
     * @param string $query Recebe a QUERY da Models
     * @param string $parseString Recebe o valores que devem ser subtituidos no link, ex: sts_situation_id=1
     * 
     * @return void
     */
    public function fullRead(string $query, $parseString = null)
    {
       $this->select = $query;

        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }
        $this->exeInstruction();
    }

    /**
     * Executa a QUERY. 
     * Quando executa a query com sucesso retorna o array de dados, senão retorna null.
     * 
     * @return void
     */
    private function exeInstruction()
    {
        $this->connection();
        try {
            $this->exeParameter();
            
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        } catch (PDOException $err) {
            $this->result = null;
        }
    }

    /**
     * Obtem a conexão com o banco de dados da classe pai "Conn".
     * Prepara uma instrução para execução e retorna um objeto de instrução.
     * 
     * @return void
     */
    private function connection()
    {
        $this->conn = $this->connectDb();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }

     /**
     * Substitui os link da QUERY pelo valores utilizando o bindValue
     * 
     * @return void
     */
    private  function exeParameter()
    {
        if($this->values){
            
            foreach ($this->values as $link => $value) {
                if($link == 'limit' || $link == 'offset' || $link == 'id'){
                   $value = (int) $value;
                }
                $this->query->bindValue(":{$link}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
