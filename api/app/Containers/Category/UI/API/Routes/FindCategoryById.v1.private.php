<?php

/**
 * @apiGroup           Category
 * @apiName            findCategoryById
 *
 * @api                {GET} /v1/categories/:id Endpoint title here..
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
$router->get('categories/{id}', [
    'as' => 'api_category_find_category_by_id',
    'uses'  => 'Controller@findCategoryById',
    'middleware' => [
      'auth:api',
    ],
]);
