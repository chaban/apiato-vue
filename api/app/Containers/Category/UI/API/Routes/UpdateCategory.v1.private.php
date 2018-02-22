<?php

/**
 * @apiGroup           Category
 * @apiName            updateCategory
 *
 * @api                {PATCH} /v1/categories/:id Endpoint title here..
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
$router->patch('categories/{id}', [
    'as' => 'api_category_update_category',
    'uses'  => 'Controller@updateCategory',
    'middleware' => [
      'auth:api',
    ],
]);
