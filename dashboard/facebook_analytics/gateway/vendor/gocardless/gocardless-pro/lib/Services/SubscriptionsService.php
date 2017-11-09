<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 * https://github.com/gocardless/crank
 */

namespace GoCardlessPro\Services;

use \GoCardlessPro\Core\Paginator;
use \GoCardlessPro\Core\Util;
use \GoCardlessPro\Core\ListResponse;
use \GoCardlessPro\Resources\Subscription;
use \GoCardlessPro\Core\Exception\InvalidStateException;


/**
 * Service that provides access to the Subscription
 * endpoints of the API
 */
class SubscriptionsService extends BaseService
{

    protected $envelope_key   = 'subscriptions';
    protected $resource_class = '\GoCardlessPro\Resources\Subscription';


    /**
    * Create a subscription
    *
    * Example URL: /subscriptions
    *
    * @param  string[mixed] $params An associative array for any params
    * @return Subscription
    **/
    public function create($params = array())
    {
        $path = "/subscriptions";
        if(isset($params['params'])) { 
            $params['body'] = json_encode(array($this->envelope_key => (object)$params['params']));
        
            unset($params['params']);
        }

        
        try {
            $response = $this->api_client->post($path, $params);
        } catch(InvalidStateException $e) {
            if ($e->isIdempotentCreationConflict()) {
                return $this->get($e->getConflictingResourceId());
            }

            throw $e;
        }
        

        return $this->getResourceForResponse($response);
    }

    /**
    * List subscriptions
    *
    * Example URL: /subscriptions
    *
    * @param  string[mixed] $params An associative array for any params
    * @return ListResponse
    **/
    protected function _doList($params = array())
    {
        $path = "/subscriptions";
        if(isset($params['params'])) { $params['query'] = $params['params'];
            unset($params['params']);
        }

        
        $response = $this->api_client->get($path, $params);
        

        return $this->getResourceForResponse($response);
    }

    /**
    * Get a single subscription
    *
    * Example URL: /subscriptions/:identity
    *
    * @param  string        $identity Unique identifier, beginning with "SB".
    * @param  string[mixed] $params   An associative array for any params
    * @return Subscription
    **/
    public function get($identity, $params = array())
    {
        $path = Util::subUrl(
            '/subscriptions/:identity',
            array(
                
                'identity' => $identity
            )
        );
        if(isset($params['params'])) { $params['query'] = $params['params'];
            unset($params['params']);
        }

        
        $response = $this->api_client->get($path, $params);
        

        return $this->getResourceForResponse($response);
    }

    /**
    * Update a subscription
    *
    * Example URL: /subscriptions/:identity
    *
    * @param  string        $identity Unique identifier, beginning with "SB".
    * @param  string[mixed] $params   An associative array for any params
    * @return Subscription
    **/
    public function update($identity, $params = array())
    {
        $path = Util::subUrl(
            '/subscriptions/:identity',
            array(
                
                'identity' => $identity
            )
        );
        if(isset($params['params'])) { 
            $params['body'] = json_encode(array($this->envelope_key => (object)$params['params']));
        
            unset($params['params']);
        }

        
        $response = $this->api_client->put($path, $params);
        

        return $this->getResourceForResponse($response);
    }

    /**
    * Cancel a subscription
    *
    * Example URL: /subscriptions/:identity/actions/cancel
    *
    * @param  string        $identity Unique identifier, beginning with "SB".
    * @param  string[mixed] $params   An associative array for any params
    * @return Subscription
    **/
    public function cancel($identity, $params = array())
    {
        $path = Util::subUrl(
            '/subscriptions/:identity/actions/cancel',
            array(
                
                'identity' => $identity
            )
        );
        if(isset($params['params'])) { 
            $params['body'] = json_encode(array("data" => (object)$params['params']));
        
            unset($params['params']);
        }

        
        try {
            $response = $this->api_client->post($path, $params);
        } catch(InvalidStateException $e) {
            if ($e->isIdempotentCreationConflict()) {
                return $this->get($e->getConflictingResourceId());
            }

            throw $e;
        }
        

        return $this->getResourceForResponse($response);
    }

    /**
    * List subscriptions
    *
    * Example URL: /subscriptions
    *
    * @param  string[mixed] $params
    * @return Paginator
    **/
    public function all($params = array())
    {
        return new Paginator($this, $params);
    }

}
