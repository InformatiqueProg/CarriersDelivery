<?php

namespace CarriersDelivery\Model\Base;

use \Exception;
use \PDO;
use CarriersDelivery\Model\CarriersdeliveryAreas as ChildCarriersdeliveryAreas;
use CarriersDelivery\Model\CarriersdeliveryAreasQuery as ChildCarriersdeliveryAreasQuery;
use CarriersDelivery\Model\Map\CarriersdeliveryAreasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'carriersdelivery_areas' table.
 *
 *
 *
 * @method     ChildCarriersdeliveryAreasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCarriersdeliveryAreasQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCarriersdeliveryAreasQuery orderByCarrierId($order = Criteria::ASC) Order by the carrier_id column
 * @method     ChildCarriersdeliveryAreasQuery orderByDepartments($order = Criteria::ASC) Order by the departments column
 *
 * @method     ChildCarriersdeliveryAreasQuery groupById() Group by the id column
 * @method     ChildCarriersdeliveryAreasQuery groupByName() Group by the name column
 * @method     ChildCarriersdeliveryAreasQuery groupByCarrierId() Group by the carrier_id column
 * @method     ChildCarriersdeliveryAreasQuery groupByDepartments() Group by the departments column
 *
 * @method     ChildCarriersdeliveryAreasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCarriersdeliveryAreasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCarriersdeliveryAreasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCarriersdeliveryAreasQuery leftJoinCarriersdeliveryCarrier($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarriersdeliveryCarrier relation
 * @method     ChildCarriersdeliveryAreasQuery rightJoinCarriersdeliveryCarrier($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarriersdeliveryCarrier relation
 * @method     ChildCarriersdeliveryAreasQuery innerJoinCarriersdeliveryCarrier($relationAlias = null) Adds a INNER JOIN clause to the query using the CarriersdeliveryCarrier relation
 *
 * @method     ChildCarriersdeliveryAreasQuery leftJoinCarriersdeliveryAreascosts($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarriersdeliveryAreascosts relation
 * @method     ChildCarriersdeliveryAreasQuery rightJoinCarriersdeliveryAreascosts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarriersdeliveryAreascosts relation
 * @method     ChildCarriersdeliveryAreasQuery innerJoinCarriersdeliveryAreascosts($relationAlias = null) Adds a INNER JOIN clause to the query using the CarriersdeliveryAreascosts relation
 *
 * @method     ChildCarriersdeliveryAreasQuery leftJoinCarriersdeliveryAreascostskg($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarriersdeliveryAreascostskg relation
 * @method     ChildCarriersdeliveryAreasQuery rightJoinCarriersdeliveryAreascostskg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarriersdeliveryAreascostskg relation
 * @method     ChildCarriersdeliveryAreasQuery innerJoinCarriersdeliveryAreascostskg($relationAlias = null) Adds a INNER JOIN clause to the query using the CarriersdeliveryAreascostskg relation
 *
 * @method     ChildCarriersdeliveryAreas findOne(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryAreas matching the query
 * @method     ChildCarriersdeliveryAreas findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryAreas matching the query, or a new ChildCarriersdeliveryAreas object populated from the query conditions when no match is found
 *
 * @method     ChildCarriersdeliveryAreas findOneById(int $id) Return the first ChildCarriersdeliveryAreas filtered by the id column
 * @method     ChildCarriersdeliveryAreas findOneByName(string $name) Return the first ChildCarriersdeliveryAreas filtered by the name column
 * @method     ChildCarriersdeliveryAreas findOneByCarrierId(int $carrier_id) Return the first ChildCarriersdeliveryAreas filtered by the carrier_id column
 * @method     ChildCarriersdeliveryAreas findOneByDepartments(array $departments) Return the first ChildCarriersdeliveryAreas filtered by the departments column
 *
 * @method     array findById(int $id) Return ChildCarriersdeliveryAreas objects filtered by the id column
 * @method     array findByName(string $name) Return ChildCarriersdeliveryAreas objects filtered by the name column
 * @method     array findByCarrierId(int $carrier_id) Return ChildCarriersdeliveryAreas objects filtered by the carrier_id column
 * @method     array findByDepartments(array $departments) Return ChildCarriersdeliveryAreas objects filtered by the departments column
 *
 */
abstract class CarriersdeliveryAreasQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CarriersDelivery\Model\Base\CarriersdeliveryAreasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CarriersDelivery\\Model\\CarriersdeliveryAreas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCarriersdeliveryAreasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCarriersdeliveryAreasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CarriersDelivery\Model\CarriersdeliveryAreasQuery) {
            return $criteria;
        }
        $query = new \CarriersDelivery\Model\CarriersdeliveryAreasQuery();
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
     * @return ChildCarriersdeliveryAreas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarriersdeliveryAreasTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CarriersdeliveryAreasTableMap::DATABASE_NAME);
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
     * @return   ChildCarriersdeliveryAreas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, NAME, CARRIER_ID, DEPARTMENTS FROM carriersdelivery_areas WHERE ID = :p0';
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
            $obj = new ChildCarriersdeliveryAreas();
            $obj->hydrate($row);
            CarriersdeliveryAreasTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCarriersdeliveryAreas|array|mixed the result, formatted by the current formatter
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
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryAreasTableMap::NAME, $name, $comparison);
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
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByCarrierId($carrierId = null, $comparison = null)
    {
        if (is_array($carrierId)) {
            $useMinMax = false;
            if (isset($carrierId['min'])) {
                $this->addUsingAlias(CarriersdeliveryAreasTableMap::CARRIER_ID, $carrierId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($carrierId['max'])) {
                $this->addUsingAlias(CarriersdeliveryAreasTableMap::CARRIER_ID, $carrierId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryAreasTableMap::CARRIER_ID, $carrierId, $comparison);
    }

    /**
     * Filter the query on the departments column
     *
     * @param     array $departments The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByDepartments($departments = null, $comparison = null)
    {
        $key = $this->getAliasedColName(CarriersdeliveryAreasTableMap::DEPARTMENTS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($departments as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($departments as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($departments as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(CarriersdeliveryAreasTableMap::DEPARTMENTS, $departments, $comparison);
    }

    /**
     * Filter the query on the departments column
     * @param     mixed $departments The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByDepartment($departments = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($departments)) {
                $departments = '%| ' . $departments . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $departments = '%| ' . $departments . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(CarriersdeliveryAreasTableMap::DEPARTMENTS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $departments, $comparison);
            } else {
                $this->addAnd($key, $departments, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(CarriersdeliveryAreasTableMap::DEPARTMENTS, $departments, $comparison);
    }

    /**
     * Filter the query by a related \CarriersDelivery\Model\CarriersdeliveryCarrier object
     *
     * @param \CarriersDelivery\Model\CarriersdeliveryCarrier|ObjectCollection $carriersdeliveryCarrier The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByCarriersdeliveryCarrier($carriersdeliveryCarrier, $comparison = null)
    {
        if ($carriersdeliveryCarrier instanceof \CarriersDelivery\Model\CarriersdeliveryCarrier) {
            return $this
                ->addUsingAlias(CarriersdeliveryAreasTableMap::CARRIER_ID, $carriersdeliveryCarrier->getId(), $comparison);
        } elseif ($carriersdeliveryCarrier instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CarriersdeliveryAreasTableMap::CARRIER_ID, $carriersdeliveryCarrier->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
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
     * Filter the query by a related \CarriersDelivery\Model\CarriersdeliveryAreascosts object
     *
     * @param \CarriersDelivery\Model\CarriersdeliveryAreascosts|ObjectCollection $carriersdeliveryAreascosts  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByCarriersdeliveryAreascosts($carriersdeliveryAreascosts, $comparison = null)
    {
        if ($carriersdeliveryAreascosts instanceof \CarriersDelivery\Model\CarriersdeliveryAreascosts) {
            return $this
                ->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $carriersdeliveryAreascosts->getCarrierareaId(), $comparison);
        } elseif ($carriersdeliveryAreascosts instanceof ObjectCollection) {
            return $this
                ->useCarriersdeliveryAreascostsQuery()
                ->filterByPrimaryKeys($carriersdeliveryAreascosts->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCarriersdeliveryAreascosts() only accepts arguments of type \CarriersDelivery\Model\CarriersdeliveryAreascosts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CarriersdeliveryAreascosts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function joinCarriersdeliveryAreascosts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CarriersdeliveryAreascosts');

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
            $this->addJoinObject($join, 'CarriersdeliveryAreascosts');
        }

        return $this;
    }

    /**
     * Use the CarriersdeliveryAreascosts relation CarriersdeliveryAreascosts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarriersDelivery\Model\CarriersdeliveryAreascostsQuery A secondary query class using the current class as primary query
     */
    public function useCarriersdeliveryAreascostsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCarriersdeliveryAreascosts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CarriersdeliveryAreascosts', '\CarriersDelivery\Model\CarriersdeliveryAreascostsQuery');
    }

    /**
     * Filter the query by a related \CarriersDelivery\Model\CarriersdeliveryAreascostskg object
     *
     * @param \CarriersDelivery\Model\CarriersdeliveryAreascostskg|ObjectCollection $carriersdeliveryAreascostskg  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function filterByCarriersdeliveryAreascostskg($carriersdeliveryAreascostskg, $comparison = null)
    {
        if ($carriersdeliveryAreascostskg instanceof \CarriersDelivery\Model\CarriersdeliveryAreascostskg) {
            return $this
                ->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $carriersdeliveryAreascostskg->getCarrierareaId(), $comparison);
        } elseif ($carriersdeliveryAreascostskg instanceof ObjectCollection) {
            return $this
                ->useCarriersdeliveryAreascostskgQuery()
                ->filterByPrimaryKeys($carriersdeliveryAreascostskg->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCarriersdeliveryAreascostskg() only accepts arguments of type \CarriersDelivery\Model\CarriersdeliveryAreascostskg or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CarriersdeliveryAreascostskg relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function joinCarriersdeliveryAreascostskg($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CarriersdeliveryAreascostskg');

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
            $this->addJoinObject($join, 'CarriersdeliveryAreascostskg');
        }

        return $this;
    }

    /**
     * Use the CarriersdeliveryAreascostskg relation CarriersdeliveryAreascostskg object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarriersDelivery\Model\CarriersdeliveryAreascostskgQuery A secondary query class using the current class as primary query
     */
    public function useCarriersdeliveryAreascostskgQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCarriersdeliveryAreascostskg($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CarriersdeliveryAreascostskg', '\CarriersDelivery\Model\CarriersdeliveryAreascostskgQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCarriersdeliveryAreas $carriersdeliveryAreas Object to remove from the list of results
     *
     * @return ChildCarriersdeliveryAreasQuery The current query, for fluid interface
     */
    public function prune($carriersdeliveryAreas = null)
    {
        if ($carriersdeliveryAreas) {
            $this->addUsingAlias(CarriersdeliveryAreasTableMap::ID, $carriersdeliveryAreas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the carriersdelivery_areas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryAreasTableMap::DATABASE_NAME);
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
            CarriersdeliveryAreasTableMap::clearInstancePool();
            CarriersdeliveryAreasTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCarriersdeliveryAreas or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCarriersdeliveryAreas object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryAreasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CarriersdeliveryAreasTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        CarriersdeliveryAreasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CarriersdeliveryAreasTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // CarriersdeliveryAreasQuery
