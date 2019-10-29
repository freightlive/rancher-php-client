<?php

namespace Rancher\Model;

use \ArrayAccess;

class SessionAffinityConfig implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    protected static $typeMap = [
        'clientIP' => '\Rancher\Model\ClientIPConfig',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'clientIP' => 'setClientIP',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'clientIP' => 'getClientIP',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['clientIP'] = isset($data['clientIP']) ? $data['clientIP'] : null;
    }

    /**
     * Gets clientIP
     * @return \Rancher\Model\ClientIPConfig
     */
    public function getClientIP()
    {
        return $this->container['clientIP'];
    }

    /**
     * Sets clientIP
     * @param \Rancher\Model\ClientIPConfig $clientIP
     * @return $this
     */
    public function setClientIP($clientIP)
    {
        $this->container['clientIP'] = $clientIP;

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

