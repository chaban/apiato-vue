<?php

/**
 * @apiGroup           Brand
 * @apiName            updateBrand
 *
 * @api                {PATCH} /v1/brands/:id Endpoint title here..
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
$router->patch('brands/{id}', [
    'as' => 'api_brand_update_brand',
    'uses'  => 'Controller@updateBrand',
    'middleware' => [
      'auth:api',
    ],
]);
