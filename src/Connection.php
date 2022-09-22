<?php

declare(strict_types=1);

/*
 * This file is part of the FODDBALClickHouse package -- Doctrine DBAL library
 * for ClickHouse (a column-oriented DBMS for OLAP <https://clickhouse.yandex/>)
 *
 * (c) FriendsOfDoctrine <https://github.com/FriendsOfDoctrine/>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOD\DBALClickHouse;

use function strtoupper;
use function substr;
use function trim;

/**
 * ClickHouse Connection
 */
class Connection extends \Doctrine\DBAL\Connection
{
    /**
     * {@inheritDoc}
     */
    public function executeUpdate(string $sql, array $params = [], array $types = []) : int
    {
        // ClickHouse has no UPDATE or DELETE statements
        $command = strtoupper(substr(trim($sql), 0, 6));
        if ($command === 'UPDATE' || $command === 'DELETE') {
            throw new ClickHouseException('UPDATE and DELETE are not allowed in ClickHouse');
        }

        return parent::executeUpdate($sql, $params, $types);
    }

    /**
     * @throws ClickHouseException
     */
    public function delete($table, array $criteria, array $types = []) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function update($table, array $data, array $criteria, array $types = []) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * all methods below throw exceptions, because ClickHouse has not transactions
     */

    /**
     * @throws ClickHouseException
     */
    public function setTransactionIsolation($level) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function getTransactionIsolation() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function getTransactionNestingLevel() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function transactional(\Closure $func) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function setNestTransactionsWithSavepoints($nestTransactionsWithSavepoints) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function getNestTransactionsWithSavepoints() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function beginTransaction() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function commit() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function rollBack() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function createSavepoint($savepoint) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function releaseSavepoint($savepoint) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function rollbackSavepoint($savepoint) : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function setRollbackOnly() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }

    /**
     * @throws ClickHouseException
     */
    public function isRollbackOnly() : void
    {
        throw ClickHouseException::notSupported(__METHOD__);
    }
}
