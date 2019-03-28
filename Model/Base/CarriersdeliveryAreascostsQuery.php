<?php

namespace CarriersDelivery\Model\Base;

use \Exception;
use \PDO;
use CarriersDelivery\Model\CarriersdeliveryAreascosts as ChildCarriersdeliveryAreascosts;
use CarriersDelivery\Model\CarriersdeliveryAreascostsQuery as ChildCarriersdeliveryAreascostsQuery;
use CarriersDelivery\Model\Map\CarriersdeliveryAreascostsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'carriersdelivery_areascosts' table.
 *
 *
 *
 * @method     ChildCarriersdeliveryAreascostsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCarriersdeliveryAreascostsQuery orderByCarrierareaId($order = Criteria::ASC) Order by the carrierarea_id column
 * @method     ChildCarriersdeliveryAreascostsQuery orderByWeightMax($order = Criteria::ASC) Order by the weight_max column
 * @method     ChildCarriersdeliveryAreascostsQuery orderByCost($order = Criteria::ASC) Order by the cost column
 *
 * @method     ChildCarriersdeliveryAreascostsQuery groupById() Group by the id column
 * @method     ChildCarriersdeliveryAreascostsQuery groupByCarrierareaId() Group by the carrierarea_id column
 * @method     ChildCarriersdeliveryAreascostsQuery groupByWeightMax() Group by the weight_max column
 * @method     ChildCarriersdeliveryAreascostsQuery groupByCost() Group by the cost column
 *
 * @method     ChildCarriersdeliveryAreascostsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCarriersdeliveryAreascostsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCarriersdeliveryAreascostsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCarriersdeliveryAreascostsQuery leftJoinCarriersdeliveryAreas($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarriersdeliveryAreas relation
 * @method     ChildCarriersdeliveryAreascostsQuery rightJoinCarriersdeliveryAreas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarriersdeliveryAreas relation
 * @method     ChildCarriersdeliveryAreascostsQuery innerJoinCarriersdeliveryAreas($relationAlias = null) Adds a INNER JOIN clause to the query using the CarriersdeliveryAreas relation
 *
 * @method     ChildCarriersdeliveryAreascosts findOne(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryAreascosts matching the query
 * @method     ChildCarriersdeliveryAreascosts findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryAreascosts matching the query, or a new ChildCarriersdeliveryAreascosts object populated from the query conditions when no match is found
 *
 * @method     ChildCarriersdeliveryAreascosts findOneById(int $id) Return the first ChildCarriersdeliveryAreascosts filtered by the id column
 * @method     ChildCarriersdeliveryAreascosts findOneByCarrierareaId(int $carrierarea_id) Return the first ChildCarriersdeliveryAreascosts filtered by the carrierarea_id column
 * @method     ChildCarriersdeliveryAreascosts findOneByWeightMax(string $weight_max) Return the first ChildCarriersdeliveryAreascosts filtered by the weight_max column
 * @method     ChildCarriersdeliveryAreascosts findOneByCost(string $cost) Return the first ChildCarriersdeliveryAreascosts filtered by the cost column
 *
 * @method     array findById(int $id) Return ChildCarriersdeliveryAreascosts objects filtered by the id column
 * @method     array findByCarrierareaId(int $carrierarea_id) Return ChildCarriersdeliveryAreascosts objects filtered by the carrierarea_id column
 * @method     array findByWeightMax(string $weight_max) Return ChildCarriersdeliveryAreascosts objects filtered by the weight_max column
 * @method     array findByCost(string $cost) Return ChildCarriersdeliveryAreascosts objects filtered by the cost column
 *
 */
abstract class CarriersdeliveryAreascostsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CarriersDelivery\Model\Base\CarriersdeliveryAreascostsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CarriersDelivery\\Model\\CarriersdeliveryAreascosts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCarriersdeliveryAreascostsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCarriersdeliveryAreascostsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CarriersDelivery\Model\CarriersdeliveryAreascostsQuery) {
            return $criteria;
        }
        $query = new \CarriersDelivery\Model\CarriersdeliveryAreascostsQuery();
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
     * @return ChildCarriersdeliveryAreascosts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarriersdeliveryAreascostsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CarriersdeliveryAreascostsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildCarriersdeliveryAreascosts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, CARRIERAREA_ID, WEIGHT_MAX, COST FROM carriersdelivery_areascosts WHERE ID = :p0';
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
            $obj = new ChildCarriersdeliveryAreascosts();
            $obj->hydrate($row);
            CarriersdeliveryAreascostsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCarriersdeliveryAreascosts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
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
    public function findPks($keys, $con = null)
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
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the carrierarea_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCarrierareaId(1234); // WHERE carrierarea_id = 1234
     * $query->filterByCarrierareaId(array(12, 34)); // WHERE carrierarea_id IN (12, 34)
     * $query->filterByCarrierareaId(array('min' => 12)); // WHERE carrierarea_id > 12
     * </code>
     *
     * @see       filterByCarriersdeliveryAreas()
     *
     * @param     mixed $carrierareaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function filterByCarrierareaId($carrierareaId = null, $comparison = null)
    {
        if (is_array($carrierareaId)) {
            $useMinMax = false;
            if (isset($carrierareaId['min'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::CARRIERAREA_ID, $carrierareaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carrierareaId['max'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::CARRIERAREA_ID, $carrierareaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::CARRIERAREA_ID, $carrierareaId, $comparison);
    }

    /**
     * Filter the query on the weight_max column
     *
     * Example usage:
     * <code>
     * $query->filterByWeightMax(1234); // WHERE weight_max = 1234
     * $query->filterByWeightMax(array(12, 34)); // WHERE weight_max IN (12, 34)
     * $query->filterByWeightMax(array('min' => 12)); // WHERE weight_max > 12
     * </code>
     *
     * @param     mixed $weightMax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function filterByWeightMax($weightMax = null, $comparison = null)
    {
        if (is_array($weightMax)) {
            $useMinMax = false;
            if (isset($weightMax['min'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::WEIGHT_MAX, $weightMax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weightMax['max'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::WEIGHT_MAX, $weightMax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::WEIGHT_MAX, $weightMax, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost > 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::COST, $cost, $comparison);
    }

    /**
     * Filter the query by a related \CarriersDelivery\Model\CarriersdeliveryAreas object
     *
     * @param \CarriersDelivery\Model\CarriersdeliveryAreas|ObjectCollection $carriersdeliveryAreas The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function filterByCarriersdeliveryAreas($carriersdeliveryAreas, $comparison = null)
    {
        if ($carriersdeliveryAreas instanceof \CarriersDelivery\Model\CarriersdeliveryAreas) {
            return $this
                ->addUsingAlias(CarriersdeliveryAreascostsTableMap::CARRIERAREA_ID, $carriersdeliveryAreas->getId(), $comparison);
        } elseif ($carriersdeliveryAreas instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CarriersdeliveryAreascostsTableMap::CARRIERAREA_ID, $carriersdeliveryAreas->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCarriersdeliveryAreas() only accepts arguments of type \CarriersDelivery\Model\CarriersdeliveryAreas or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CarriersdeliveryAreas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function joinCarriersdeliveryAreas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CarriersdeliveryAreas');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CarriersdeliveryAreas');
        }

        return $this;
    }

    /**
     * Use the CarriersdeliveryAreas relation CarriersdeliveryAreas object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarriersDelivery\Model\CarriersdeliveryAreasQuery A secondary query class using the current class as primary query
     */
    public function useCarriersdeliveryAreasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCarriersdeliveryAreas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CarriersdeliveryAreas', '\CarriersDelivery\Model\CarriersdeliveryAreasQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCarriersdeliveryAreascosts $carriersdeliveryAreascosts Object to remove from the list of results
     *
     * @return ChildCarriersdeliveryAreascostsQuery The current query, for fluid interface
     */
    public function prune($carriersdeliveryAreascosts = null)
    {
        if ($carriersdeliveryAreascosts) {
            $this->addUsingAlias(CarriersdeliveryAreascostsTableMap::ID, $carriersdeliveryAreascosts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the carriersdelivery_areascosts table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryAreascostsTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CarriersdeliveryAreascostsTableMap::clearInstancePool();
            CarriersdeliveryAreascostsTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCarriersdeliveryAreascosts or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCarriersdeliveryAreascosts object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryAreascostsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CarriersdeliveryAreascostsTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        CarriersdeliveryAreascostsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CarriersdeliveryAreascostsTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // CarriersdeliveryAreascostsQuery
