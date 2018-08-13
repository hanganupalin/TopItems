<?php
/**
 * Created by PhpStorm.
 * User: externaldev
 * Date: 13.08.18
 * Time: 14:06
 */
namespace TopItems\Providers;


use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class TopItemsRouteServiceProvider extends RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('topitems', 'TopItems\Controllers\ContentController@showTopItems');
    }
}