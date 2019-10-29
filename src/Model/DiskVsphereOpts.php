<?php

namespace Rancher\Model;

use \ArrayAccess;

class DiskVsphereOpts implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    protected static $typeMap = [
        'scsicontrollertype' => 'string',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'scsicontrollertype' => 'setScsicontrollertype',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'scsicontrollertype' => 'getScsicontrollertype',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['scsicontrollertype'] = isset($data['scsicontrollertype']) ? $data['scsicontrollertype'] : null;
    }

    /**
     * Gets scsicontrollertype
     * @return string
     */
    public function getScsicontrollertype()
    {
        return $this->container['scsicontrollertype'];
    }

    /**
     * Sets scsicontrollertype
     * @param string $scsicontrollertype
     * @return $this
     */
    public function setScsicontrollertype($scsicontrollertype)
    {
        $this->container['scsicontrollertype'] = $scsicontrollertype;

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

