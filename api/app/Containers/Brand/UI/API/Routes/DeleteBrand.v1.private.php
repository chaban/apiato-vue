<?php

/**
 * @apiGroup           Brand
 * @apiName            deleteBrand
 *
 * @api                {DELETE} /v1/brands/:id Endpoint title here..
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
$router->delete('brands/{id}', [
    'as' => 'api_brand_delete_brand',
    'uses'  => 'Controller@deleteBrand',
    'middleware' => [
      'auth:api',
    ],
]);
