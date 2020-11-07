<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController
{
    /** @var string $apiKey */
    private $apiKey;

    /**
     * IndexController constructor.
     * @param Request $request
     * @throws InvalidArgumentException
     */
    public function __construct(
        Request $request
    ){
        $this->apiKey = env('GOOGLE_PLACES_API_KEY');
    }

    /**
     * @return Factory|View
     */
    public function indexAction()
    {
        return view('map.index', [
            'googleMapsApiKey' => $this->apiKey
        ]);
    }
}

