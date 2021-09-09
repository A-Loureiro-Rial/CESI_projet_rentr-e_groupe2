<?php
require '../env.php';

class DB
{
    public static $pdo = NULL;

    public static function getDBInstance()
    {
        self::$pdo = self::$pdo != NULL? self::$pdo: new PDO(DB.HOST.DBNAME, DBUSER, DBKEYPASS);
        return self::$pdo;
    }

    public static function insert($table, $indexes, $values)
    {
        try
        {
            if (!isset($table) || !isset($indexes) || !isset($values) || count($indexes) != count($values))
            {
                throw new Exception('Invalid parameters');
            }
            $stmt = self::getDBInstance()->prepare('INSERT INTO ' . $table . ' ('. implode(', ', $indexes) . ') VALUES (:' . implode(', :', $indexes) . ');');
            $length = count($indexes);
            for ($i = 0; $i < $length; $i++)
            {
                if ($indexes[$i] != 'a_id')
                {
                    echo 'je binde :' . $indexes[$i] . ' qui vaut ->' . $values[$i].PHP_EOL;
                    $stmt->bindParam(':' . $indexes[$i], $values[$i]);
                }
            }
            $stmt->execute();
        }
        catch(Exception $e)
        {
            return $e;
        }
    }

    public static function update($table, $indexes, $values, $condition = '')
    {
        try
        {
            if (!isset($table) || !isset($indexes) || !isset($values) || count($indexes) != count($values))
            {
                throw new Exception('Invalid parameters');
            }
            $length = count($indexes);
            $query = 'UPDATE ' . $table . ' SET ';
            for ($i = 0; $i < $length; $i++)
            {
                $query .= $i == 0 ? $indexes[$i] . '=:' . $indexes[$i] : ', ' . $indexes[$i] . '=:' . $indexes[$i];
            }
            $query .= ' ' . $condition;
            $query .= ';';
            

            $stmt = self::getDBInstance()->prepare($query);
            for ($i = 0; $i < $length; $i++)
            {
                $stmt->bindParam(':' . $indexes[$i], $values[$i]);
            }
            $stmt->execute();
        }
        catch (Exception $e)
        {
            echo $e;
        }
    }

    public static function delete($table, $condition)
    {
        try
        {
            if (!isset($table) || !isset($condition))
            {
                throw new Exception('Invalid Parameters');
            }
            $stmt = self::getDBInstance()->prepare('DELETE FROM ' . $table . ' WHERE ' . $condition . ';');
            $stmt->execute();
        }
        catch (Exception $e)
        {
            return $e;
        }
    }

    public static function select($table, $values, $condition = '')
    {
        try
        {
            if (!isset($table))
            {
                throw new Exception('Invalid Parameter');
            }
            $stmt = self::getDBInstance()->prepare('SELECT ' . $values . ' FROM ' . $table. ' ' . $condition . ';');
            $stmt->execute();
            return $stmt->Fetchall(PDO::FETCH_ASSOC);
        }
        catch (Exception $e)
        {
            return $e;
        }
    }
}