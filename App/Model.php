<?php
/**
 * P.One PHP Framework
 * Very simple PHP framework
 *
 * PHP version 7.2.0
 *
 * @category Application
 * @package  App
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  GIT: 0.1.0
 * @link     http://example.domain
 */
namespace App;

defined('ROOT') or
    die('This script is not directly accesible.');

/**
 * Class Model
 *
 * Base to use by others "Models classes".
 *
 * @category Class
 * @package  App
 * @author   Felipe Rodrigues <fessrodrigues@outlook.com>
 * @license  MIT 
 * @version  Release: v0.1.0-alpha.0
 * @link     http://example.domain
 */
class Model
{
    /**
     * Attributes
     *
     * @var string
     */
    protected $attributes;

    /**
     * Table
     *
     * @var string
     */
    protected $table;
    
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = Database::conect();
    }
 
    /**
     * __set
     *
     * @param string $attribute 
     * @param type   $value 
     *
     * @return object
     */
    public function __set(string $attribute, $value)
    {
        $this->attributes[$attribute] = $value;
        return $this;
    }
 
    /**
     * __get
     *
     * @param string $attribute 
     *
     * @return array
     */
    public function __get(string $attribute)
    {
        return $this->attributes[$attribute];
    }
 
    /**
     * __isset
     *
     * @param type $attribute 
     *
     * @return array
     */
    public function __isset($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    /**
     * SetAttributes
     *
     * @param array $data Dados para preparacao
     *
     * @return array
     */
    protected function setAttributes(array $data) : array
    {
        $prepared = array();

        foreach ($data as $key => $value) {
            if (is_scalar($value)) {
                $prepared[$key] = $this->escape($value);
            }
        }

        return $prepared;
    }

    /**
     * Escape
     *
     * Reponsavel por transformar os dados
     * em valores aceitaveis.
     *
     * @param type $data Dados a serem processados
     *
     * @return string
     */
    protected function escape($data) : string
    {
        if (is_string($data) & !empty($data)) {
            return "'" . addslashes($data) . "'";
        } elseif (is_bool($data)) {
            return $data ? 'TRUE' : 'FALSE';
        } elseif ($data !== '') {
            return $data;
        } else {
            return 'NULL';
        }
    }

    /**
     * Save
     *
     * Realizar acoes de Insercao, Atualiacao ou
     * Delecao do registro, em que somente eh preciso a
     * confirmacao da execucao.
     *
     * @param string $query  Contem a query
     * @param array  $params Parametros para execucao da query
     *
     * @return array
     */
    protected function save(string $query, array $params = []) : bool
    {
        try {
            $stmt = $this->db->prepare($query);

            $stmt->execute($params);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            return false;
        }
    }

    /**
     * GetRows
     *
     * Realizar consulta conforme parametros solicitados
     * e retorna os registros correspondentes.
     *
     * @param string $query  Contem a query
     * @param array  $params Parametros para execucao da query
     *
     * @return array
     */
    protected function getRows(string $query, array $params = []) : array
    {
        $registros = array();

        try {
            $stmt = $this->db->prepare($query);

            $stmt->execute($params);
            $registros = $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            return $registros;
        }
    }

    /**
     * Insert
     *
     * @return bool
     */
    public function insert() : bool
    {
        $data = $this->setAttributes($this->attributes);

        $query = "INSERT INTO " . $this->table
               . " (". implode(', ', array_keys($data)). ") "
               . "VALUES (" . implode(', ', array_values($data)).");";

        if ($this->save($query)) {
            return true;
        }

        return false;
    }

    /**
     * Update
     *
     * @param int $id Row ID
     *
     * @return bool
     */
    public function update(int $id) : bool
    {
        $data = $this->setAttributes($this->attributes);

        foreach ($data as $key => $value) {
            if ($key !== 'id%') {
                $define[] = "{$key} ={$value}";
            }
        }

        $query = "UPDATE " . $this->table
               . " SET " . implode(', ', $define)
               . " WHERE " . key($data) . " = :" . key($data);

        if ($this->save($query, $data)) {
            return true;
        }

        return false;
    }
  
    /**
     * ListAll
     *
     * @return array
     */
    public function listAll() : array
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($query);

        return $this->getRows($query);
    }

 
    /**
     * List
     *
     * @return array
     */
    public function list() : array
    {
        $data = $this->setAttributes($this->attributes);

        $query = "SELECT * FROM " . $this->table
                . " WHERE " . key($data) . " = :" . key($data);

        for ($i = 0; $i <= count($data); $i++) {
            if (next($data)) {
                $query .= " AND " . key($data) . " = :" . key($data);
            }
        }
        
        return $this->getRows($query, $data);
    }
 
    /**
     * Delete
     *
     * @return bool
     */
    public function delete() : bool
    {
        $data = $this->setAttributes($this->attributes);

        $query = "DELETE FROM " . $this->table
               . " WHERE " . key($data) . " = :" . key($data);

        if ($this->save($query, $data)) {
            return true;
        }
        
        return false;
    }
}