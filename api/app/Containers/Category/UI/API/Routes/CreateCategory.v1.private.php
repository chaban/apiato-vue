<?php

/**
 * @apiGroup           Category
 * @apiName            createCategory
 *
 * @api                {POST} /v1/categories Endpoint title here..
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
$router->post('categories', [
    'as' => 'api_category_create_category',
    'uses'  => 'Controller@createCategory',
    'middleware' => [
      'auth:api',
    ],
]);
