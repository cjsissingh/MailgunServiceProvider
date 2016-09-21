<?php

/**
 * MailgunServiceProvider
 *
 * A Simple wrapper for the mailgun API for the Silex Framework
 *
 * @package     MailgunServiceProvider
 * @author      Achraf Soltani <achraf.soltani@gmail.com>
 * @date        05/19/2015
 * @file        MailgunServiceProvider.php
 */


namespace AchrafSoltani\Provider;

use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use AchrafSoltani\Mailgun\Client;

/**
 * Class MailgunServiceProvider
 * @package AchrafSoltani\Provider
 */
class MailgunServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {

        $app['mailgun'] = function () use ($app) {
            $client = new Client($app['mailgun.api_key']);
            $client->setWorkingDomain($app['mailgun.domain']);
            return $client;
        };
    }

    public function boot(Application $app)
    {

    }
}
