<?php

namespace EasyBib\OAuth2\Client\ClientCredentialsGrant\HttpBasic;

use EasyBib\OAuth2\Client\ArrayValidator;
use EasyBib\OAuth2\Client\InvalidClientConfigException;

class ClientConfig
{
    /**
     * @var array
     */
    private $params;

    /**
     * @var array
     */
    private static $requiredParams = [
        'client_id',
        'client_password',
    ];

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        self::validate($params);
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @throws \EasyBib\OAuth2\Client\InvalidClientConfigException
     */
    private static function validate(array $params)
    {
        $validator = new ArrayValidator(self::$requiredParams, self::$requiredParams);

        if (!$validator->validate($params)) {
            throw new InvalidClientConfigException();
        }
    }
}
