<?php
/**
 * Created by PhpStorm.
 * User: externaldev
 * Date: 13.08.18
 * Time: 14:07
 */


namespace TopItems\Controllers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract;

class ContentController extends Controller
{
    public function showTopItems(Twig $twig, ItemDataLayerRepositoryContract $itemRepository):string
    {
        $itemColumns = [
            'itemDescription' => [
                'name1',
                'description'
            ],
            'variationBase' => [
                'id'
            ],
            'variationRetailPrice' => [
                'price'
            ],
            'variationImageList' => [
                'path',
                'cleanImageName'
            ]
        ];

        $itemFilter = [
            'itemBase.isStoreSpecial' => [
                'shopAction' => [3]
            ]
        ];

        $itemParams = [
            'language' => 'en'
        ];

        $resultItems = $itemRepository
            ->search($itemColumns, $itemFilter, $itemParams);

        $items = array();
        foreach ($resultItems as $item)
        {
            $items[] = $item;
        }
        $templateData = array(
            'resultCount' => $resultItems->count(),
            'currentItems' => $items
        );

        return $twig->render('TopItems::content.Items', $templateData);
    }
}