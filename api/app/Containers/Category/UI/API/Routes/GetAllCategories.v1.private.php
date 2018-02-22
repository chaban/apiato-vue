<?php

/**
 * @apiGroup           Category
 * @apiName            getAllCategories
 *
 * @api                {GET} /v1/categories Endpoint title here..
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
$router->get('categories', [
    'as' => 'api_category_get_all_categories',
    'uses'  => 'Controller@getAllCategories',
    'middleware' => [
      'auth:api',
    ],
]);
