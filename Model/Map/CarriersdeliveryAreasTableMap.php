<?php

namespace CarriersDelivery\Model\Map;

use CarriersDelivery\Model\CarriersdeliveryAreas;
use CarriersDelivery\Model\CarriersdeliveryAreasQuery;
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
 * This class defines the structure of the 'carriersdelivery_areas' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CarriersdeliveryAreasTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CarriersDelivery.Model.Map.CarriersdeliveryAreasTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'carriersdelivery_areas';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CarriersDelivery\\Model\\CarriersdeliveryAreas';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CarriersDelivery.Model.CarriersdeliveryAreas';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the ID field
     */
    const ID = 'carriersdelivery_areas.ID';

    /**
     * the column name for the NAME field
     */
    const NAME = 'carriersdelivery_areas.NAME';

    /**
     * the column name for the CARRIER_ID field
     */
    const CARRIER_ID = 'carriersdelivery_areas.CARRIER_ID';

    /**
     * the column name for the DEPARTMENTS field
     */
    const DEPARTMENTS = 'carriersdelivery_areas.DEPARTMENTS';

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
        self::TYPE_PHPNAME       => array('Id', 'Name', 'CarrierId', 'Departments', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'name', 'carrierId', 'departments', ),
        self::TYPE_COLNAME       => array(CarriersdeliveryAreasTableMap::ID, CarriersdeliveryAreasTableMap::NAME, CarriersdeliveryAreasTableMap::CARRIER_ID, CarriersdeliveryAreasTableMap::DEPARTMENTS, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'NAME', 'CARRIER_ID', 'DEPARTMENTS', ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'carrier_id', 'departments', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'CarrierId' => 2, 'Departments' => 3, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'name' => 1, 'carrierId' => 2, 'departments' => 3, ),
        self::TYPE_COLNAME       => array(CarriersdeliveryAreasTableMap::ID => 0, CarriersdeliveryAreasTableMap::NAME => 1, CarriersdeliveryAreasTableMap::CARRIER_ID => 2, CarriersdeliveryAreasTableMap::DEPARTMENTS => 3, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'NAME' => 1, 'CARRIER_ID' => 2, 'DEPARTMENTS' => 3, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'carrier_id' => 2, 'departments' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
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
        $this->setName('carriersdelivery_areas');
        $this->setPhpName('CarriersdeliveryAreas');
        $this->setClassName('\\CarriersDelivery\\Model\\CarriersdeliveryAreas');
        $this->setPackage('CarriersDelivery.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', true, 90, null);
        $this->addForeignKey('CARRIER_ID', 'CarrierId', 'INTEGER', 'carriersdelivery_carrier', 'ID', true, null, null);
        $this->addColumn('DEPARTMENTS', 'Departments', 'ARRAY', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CarriersdeliveryCarrier', '\\CarriersDelivery\\Model\\CarriersdeliveryCarrier', RelationMap::MANY_TO_ONE, array('carrier_id' => 'id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('CarriersdeliveryAreascosts', '\\CarriersDelivery\\Model\\CarriersdeliveryAreascosts', RelationMap::ONE_TO_MANY, array('id' => 'carrierarea_id', ), 'CASCADE', 'RESTRICT', 'CarriersdeliveryAreascostss');
        $this->addRelation('CarriersdeliveryAreascostskg', '\\CarriersDelivery\\Model\\CarriersdeliveryAreascostskg', RelationMap::ONE_TO_MANY, array('id' => 'carrierarea_id', ), 'CASCADE', 'RESTRICT', 'CarriersdeliveryAreascostskgs');
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to carriersdelivery_areas     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in ".$this->getClassNameFromBuilder($joinedTableTableMapBuilder)." instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
                CarriersdeliveryAreascostsTableMap::clearInstancePool();
                CarriersdeliveryAreascostskgTableMap::clearInstancePool();
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
        return $withPrefix ? CarriersdeliveryAreasTableMap::CLASS_DEFAULT : CarriersdeliveryAreasTableMap::OM_CLASS;
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
     * @return array (CarriersdeliveryAreas object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CarriersdeliveryAreasTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CarriersdeliveryAreasTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CarriersdeliveryAreasTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CarriersdeliveryAreasTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CarriersdeliveryAreasTableMap::addInstanceToPool($obj, $key);
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
            $key = CarriersdeliveryAreasTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CarriersdeliveryAreasTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CarriersdeliveryAreasTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CarriersdeliveryAreasTableMap::ID);
            $criteria->addSelectColumn(CarriersdeliveryAreasTableMap::NAME);
            $criteria->addSelectColumn(CarriersdeliveryAreasTableMap::CARRIER_ID);
            $criteria->addSelectColumn(CarriersdeliveryAreasTableMap::DEPARTMENTS);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.NAME');
            $criteria->addSelectColumn($alias . '.CARRIER_ID');
            $criteria->addSelectColumn($alias . '.DEPARTMENTS');
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
        return Propel::getServiceContainer()->getDatabaseMap(CarriersdeliveryAreasTableMap::DATABASE_NAME)->getTable(CarriersdeliveryAreasTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(CarriersdeliveryAreasTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(CarriersdeliveryAreasTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new CarriersdeliveryAreasTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a CarriersdeliveryAreas or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CarriersdeliveryAreas object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryAreasTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CarriersDelivery\Model\CarriersdeliveryAreas) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CarriersdeliveryAreasTableMap::DATABASE_NAME);
            $criteria->add(CarriersdeliveryAreasTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = CarriersdeliveryAreasQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { CarriersdeliveryAreasTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { CarriersdeliveryAreasTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the carriersdelivery_areas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CarriersdeliveryAreasQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CarriersdeliveryAreas or Criteria object.
     *
     * @param mixed               $criteria Criteria or CarriersdeliveryAreas object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarriersdeliveryAreasTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CarriersdeliveryAreas object
        }

        if ($criteria->containsKey(CarriersdeliveryAreasTableMap::ID) && $criteria->keyContainsValue(CarriersdeliveryAreasTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CarriersdeliveryAreasTableMap::ID.')');
        }


        // Set the correct dbName
        $query = CarriersdeliveryAreasQuery::create()->mergeWith($criteria);

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

} // CarriersdeliveryAreasTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CarriersdeliveryAreasTableMap::buildTableMap();
