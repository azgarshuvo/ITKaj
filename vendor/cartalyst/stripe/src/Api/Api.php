<?php

/**
 * Part of the Stripe package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Stripe
 * @version    1.0.10
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2016, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Stripe\Api;

use Cartalyst\Stripe\Utility;
use Cartalyst\Stripe\Http\Client;
use Cartalyst\Stripe\ConfigInterface;

abstract class Api implements ApiInterface
{
    /**
     * The Config repository instance.
     *
     * @var \Cartalyst\Stripe\ConfigInterface
     */
    protected $config;

    /**
     * Number of items to return per page.
     *
     * @var null|int
     */
    protected $perPage;

    /**
     * The query aggregator status.
     *
     * @var bool
     */
    protected $queryAggregator = false;

    /**
     * Constructor.
     *
     * @param  \Cartalyst\Stripe\ConfigInterface  $client
     * @return void
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function baseUrl()
    {
        return 'https://api.stripe.com';
    }

    /**
     * {@inheritDoc}
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * {@inheritDoc}
     */
    public function setPerPage($perPage)
    {
        $this->perPage = (int) $perPage;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function _get($url = null, $parameters = [])
    {
        if ($perPage = $this->getPerPage()) {
            $parameters['limit'] = $perPage;
        }

        return $this->execute('get', $url, $parameters)->json();
    }

    /**
     * {@inheritDoc}
     */
    public function _head($url = null, array $parameters = [])
    {
        return $this->execute('head', $url, $parameters);
    }

    /**
     * {@inheritDoc}
     */
    public function _delete($url = null, array $parameters = [])
    {
        return $this->execute('delete', $url, $parameters)->json();
    }

    /**
     * {@inheritDoc}
     */
    public function _put($url = null, array $parameters = [])
    {
        return $this->execute('put', $url, $parameters)->json();
    }

    /**
     * {@inheritDoc}
     */
    public function _patch($url = null, array $parameters = [])
    {
        return $this->execute('patch', $url, $parameters)->json();
    }

    /**
     * {@inheritDoc}
     */
    public function _post($url = null, array $parameters = [])
    {
        return $this->execute('post', $url, $parameters)->json();
    }

    /**
     * {@inheritDoc}
     */
    public function _options($url = null, array $parameters = [])
    {
        return $this->execute('options', $url, $parameters)->json();
    }

    /**
     * {@inheritDoc}
     */
    public function execute($httpMethod, $url, array $parameters = [], array $body = [])
    {
        $parameters = Utility::prepareParameters($parameters);

        return $this->getClient()->{$httpMethod}("v1/{$url}", [ 'query' => $parameters, 'body' => $body ]);
    }

    /**
     * Sets the query aggregator status.
     *
     * @param  bool  $status
     * @return $this
     */
    public function queryAggregator($status = false)
    {
        $this->queryAggregator = $status;

        return $this;
    }

    /**
     * Returns an Http client instance.
     *
     * @return \Cartalyst\Stripe\Http\Client
     */
    protected function getClient()
    {
        $config = $this->config;

        $config->base_url = $this->baseUrl();

        return (new Client($config))
            ->queryAggregator($this->queryAggregator)
        ;
    }
}
