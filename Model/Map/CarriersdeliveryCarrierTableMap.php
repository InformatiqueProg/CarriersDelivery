<?php

namespace CarriersDelivery\Model\Map;

use CarriersDelivery\Model\CarriersdeliveryCarrier;
use CarriersDelivery\Model\CarriersdeliveryCarrierQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'carriersdelivery_carrier' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CarriersdeliveryCarrierTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CarriersDelivery.Model.Map.CarriersdeliveryCarrierTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'carriersdelivery_carrier';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CarriersDelivery\\Model\\CarriersdeliveryCarrier';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CarriersDelivery.Model.CarriersdeliveryCarrier';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the ID field
     */
    const ID = 'carriersdelivery_carrier.ID';

    /**
     * the column name for the NAME field
     */
    const NAME = 'carriersdelivery_carrier.NAME';

    /**
     * the column name for the COUNTRY_ID field
     */
    const COUNTRY_ID = 'carriersdelivery_carrier.COUNTRY_ID';

    /**
     * the column name for the DIESEL_TAX_PERCENT field
     */
    const DIESEL_TAX_PERCENT = 'carriersdelivery_carrier.DIESEL_TAX_PERCENT';

    /**
     * the column name for the FEES_COST field
     */
    const FEES_COST = 'carriersdelivery_carrier.FEES_COST';

    /**
     * the column name for the UNIT_PER_KG field
     */
    const UNIT_PER_KG = 'carriersdelivery_carrier.UNIT_PER_KG';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Name', 'CountryId', 'DieselTaxPercent', 'FeesCost', 'UnitPerKg', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'name', 'countryId', 'dieselTaxPercent', 'feesCost', 'unitPerKg', ),
        self::TYPE_COLNAME       => array(CarriersdeliveryCarrierTableMap::ID, CarriersdeliveryCarrierTableMap::NAME, CarriersdeliveryCarrierTableMap::COUNTRY_ID, CarriersdeliveryCarrierTableMap::DIESEL_TAX_PERCENT, CarriersdeliveryCarrierTableMap::FEES_COST, CarriersdeliveryCarrierTableMap::UNIT_PER_KG, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'NAME', 'COUNTRY_ID', 'DIESEL_TAX_PERCENT', 'FEES_COST', 'UNIT_PER_KG', ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'country_id', 'diesel_tax_percent', 'fees_cost', 'unit_per_kg', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'CountryId' => 2, 'DieselTaxPercent' => 3, 'FeesCost' => 4, 'UnitPerKg' => 5, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'name' => 1, 'countryId' => 2, 'dieselTaxPercent' => 3, 'feesCost' => 4, 'unitPerKg' => 5, ),
        self::TYPE_COLNAME       => array(CarriersdeliveryCarrierTableMap::ID => 0, CarriersdeliveryCarrierTableMap::NAME => 1, CarriersdeliveryCarrierTableMap::COUNTRY_ID => 2, CarriersdeliveryCarrierTableMap::DIESEL_TAX_PERCENT => 3, CarriersdeliveryCarrierTableMap::FEES_COST => 4, CarriersdeliveryCarrierTableMap::UNIT_PER_KG => 5, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'NAME' => 1, 'COUNTRY_ID' => 2, 'DIESEL_TAX_PERCENT' => 3, 'FEES_COST' => 4, 'UNIT_PER_KG' => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'country_id' => 2, 'diesel_tax_percent' => 3, 'fees_cost' => 4, 'unit_per_kg' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('carriersdelivery_carrier');
        $this->setPhpName('CarriersdeliveryCarrier');
        $this->setClassName('\\CarriersDelivery\\Model\\CarriersdeliveryCarrier');
        $this->setPackage('CarriersDelivery.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 90, null);
        $this->addForeignKey('COUNTRY_ID', 'CountryId', 'INTEGER', 'country', 'ID', true, null, null);
        $this->addColumn('DIESEL_TAX_PERCENT', 'DieselTaxPercent', 'DECIMAL', false, 16, 0);
        $this->addColumn('FEES_COST', 'FeesCost', 'DECIMAL', false, 16, 0);
        $this->addColumn('UNIT_PER_KG', 'UnitPerKg', 'SMALLINT', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Country', '\\Thelia\\Model\\Country', RelationMap::MANY_TO_ONE, array('country_id' => 'id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('CarriersdeliveryAreas', '\\CarriersDelivery\\Model\\CarriersdeliveryAreas', RelationMap::ONE_TO_MANY, array('id' => 'carrier_id', ), 'RESTRICT', 'RESTRICT', 'CarriersdeliveryAreass');
        $this->addRelation('CarriersdeliveryProduct', '\\CarriersDelivery\\Model\\CarriersdeliveryProduct', RelationMap::ONE_TO_MANY, array('id' => 'carrier_id', ), 'CASCADE', 'RESTRICT', 'CarriersdeliveryProducts');
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to carriersdelivery_carrier     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ".$this->getClassNameFromBuilder($joinedTableTableMapBuilder)." instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
                CarriersdeliveryProductTableMap::clearInstancePool();
            }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CarriersdeliveryCarrierTableMap::CLASS_DEFAULT : CarriersdeliveryCarrierTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (CarriersdeliveryCarrier object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CarriersdeliveryCarrierTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CarriersdeliveryCarrierTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CarriersdeliveryCarrierTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CarriersdeliveryCarrierTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CarriersdeliveryCarrierTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CarriersdeliveryCarrierTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CarriersdeliveryCarrierTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CarriersdeliveryCarrierTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CarriersdeliveryCarrierTableMap::ID);
            $criteria->addSelectColumn(CarriersdeliveryCarrierTableMap::NAME);
            $criteria->addSelectColumn(CarriersdeliveryCarrierTableMap::COUNTRY_ID);
            $criteria->addSelectColumn(CarriersdeliveryCarrierTableMap::DIESEL_TAX_PERCENT);
            $criteria->addSelectColumn(CarriersdeliveryCarrierTableMap::FEES_COST);
            $criteria->addSelectColumn(CarriersdeliveryCarrierTableMap::UNIT_PER_KG);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.NAME');
            $criteria->addSelectColumn($alias . '.COUNTRY_ID');
            $criteria->addSelectColumn($alias . '.DIESEL_TAX_PERCENT');
            $criteria->addSelectColumn($alias . '.FEES_COST');
            $criteria->addSelectColumn($alias . '.UNIT_PER_KG');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CarriersdeliveryCarrierTableMap::DATABASE_NAME)->getTable(CarriersdeliveryCarrierTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(CarriersdeliveryCarrierTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(CarriersdeliveryCarrierTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new CarriersdeliveryCarrierTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a CarriersdeliveryCarrier or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CarriersdeliveryCarrier object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryCarrierTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CarriersDelivery\Model\CarriersdeliveryCarrier) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CarriersdeliveryCarrierTableMap::DATABASE_NAME);
            $criteria->add(CarriersdeliveryCarrierTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = CarriersdeliveryCarrierQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { CarriersdeliveryCarrierTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { CarriersdeliveryCarrierTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the carriersdelivery_carrier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CarriersdeliveryCarrierQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CarriersdeliveryCarrier or Criteria object.
     *
     * @param mixed               $criteria Criteria or CarriersdeliveryCarrier object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryCarrierTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CarriersdeliveryCarrier object
        }

        if ($criteria->containsKey(CarriersdeliveryCarrierTableMap::ID) && $criteria->keyContainsValue(CarriersdeliveryCarrierTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CarriersdeliveryCarrierTableMap::ID.')');
        }


        // Set the correct dbName
        $query = CarriersdeliveryCarrierQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // CarriersdeliveryCarrierTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CarriersdeliveryCarrierTableMap::buildTableMap();
