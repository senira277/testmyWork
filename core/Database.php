<?php

namespace core;

use core\exceptions\ConstraintViolationException;
use PDO;
use PDOException;

class Database
{
    protected static PDO $conn;

    protected static function connect()
    {
        if (!isset(self::$conn)) {
            $dbhost = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            self::$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $_ENV['DB_USER'], $_ENV['DB_PASS']);
        }
        return self::$conn;
    }

    static function conn()
    {
        return self::connect();
    }

    static function exec(string $query, array $params)
    {
        //var_dump([$query,$params]);
        $stmt = self::connect()->prepare($query);
        try {
            assert($stmt->execute($params));
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new ConstraintViolationException();
            }
            throw $e;
        }
        return $stmt;
    }

    static function query_row(string $query, array $params)
    {
        $stmt = self::exec($query, $params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) == 0)
            return null;
        assert(count($rows) == 1);
        return $rows[0];
    }

    // New method to retrieve multiple rows
    static function query_rows(string $query, array $params = [])
    {
        // Execute the query using the exec function
        $stmt = self::exec($query, $params);

        // Fetch all rows as an associative array
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the result set, or null if no records were found
        return count($rows) > 0 ? $rows : null;
    }


    static function change_row(string $query, array $params)
    {
        $stmt = self::exec($query, $params);
        return $stmt->rowCount() == 1;
    }
}
