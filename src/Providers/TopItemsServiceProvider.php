<?php
/**
 * Created by PhpStorm.
 * User: externaldev
 * Date: 13.08.18
 * Time: 14:05
 */
namespace TopItems\Providers;


use Plenty\Plugin\ServiceProvider;

class TopItemsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(TopItemsRouteServiceProvider::class);
    }
}
