<?php

namespace Rancher\Model;

use \ArrayAccess;

class Answer implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    protected static $typeMap = [
        'clusterId' => 'string',
        'projectId' => 'string',
        'values' => 'map[string]',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'clusterId' => 'setClusterId',
        'projectId' => 'setProjectId',
        'values' => 'setValues',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'clusterId' => 'getClusterId',
        'projectId' => 'getProjectId',
        'values' => 'getValues',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['clusterId'] = isset($data['clusterId']) ? $data['clusterId'] : null;
        $this->container['projectId'] = isset($data['projectId']) ? $data['projectId'] : null;
        $this->container['values'] = isset($data['values']) ? $data['values'] : null;
    }

    /**
     * Gets clusterId
     * @return string
     */
    public function getClusterId()
    {
        return $this->container['clusterId'];
    }

    /**
     * Sets clusterId
     * @param string $clusterId
     * @return $this
     */
    public function setClusterId($clusterId)
    {
        $this->container['clusterId'] = $clusterId;

        return $this;
    }


    /**
     * Gets projectId
     * @return string
     */
    public function getProjectId()
    {
        return $this->container['projectId'];
    }

    /**
     * Sets projectId
     * @param string $projectId
     * @return $this
     */
    public function setProjectId($projectId)
    {
        $this->container['projectId'] = $projectId;

        return $this;
    }


    /**
     * Gets values
     * @return string[]
     */
    public function getValues()
    {
        return $this->container['values'];
    }

    /**
     * Sets values
     * @param string[] $values
     * @return $this
     */
    public function setValues($values)
    {
        $this->container['values'] = $values;

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

