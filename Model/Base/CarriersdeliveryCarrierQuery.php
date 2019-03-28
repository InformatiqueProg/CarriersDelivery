<?php

namespace CarriersDelivery\Model\Base;

use \Exception;
use \PDO;
use CarriersDelivery\Model\CarriersdeliveryCarrier as ChildCarriersdeliveryCarrier;
use CarriersDelivery\Model\CarriersdeliveryCarrierQuery as ChildCarriersdeliveryCarrierQuery;
use CarriersDelivery\Model\Map\CarriersdeliveryCarrierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\Country;

/**
 * Base class that represents a query for the 'carriersdelivery_carrier' table.
 *
 *
 *
 * @method     ChildCarriersdeliveryCarrierQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCarriersdeliveryCarrierQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCarriersdeliveryCarrierQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 * @method     ChildCarriersdeliveryCarrierQuery orderByDieselTaxPercent($order = Criteria::ASC) Order by the diesel_tax_percent column
 * @method     ChildCarriersdeliveryCarrierQuery orderByFeesCost($order = Criteria::ASC) Order by the fees_cost column
 * @method     ChildCarriersdeliveryCarrierQuery orderByUnitPerKg($order = Criteria::ASC) Order by the unit_per_kg column
 *
 * @method     ChildCarriersdeliveryCarrierQuery groupById() Group by the id column
 * @method     ChildCarriersdeliveryCarrierQuery groupByName() Group by the name column
 * @method     ChildCarriersdeliveryCarrierQuery groupByCountryId() Group by the country_id column
 * @method     ChildCarriersdeliveryCarrierQuery groupByDieselTaxPercent() Group by the diesel_tax_percent column
 * @method     ChildCarriersdeliveryCarrierQuery groupByFeesCost() Group by the fees_cost column
 * @method     ChildCarriersdeliveryCarrierQuery groupByUnitPerKg() Group by the unit_per_kg column
 *
 * @method     ChildCarriersdeliveryCarrierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCarriersdeliveryCarrierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCarriersdeliveryCarrierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCarriersdeliveryCarrierQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method     ChildCarriersdeliveryCarrierQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method     ChildCarriersdeliveryCarrierQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method     ChildCarriersdeliveryCarrierQuery leftJoinCarriersdeliveryAreas($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarriersdeliveryAreas relation
 * @method     ChildCarriersdeliveryCarrierQuery rightJoinCarriersdeliveryAreas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarriersdeliveryAreas relation
 * @method     ChildCarriersdeliveryCarrierQuery innerJoinCarriersdeliveryAreas($relationAlias = null) Adds a INNER JOIN clause to the query using the CarriersdeliveryAreas relation
 *
 * @method     ChildCarriersdeliveryCarrierQuery leftJoinCarriersdeliveryProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the CarriersdeliveryProduct relation
 * @method     ChildCarriersdeliveryCarrierQuery rightJoinCarriersdeliveryProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CarriersdeliveryProduct relation
 * @method     ChildCarriersdeliveryCarrierQuery innerJoinCarriersdeliveryProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the CarriersdeliveryProduct relation
 *
 * @method     ChildCarriersdeliveryCarrier findOne(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryCarrier matching the query
 * @method     ChildCarriersdeliveryCarrier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCarriersdeliveryCarrier matching the query, or a new ChildCarriersdeliveryCarrier object populated from the query conditions when no match is found
 *
 * @method     ChildCarriersdeliveryCarrier findOneById(int $id) Return the first ChildCarriersdeliveryCarrier filtered by the id column
 * @method     ChildCarriersdeliveryCarrier findOneByName(string $name) Return the first ChildCarriersdeliveryCarrier filtered by the name column
 * @method     ChildCarriersdeliveryCarrier findOneByCountryId(int $country_id) Return the first ChildCarriersdeliveryCarrier filtered by the country_id column
 * @method     ChildCarriersdeliveryCarrier findOneByDieselTaxPercent(string $diesel_tax_percent) Return the first ChildCarriersdeliveryCarrier filtered by the diesel_tax_percent column
 * @method     ChildCarriersdeliveryCarrier findOneByFeesCost(string $fees_cost) Return the first ChildCarriersdeliveryCarrier filtered by the fees_cost column
 * @method     ChildCarriersdeliveryCarrier findOneByUnitPerKg(int $unit_per_kg) Return the first ChildCarriersdeliveryCarrier filtered by the unit_per_kg column
 *
 * @method     array findById(int $id) Return ChildCarriersdeliveryCarrier objects filtered by the id column
 * @method     array findByName(string $name) Return ChildCarriersdeliveryCarrier objects filtered by the name column
 * @method     array findByCountryId(int $country_id) Return ChildCarriersdeliveryCarrier objects filtered by the country_id column
 * @method     array findByDieselTaxPercent(string $diesel_tax_percent) Return ChildCarriersdeliveryCarrier objects filtered by the diesel_tax_percent column
 * @method     array findByFeesCost(string $fees_cost) Return ChildCarriersdeliveryCarrier objects filtered by the fees_cost column
 * @method     array findByUnitPerKg(int $unit_per_kg) Return ChildCarriersdeliveryCarrier objects filtered by the unit_per_kg column
 *
 */
abstract class CarriersdeliveryCarrierQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CarriersDelivery\Model\Base\CarriersdeliveryCarrierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CarriersDelivery\\Model\\CarriersdeliveryCarrier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCarriersdeliveryCarrierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCarriersdeliveryCarrierQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CarriersDelivery\Model\CarriersdeliveryCarrierQuery) {
            return $criteria;
        }
        $query = new \CarriersDelivery\Model\CarriersdeliveryCarrierQuery();
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
     * @return ChildCarriersdeliveryCarrier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CarriersdeliveryCarrierTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CarriersdeliveryCarrierTableMap::DATABASE_NAME);
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
     * @return   ChildCarriersdeliveryCarrier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, NAME, COUNTRY_ID, DIESEL_TAX_PERCENT, FEES_COST, UNIT_PER_KG FROM carriersdelivery_carrier WHERE ID = :p0';
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
            $obj = new ChildCarriersdeliveryCarrier();
            $obj->hydrate($row);
            CarriersdeliveryCarrierTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCarriersdeliveryCarrier|array|mixed the result, formatted by the current formatter
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
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $id, $comparison);
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
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryId(1234); // WHERE country_id = 1234
     * $query->filterByCountryId(array(12, 34)); // WHERE country_id IN (12, 34)
     * $query->filterByCountryId(array('min' => 12)); // WHERE country_id > 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $countryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::COUNTRY_ID, $countryId, $comparison);
    }

    /**
     * Filter the query on the diesel_tax_percent column
     *
     * Example usage:
     * <code>
     * $query->filterByDieselTaxPercent(1234); // WHERE diesel_tax_percent = 1234
     * $query->filterByDieselTaxPercent(array(12, 34)); // WHERE diesel_tax_percent IN (12, 34)
     * $query->filterByDieselTaxPercent(array('min' => 12)); // WHERE diesel_tax_percent > 12
     * </code>
     *
     * @param     mixed $dieselTaxPercent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByDieselTaxPercent($dieselTaxPercent = null, $comparison = null)
    {
        if (is_array($dieselTaxPercent)) {
            $useMinMax = false;
            if (isset($dieselTaxPercent['min'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::DIESEL_TAX_PERCENT, $dieselTaxPercent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dieselTaxPercent['max'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::DIESEL_TAX_PERCENT, $dieselTaxPercent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::DIESEL_TAX_PERCENT, $dieselTaxPercent, $comparison);
    }

    /**
     * Filter the query on the fees_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByFeesCost(1234); // WHERE fees_cost = 1234
     * $query->filterByFeesCost(array(12, 34)); // WHERE fees_cost IN (12, 34)
     * $query->filterByFeesCost(array('min' => 12)); // WHERE fees_cost > 12
     * </code>
     *
     * @param     mixed $feesCost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByFeesCost($feesCost = null, $comparison = null)
    {
        if (is_array($feesCost)) {
            $useMinMax = false;
            if (isset($feesCost['min'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::FEES_COST, $feesCost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($feesCost['max'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::FEES_COST, $feesCost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::FEES_COST, $feesCost, $comparison);
    }

    /**
     * Filter the query on the unit_per_kg column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitPerKg(1234); // WHERE unit_per_kg = 1234
     * $query->filterByUnitPerKg(array(12, 34)); // WHERE unit_per_kg IN (12, 34)
     * $query->filterByUnitPerKg(array('min' => 12)); // WHERE unit_per_kg > 12
     * </code>
     *
     * @param     mixed $unitPerKg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByUnitPerKg($unitPerKg = null, $comparison = null)
    {
        if (is_array($unitPerKg)) {
            $useMinMax = false;
            if (isset($unitPerKg['min'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::UNIT_PER_KG, $unitPerKg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitPerKg['max'])) {
                $this->addUsingAlias(CarriersdeliveryCarrierTableMap::UNIT_PER_KG, $unitPerKg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarriersdeliveryCarrierTableMap::UNIT_PER_KG, $unitPerKg, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\Country object
     *
     * @param \Thelia\Model\Country|ObjectCollection $country The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByCountry($country, $comparison = null)
    {
        if ($country instanceof \Thelia\Model\Country) {
            return $this
                ->addUsingAlias(CarriersdeliveryCarrierTableMap::COUNTRY_ID, $country->getId(), $comparison);
        } elseif ($country instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CarriersdeliveryCarrierTableMap::COUNTRY_ID, $country->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type \Thelia\Model\Country or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

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
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation Country object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\CountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', '\Thelia\Model\CountryQuery');
    }

    /**
     * Filter the query by a related \CarriersDelivery\Model\CarriersdeliveryAreas object
     *
     * @param \CarriersDelivery\Model\CarriersdeliveryAreas|ObjectCollection $carriersdeliveryAreas  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByCarriersdeliveryAreas($carriersdeliveryAreas, $comparison = null)
    {
        if ($carriersdeliveryAreas instanceof \CarriersDelivery\Model\CarriersdeliveryAreas) {
            return $this
                ->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $carriersdeliveryAreas->getCarrierId(), $comparison);
        } elseif ($carriersdeliveryAreas instanceof ObjectCollection) {
            return $this
                ->useCarriersdeliveryAreasQuery()
                ->filterByPrimaryKeys($carriersdeliveryAreas->getPrimaryKeys())
                ->endUse();
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
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
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
     * Filter the query by a related \CarriersDelivery\Model\CarriersdeliveryProduct object
     *
     * @param \CarriersDelivery\Model\CarriersdeliveryProduct|ObjectCollection $carriersdeliveryProduct  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function filterByCarriersdeliveryProduct($carriersdeliveryProduct, $comparison = null)
    {
        if ($carriersdeliveryProduct instanceof \CarriersDelivery\Model\CarriersdeliveryProduct) {
            return $this
                ->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $carriersdeliveryProduct->getCarrierId(), $comparison);
        } elseif ($carriersdeliveryProduct instanceof ObjectCollection) {
            return $this
                ->useCarriersdeliveryProductQuery()
                ->filterByPrimaryKeys($carriersdeliveryProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCarriersdeliveryProduct() only accepts arguments of type \CarriersDelivery\Model\CarriersdeliveryProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CarriersdeliveryProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function joinCarriersdeliveryProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CarriersdeliveryProduct');

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
            $this->addJoinObject($join, 'CarriersdeliveryProduct');
        }

        return $this;
    }

    /**
     * Use the CarriersdeliveryProduct relation CarriersdeliveryProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CarriersDelivery\Model\CarriersdeliveryProductQuery A secondary query class using the current class as primary query
     */
    public function useCarriersdeliveryProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCarriersdeliveryProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CarriersdeliveryProduct', '\CarriersDelivery\Model\CarriersdeliveryProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCarriersdeliveryCarrier $carriersdeliveryCarrier Object to remove from the list of results
     *
     * @return ChildCarriersdeliveryCarrierQuery The current query, for fluid interface
     */
    public function prune($carriersdeliveryCarrier = null)
    {
        if ($carriersdeliveryCarrier) {
            $this->addUsingAlias(CarriersdeliveryCarrierTableMap::ID, $carriersdeliveryCarrier->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the carriersdelivery_carrier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryCarrierTableMap::DATABASE_NAME);
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
            CarriersdeliveryCarrierTableMap::clearInstancePool();
            CarriersdeliveryCarrierTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCarriersdeliveryCarrier or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCarriersdeliveryCarrier object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryCarrierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CarriersdeliveryCarrierTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        CarriersdeliveryCarrierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CarriersdeliveryCarrierTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // CarriersdeliveryCarrierQuery
