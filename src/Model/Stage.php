<?php

namespace Rancher\Model;

use \ArrayAccess;

class Stage implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    protected static $typeMap = [
        'name' => 'string',
        'steps' => '\Rancher\Model\Step[]',
        'when' => '\Rancher\Model\Constraints',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'name' => 'setName',
        'steps' => 'setSteps',
        'when' => 'setWhen',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'name' => 'getName',
        'steps' => 'getSteps',
        'when' => 'getWhen',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['steps'] = isset($data['steps']) ? $data['steps'] : null;
        $this->container['when'] = isset($data['when']) ? $data['when'] : null;
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }


    /**
     * Gets steps
     * @return \Rancher\Model\Step[]
     */
    public function getSteps()
    {
        return $this->container['steps'];
    }

    /**
     * Sets steps
     * @param \Rancher\Model\Step[] $steps
     * @return $this
     */
    public function setSteps($steps)
    {
        $this->container['steps'] = $steps;

        return $this;
    }


    /**
     * Gets when
     * @return \Rancher\Model\Constraints
     */
    public function getWhen()
    {
        return $this->container['when'];
    }

    /**
     * Sets when
     * @param \Rancher\Model\Constraints $when
     * @return $this
     */
    public function setWhen($when)
    {
        $this->container['when'] = $when;

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

