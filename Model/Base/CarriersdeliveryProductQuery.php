<?php

namespace CarriersDelivery\Model\Base;

use \Exception;
use \PDO;
use CarriersDelivery\Model\CarriersdeliveryProduct as ChildCarriersdeliveryProduct;
use CarriersDelivery\Model\CarriersdeliveryProductQuery as ChildCarriersdeliveryProductQuery;
use CarriersDelivery\Model\Map\CarriersdeliveryProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\Product;

/**
 * Base class that represents a query for the 'carriersdelivery_product' table.
 *
 *
 *
 * @method     ChildCarriersdeliveryProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildCarriersdeliveryProductQuery orderByCarrierId($order = Criteria::ASC) Order by the carrier_id column
 *
 * @method     ChildCarriersdeliveryProductQuery groupByProductId() Group by the product_id column
 * @method     ChildCarriersdeliveryProductQuery groupByCarrierId() Group by the carrier_id column
 *
 * @method     ChildCarriersdeliveryProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCarriersdeliveryProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCarriersdeliveryProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCarriersdeliveryProductQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ChildCarriersdeliveryProductQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ChildCarriersdeliveryProductQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ChildCarriersdeliveryProductQuery leftJoinCarriersdeliveryCarrier($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarriersdeliveryCarrier relation
 * @method     ChildCarriersdeliveryProductQuery rightJoinCarriersdeliveryCarrier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarriersdeliveryCarrier relation
 * @method     ChildCarriersdeliveryProductQuery innerJoinCarriersdeliveryCarrier($relationAlias = null) Adds a INNER JOIN clause to the query using the CarriersdeliveryCarrier relation
 *
 * @method     ChildCarriersdeliveryProduct findOne(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryProduct matching the query
 * @method     ChildCarriersdeliveryProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryProduct matching the query, or a new ChildCarriersdeliveryProduct object populated from the query conditions when no match is found
 *
 * @method     ChildCarriersdeliveryProduct findOneByProductId(int $product_id) Return the first ChildCarriersdeliveryProduct filtered by the product_id column
 * @method     ChildCarriersdeliveryProduct findOneByCarrierId(int $carrier_id) Return the first ChildCarriersdeliveryProduct filtered by the carrier_id column
 *
 * @method     array findByProductId(int $product_id) Return ChildCarriersdeliveryProduct objects filtered by the product_id column
 * @method     array findByCarrierId(int $carrier_id) Return ChildCarriersdeliveryProduct objects filtered by the carrier_id column
 *
 */
abstract class CarriersdeliveryProductQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CarriersDelivery\Model\Base\CarriersdeliveryProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CarriersDelivery\\Model\\CarriersdeliveryProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCarriersdeliveryProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCarriersdeliveryProductQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CarriersDelivery\Model\CarriersdeliveryProductQuery) {
            return $criteria;
        }
        $query = new \CarriersDelivery\Model\CarriersdeliveryProductQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$product_id, $carrier_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCarriersdeliveryProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarriersdeliveryProductTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CarriersdeliveryProductTableMap::DATABASE_NAME);
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
     * @return   ChildCarriersdeliveryProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT PRODUCT_ID, CARRIER_ID FROM carriersdelivery_product WHERE PRODUCT_ID = :p0 AND CARRIER_ID = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildCarriersdeliveryProduct();
            $obj->hydrate($row);
            CarriersdeliveryProductTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildCarriersdeliveryProduct|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CarriersdeliveryProductTableMap::PRODUCT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CarriersdeliveryProductTableMap::CARRIER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CarriersdeliveryProductTableMap::PRODUCT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CarriersdeliveryProductTableMap::CARRIER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(CarriersdeliveryProductTableMap::PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(CarriersdeliveryProductTableMap::PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryProductTableMap::PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the carrier_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCarrierId(1234); // WHERE carrier_id = 1234
     * $query->filterByCarrierId(array(12, 34)); // WHERE carrier_id IN (12, 34)
     * $query->filterByCarrierId(array('min' => 12)); // WHERE carrier_id > 12
     * </code>
     *
     * @see       filterByCarriersdeliveryCarrier()
     *
     * @param     mixed $carrierId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function filterByCarrierId($carrierId = null, $comparison = null)
    {
        if (is_array($carrierId)) {
            $useMinMax = false;
            if (isset($carrierId['min'])) {
                $this->addUsingAlias(CarriersdeliveryProductTableMap::CARRIER_ID, $carrierId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carrierId['max'])) {
                $this->addUsingAlias(CarriersdeliveryProductTableMap::CARRIER_ID, $carrierId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryProductTableMap::CARRIER_ID, $carrierId, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\Product object
     *
     * @param \Thelia\Model\Product|ObjectCollection $product The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof \Thelia\Model\Product) {
            return $this
                ->addUsingAlias(CarriersdeliveryProductTableMap::PRODUCT_ID, $product->getId(), $comparison);
        } elseif ($product instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CarriersdeliveryProductTableMap::PRODUCT_ID, $product->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type \Thelia\Model\Product or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', '\Thelia\Model\ProductQuery');
    }

    /**
     * Filter the query by a related \CarriersDelivery\Model\CarriersdeliveryCarrier object
     *
     * @param \CarriersDelivery\Model\CarriersdeliveryCarrier|ObjectCollection $carriersdeliveryCarrier The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function filterByCarriersdeliveryCarrier($carriersdeliveryCarrier, $comparison = null)
    {
        if ($carriersdeliveryCarrier instanceof \CarriersDelivery\Model\CarriersdeliveryCarrier) {
            return $this
                ->addUsingAlias(CarriersdeliveryProductTableMap::CARRIER_ID, $carriersdeliveryCarrier->getId(), $comparison);
        } elseif ($carriersdeliveryCarrier instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CarriersdeliveryProductTableMap::CARRIER_ID, $carriersdeliveryCarrier->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCarriersdeliveryCarrier() only accepts arguments of type \CarriersDelivery\Model\CarriersdeliveryCarrier or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CarriersdeliveryCarrier relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function joinCarriersdeliveryCarrier($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CarriersdeliveryCarrier');

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
            $this->addJoinObject($join, 'CarriersdeliveryCarrier');
        }

        return $this;
    }

    /**
     * Use the CarriersdeliveryCarrier relation CarriersdeliveryCarrier object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarriersDelivery\Model\CarriersdeliveryCarrierQuery A secondary query class using the current class as primary query
     */
    public function useCarriersdeliveryCarrierQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCarriersdeliveryCarrier($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CarriersdeliveryCarrier', '\CarriersDelivery\Model\CarriersdeliveryCarrierQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCarriersdeliveryProduct $carriersdeliveryProduct Object to remove from the list of results
     *
     * @return ChildCarriersdeliveryProductQuery The current query, for fluid interface
     */
    public function prune($carriersdeliveryProduct = null)
    {
        if ($carriersdeliveryProduct) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CarriersdeliveryProductTableMap::PRODUCT_ID), $carriersdeliveryProduct->getProductId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CarriersdeliveryProductTableMap::CARRIER_ID), $carriersdeliveryProduct->getCarrierId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the carriersdelivery_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryProductTableMap::DATABASE_NAME);
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
            CarriersdeliveryProductTableMap::clearInstancePool();
            CarriersdeliveryProductTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCarriersdeliveryProduct or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCarriersdeliveryProduct object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CarriersdeliveryProductTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        CarriersdeliveryProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CarriersdeliveryProductTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // CarriersdeliveryProductQuery
