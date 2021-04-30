<?php

/**
 * MultiClusterAppStatusModel
 *
 * @category Class
 * @package  Rancher
 * @author   Gerb Sterrenburg @ Bumbal
 * @link     https://github.com/freightlive/rancher-php-client
 */

namespace Rancher\Model;

use \ArrayAccess;

class MultiClusterAppStatusModel implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    /**
     * Properties that can be created
     *
     * @var array
     */
    protected static $canBeCreated = [
    ];

    public static function canBeCreated()
    {
        return self::$canBeCreated;
    }

    /**
     * Properties that can be updated
     *
     * @var array
     */
    protected static $canBeUpdated = [
    ];

    public static function canBeUpdated()
    {
        return self::$canBeUpdated;
    }

    protected static $typeMap = [
        'conditions' => '\Rancher\Model\AppConditionModel[]',
        'helmVersion' => 'string',
        'revisionId' => 'string',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'conditions' => 'setConditions',
        'helmVersion' => 'setHelmVersion',
        'revisionId' => 'setRevisionId',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'conditions' => 'getConditions',
        'helmVersion' => 'getHelmVersion',
        'revisionId' => 'getRevisionId',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['conditions'] = isset($data['conditions']) ? $data['conditions'] : null;
        $this->container['helmVersion'] = isset($data['helmVersion']) ? $data['helmVersion'] : null;
        $this->container['revisionId'] = isset($data['revisionId']) ? $data['revisionId'] : null;
    }

    /**
     * Gets conditions
     * @return \Rancher\Model\AppConditionModel[]
     */
    public function getConditions()
    {
        return $this->container['conditions'];
    }

    /**
     * Sets conditions
     * @param \Rancher\Model\AppConditionModel[] $conditions
     * @return $this
     */
    public function setConditions($conditions)
    {
        $this->container['conditions'] = $conditions;

        return $this;
    }


    /**
     * Gets helmVersion
     * @return string
     */
    public function getHelmVersion()
    {
        return $this->container['helmVersion'];
    }

    /**
     * Sets helmVersion
     * @param string $helmVersion
     * @return $this
     */
    public function setHelmVersion($helmVersion)
    {
        $this->container['helmVersion'] = $helmVersion;

        return $this;
    }


    /**
     * Gets revisionId
     * @return string
     */
    public function getRevisionId()
    {
        return $this->container['revisionId'];
    }

    /**
     * Sets revisionId
     * @param string $revisionId
     * @return $this
     */
    public function setRevisionId($revisionId)
    {
        $this->container['revisionId'] = $revisionId;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}

