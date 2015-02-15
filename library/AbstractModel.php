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
     *     $data = $myModel->find([':lastName' => 'Napora'],
     *         'name IS NULL OR lastName = :lastName); // get data where name: is null or last_name: Napora
     *
     *
     * @param array $bindParams
     * @param string $where
     * @param string $fields
     * @return array
     */
    public function find(array $bindParams = [], $where = '', $fields = '*')
    {
        $where = $where ? "WHERE $where" : '';
        $stmt  = $this->connection->prepare("SELECT $fields FROM $this->table $where");

        $stmt->execute($bindParams);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
     *         [':firstName' => 'Chris', ':oldName' = 'Adam'],
     *         'firstName = :oldName'
     *     );
     *
     * @param $fields
     * @param array $bindParams
     * @param string $where
     * @return int
     */
    public function update($fields, array $bindParams = [], $where = '')
    {
        $where = $where ? "WHERE $where" : '';
        $stmt  = $this->connection->prepare("UPDATE $this->table SET $fields $where");

        $stmt->execute($bindParams);

        return $stmt->rowCount();
    }

    /**
     * Delete row(s) from db.
     * Example:
     *     $noOfRowsDeleted = $myModel->delete([':name' => '%Ad'], 'id NOT NULL AND firstName LIKE :name');
     *
     * @param array $bindParams
     * @param string $where
     * @return bool
     */
    public function delete(array $bindParams = [], $where = '')
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
}
