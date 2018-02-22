<?php

/**
 * @apiGroup           Brand
 * @apiName            getAllBrands
 *
 * @api                {GET} /v1/brands Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('brands', [
    'as' => 'api_brand_get_all_brands',
    'uses'  => 'Controller@getAllBrands',
    'middleware' => [
      'auth:api',
    ],
]);
