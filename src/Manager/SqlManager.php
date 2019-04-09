<?php
/**
 * Created by PhpStorm.
 * User: toor
 * Date: 21.08.18
 * Time: 12:55
 */

namespace Manager;


class SqlManager extends MainManager
{
    public function sql()
    {
        $sqlFile = $this->getSqlConfig();

        $db = new \PDO('mysql:host='.$sqlFile['host'].';dbname='.$sqlFile['database'].';charset=utf8mb4', $sqlFile['username'], $sqlFile['password']);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        return $db;
    }
}