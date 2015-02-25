<?php
/**
 * Created by: Adam Napora <anapora@apple.com>
 * Date: 08/02/15
 * Time: 09:52
 */

/**
 * Class AbstractModel
 */
abstract class AbstractModel extends PDO
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * Table name associated with this model
     *
     * @var string
     */
    protected $table;

    /**
     * Connect to db when model is instantiated
     */
    public function __construct()
    {
        if (!$this->connection) {
            $this->connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /**
     * Get data from db.
     * Example:
     *     $data = $myModel->find(); // get all data from table
     *
     * @param string $fields
     * @param string $where
     * @param array $bindParams
     * @return array
     */
    public function find($fields = '*', $where = '', array $bindParams = [])
    {
        $where = $where ? "WHERE $where" : '';
        return $this->getResults("SELECT $fields FROM $this->table $where", $bindParams);
    }

    /**
     * Execute SQL statement
     *
     * @param string $query
     * @param array $bindParams
     * @return mixed
     */
    public function select($query, array $bindParams = [])
    {
        return $this->getResults($query, $bindParams);
    }

    /**
     * Insert into db.
     * Example:
     *     $noOfRows = $myModel->insert([':firstName' => 'Adam']);
     *
     * For details:
     * @see http://php.net/manual/en/pdo.prepared-statements.php
     *
     * @param array $bindParams
     * @return int
     */
    public function insert(array $bindParams)
    {
        $fields = [];

        foreach ($bindParams as $key => $val) {
            $fields[] = str_replace(':', '', $key);
        }

        $fields = implode(', ', $fields);
        $values = implode(', ', array_keys($bindParams));
        $stmt   = $this->connection->prepare("INSERT INTO $this->table ($fields) VALUES ($values)");

        $stmt->execute($bindParams);

        return $stmt->rowCount();
    }

    /**
     * Update row(s) in db.
     * Example:
     *     $noOfUpdatedRows = $myModel->update(
     *         ['firstName' => ':firstName'],
     *         'firstName = :oldName'
     *         [':firstName' => 'Chris', ':oldName' = 'Adam']
     *     );
     *
     * @param $fields
     * @param string $where
     * @param array $bindParams
     * @return int
     */
    public function update($fields, $where = '', array $bindParams = [])
    {
        $where = $where ? "WHERE $where" : '';
        $stmt  = $this->connection->prepare("UPDATE $this->table SET $fields $where");

        $stmt->execute($bindParams);

        return $stmt->rowCount();
    }

    /**
     * Delete row(s) from db.
     * Example:
     *     $noOfRowsDeleted = $myModel->delete('id NOT NULL AND firstName LIKE :name', [':name' => '%Ad']);
     *
     * @param string $where
     * @param array $bindParams
     * @return bool
     */
    public function delete($where = '', array $bindParams = [])
    {
        $where = $where ? "WHERE $where" : '';
        $stmt  = $this->connection->prepare("DELETE FROM $this->table $where");

        $stmt->execute($bindParams);

        return $stmt->rowCount();
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Fetch results
     *
     * @param string $query
     * @param array $bindParams
     * @return mixed
     */
    private function getResults($query, array $bindParams)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($bindParams);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
