<?php

/**
 * @apiGroup           Brand
 * @apiName            createBrand
 *
 * @api                {POST} /v1/brands Endpoint title here..
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
$router->post('brands', [
    'as' => 'api_brand_create_brand',
    'uses'  => 'Controller@createBrand',
    'middleware' => [
      'auth:api',
    ],
]);
