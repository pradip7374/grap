<?php

namespace App\Model\Base;

use \Exception;
use \PDO;
use App\Model\DataWidth as ChildDataWidth;
use App\Model\DataWidthQuery as ChildDataWidthQuery;
use App\Model\Map\DataWidthTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'data_width' table.
 *
 *
 *
 * @method     ChildDataWidthQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDataWidthQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildDataWidthQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildDataWidthQuery orderByCount($order = Criteria::ASC) Order by the count column
 *
 * @method     ChildDataWidthQuery groupById() Group by the id column
 * @method     ChildDataWidthQuery groupByDate() Group by the date column
 * @method     ChildDataWidthQuery groupByWidth() Group by the width column
 * @method     ChildDataWidthQuery groupByCount() Group by the count column
 *
 * @method     ChildDataWidthQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDataWidthQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDataWidthQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDataWidthQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDataWidthQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDataWidthQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDataWidth findOne(ConnectionInterface $con = null) Return the first ChildDataWidth matching the query
 * @method     ChildDataWidth findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDataWidth matching the query, or a new ChildDataWidth object populated from the query conditions when no match is found
 *
 * @method     ChildDataWidth findOneById(int $id) Return the first ChildDataWidth filtered by the id column
 * @method     ChildDataWidth findOneByDate(string $date) Return the first ChildDataWidth filtered by the date column
 * @method     ChildDataWidth findOneByWidth(int $width) Return the first ChildDataWidth filtered by the width column
 * @method     ChildDataWidth findOneByCount(int $count) Return the first ChildDataWidth filtered by the count column *

 * @method     ChildDataWidth requirePk($key, ConnectionInterface $con = null) Return the ChildDataWidth by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataWidth requireOne(ConnectionInterface $con = null) Return the first ChildDataWidth matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDataWidth requireOneById(int $id) Return the first ChildDataWidth filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataWidth requireOneByDate(string $date) Return the first ChildDataWidth filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataWidth requireOneByWidth(int $width) Return the first ChildDataWidth filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDataWidth requireOneByCount(int $count) Return the first ChildDataWidth filtered by the count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDataWidth[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDataWidth objects based on current ModelCriteria
 * @method     ChildDataWidth[]|ObjectCollection findById(int $id) Return ChildDataWidth objects filtered by the id column
 * @method     ChildDataWidth[]|ObjectCollection findByDate(string $date) Return ChildDataWidth objects filtered by the date column
 * @method     ChildDataWidth[]|ObjectCollection findByWidth(int $width) Return ChildDataWidth objects filtered by the width column
 * @method     ChildDataWidth[]|ObjectCollection findByCount(int $count) Return ChildDataWidth objects filtered by the count column
 * @method     ChildDataWidth[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DataWidthQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Model\Base\DataWidthQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Model\\DataWidth', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDataWidthQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDataWidthQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDataWidthQuery) {
            return $criteria;
        }
        $query = new ChildDataWidthQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDataWidth|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DataWidthTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DataWidthTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDataWidth A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, date, width, count FROM data_width WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDataWidth $obj */
            $obj = new ChildDataWidth();
            $obj->hydrate($row);
            DataWidthTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildDataWidth|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDataWidthQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DataWidthTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDataWidthQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DataWidthTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataWidthQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataWidthTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataWidthQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataWidthTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width > 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataWidthQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataWidthTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the count column
     *
     * Example usage:
     * <code>
     * $query->filterByCount(1234); // WHERE count = 1234
     * $query->filterByCount(array(12, 34)); // WHERE count IN (12, 34)
     * $query->filterByCount(array('min' => 12)); // WHERE count > 12
     * </code>
     *
     * @param     mixed $count The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDataWidthQuery The current query, for fluid interface
     */
    public function filterByCount($count = null, $comparison = null)
    {
        if (is_array($count)) {
            $useMinMax = false;
            if (isset($count['min'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_COUNT, $count['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($count['max'])) {
                $this->addUsingAlias(DataWidthTableMap::COL_COUNT, $count['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataWidthTableMap::COL_COUNT, $count, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDataWidth $dataWidth Object to remove from the list of results
     *
     * @return $this|ChildDataWidthQuery The current query, for fluid interface
     */
    public function prune($dataWidth = null)
    {
        if ($dataWidth) {
            $this->addUsingAlias(DataWidthTableMap::COL_ID, $dataWidth->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the data_width table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DataWidthTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DataWidthTableMap::clearInstancePool();
            DataWidthTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DataWidthTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DataWidthTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DataWidthTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DataWidthTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DataWidthQuery
