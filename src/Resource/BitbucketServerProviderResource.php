<?php

/**
 * BitbucketServerProviderResource
 *
 * @category Class
 * @package  Rancher
 * @author   Gerb Sterrenburg @ Bumbal
 * @link     https://github.com/freightlive/rancher-php-client
 */

namespace Rancher\Resource;

use Rancher\RancherClient;
use Rancher\RancherException;
use Rancher\RancherCollection;

class BitbucketServerProviderResource
{
    /**
     * @var RancherClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $path = '/v3/project/';

    /**
     * @var string
     */
    protected $resourceName = 'bitbucketServerProvider/';

    /**
     * @var string
     */
    protected $resourcePluralName = 'bitbucketServerProviders/';

    /**
     * @var string
     */
    protected $ownerId;

    /**
     * __construct
     *
     * @param RancherClient $client
     * @param string $ownerId
     *
     * @return void
     */
    public function __construct($client, $ownerId = null)
    {
        $this->client = $client;
        $this->ownerId = $ownerId;
    }

    /**
     * constructPath
     *
     * @param boolean $plural
     *
     * @return string
     */
    private function constructPath($plural = false)
    {
        $constructedPath = $this->path;

        if(!empty($this->ownerId))
        {
            $constructedPath .= $this->ownerId . '/';
        }

        if($plural)
        {
            $constructedPath .= $this->resourcePluralName . '/';
        }
        else
        {
            $constructedPath .= $this->resourceName . '/';
        }

        return $constructedPath;
    }

    /**
     * getAll
     *
     * @param \Rancher\AbstractFilter $filter
     * @param string $sortOrder
     * @param int $limit
     * @param string $marker
     *
     * @throws RancherException
     * @return \Rancher\RancherCollection
     */
    public function collection($filter = null, $sortOrder = 'asc', $limit = 1000, $marker = "")
    {
        if(!in_array($sortOrder, ['asc', 'desc']))
        {
            throw new RancherException('sortDirection can only be asc or desc');
        }

        $collection = new RancherCollection();

        if($filter == null)
        {
            $filterArray = [];
        }
        else
        {
            $filterArray = $filter->toArray();
        }

        $queryString = http_build_query([
            'order' => $sortOrder,
            'limit' => $limit,
            'marker' => $marker,
        ]);

        $response = $this->client->request('POST', $this->constructPath(true) . '?'.$queryString, $filterArray);

        $collection->filters = $response->filters;
        $collection->pagination = $response->pagination;
        $collection->sort = $response->sort;

        foreach($response->data as $element)
        {
            $object = $this->client->getSerializer()->deserialize($element, '\Rancher\Model\\'.ucfirst($response->resourceType).'Model');
            array_push($collection->data, $object);
        }

        return $collection;
    }

    /**
     * get
     *
     * @param string $id
     *
     * @throws RancherException
     * @return \Rancher\Model\BitbucketServerProviderModel
     */
    public function get($id)
    {
        $response = $this->client->request('GET', $this->constructPath() . $id, []);

        return $this->client->getSerializer()->deserialize($response, '\Rancher\Model\BitbucketServerProviderModel');
    }


    /**
     * login
     *
     * @param string $id
     * @param \Rancher\Model\AuthUserInputModel $input
     *
     * @throws RancherException
     * @return \Rancher\Model\SourceCodeCredentialModel
     */
    public function login($id, $input)
    {
        $postData = json_encode(\Rancher\ObjectSerializer::sanitizeForSerialization($input));

        $response = $this->client->request('POST', $this->constructPath() . $id . '?action=login', $postData);

        return $this->client->getSerializer()->deserialize($response, '\Rancher\Model\SourceCodeCredentialModel');
    }

    /**
     * requestLogin
     *
     * @param string $id
     *
     * @throws RancherException
     * @return \Rancher\Model\BitbucketServerRequestLoginOutputModel
     */
    public function requestLogin($id)
    {
        $response = $this->client->request('POST', $this->constructPath() . $id . '?action=requestLogin', []);

        return $this->client->getSerializer()->deserialize($response, '\Rancher\Model\BitbucketServerRequestLoginOutputModel');
    }
}
