<?php

namespace Rancher\Model;

use \ArrayAccess;

class ProjectResourceQuota implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    protected static $typeMap = [
        'limit' => '\Rancher\Model\ResourceQuotaLimit',
        'usedLimit' => '\Rancher\Model\ResourceQuotaLimit',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'limit' => 'setLimit',
        'usedLimit' => 'setUsedLimit',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'limit' => 'getLimit',
        'usedLimit' => 'getUsedLimit',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['limit'] = isset($data['limit']) ? $data['limit'] : null;
        $this->container['usedLimit'] = isset($data['usedLimit']) ? $data['usedLimit'] : null;
    }

    /**
     * Gets limit
     * @return \Rancher\Model\ResourceQuotaLimit
     */
    public function getLimit()
    {
        return $this->container['limit'];
    }

    /**
     * Sets limit
     * @param \Rancher\Model\ResourceQuotaLimit $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->container['limit'] = $limit;

        return $this;
    }


    /**
     * Gets usedLimit
     * @return \Rancher\Model\ResourceQuotaLimit
     */
    public function getUsedLimit()
    {
        return $this->container['usedLimit'];
    }

    /**
     * Sets usedLimit
     * @param \Rancher\Model\ResourceQuotaLimit $usedLimit
     * @return $this
     */
    public function setUsedLimit($usedLimit)
    {
        $this->container['usedLimit'] = $usedLimit;

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

