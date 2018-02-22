<?php

/**
 * @apiGroup           Product
 * @apiName            deleteProduct
 *
 * @api                {DELETE} /v1/products/:id Endpoint title here..
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
$router->delete('products/{id}', [
    'as' => 'api_product_delete_product',
    'uses'  => 'Controller@deleteProduct',
    'middleware' => [
      'auth:api',
    ],
]);
