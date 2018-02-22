<?php

/**
 * @apiGroup           User
 * @apiName            getUserInfo
 *
 * @api                {GET} /v1/gite Endpoint title here..
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
$router->get('getUserInfo', [
    'as' => 'api_user_get_user_info',
    'uses'  => 'Controller@getUserInfo',
    'middleware' => [
      'auth:api',
    ],
]);
