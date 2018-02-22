<?php

/**
 * @apiGroup           Brand
 * @apiName            findBrandById
 *
 * @api                {GET} /v1/brands/:id Endpoint title here..
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
$router->get('brands/{id}', [
    'as' => 'api_brand_find_brand_by_id',
    'uses'  => 'Controller@findBrandById',
    'middleware' => [
      'auth:api',
    ],
]);
