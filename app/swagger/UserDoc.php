<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 4/4/2019
 * Time: 9:49 PM
 */


/** @OA\Info(
 *     title="Laravel Demo",
 *     version="1.0",
 *     @OA\Contact(
 *          email="martin.cincurak@gmail.com"
 *      ),
 * )
 **/

/**
 *
 * post log in
 *
 * @OA\Post(path="/api/login",
 *   tags={"User"},
 *   summary="Log in user",
 *   description="Log in user",
 *   operationId="loginUser",
 *    @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string"
 *                 ),
 *                 example={"email": 10, "password": "Jessica Smith"}
 *             )
 *         )
 *     ),
 *   @OA\Response(response="422", description="User does not exist"),
 *   @OA\Response(response="200", description="Return Token",
 *           @OA\MediaType(
 *             mediaType="application/json",
 *              @OA\Schema(
 *                 @OA\Property(
 *                     property="Token",
 *                     type="string"
 *                 ),
 *                 example={"Token": "wrfdfgrt"}
 *             )
 *         ),
 *   )
 * )
 */


/**
*
* post register user
*
* @OA\Post(path="/api/register",
*   tags={"User"},
*   summary="Register user",
*   description="Register user",
*   operationId="registerUser",
*    @OA\RequestBody(
*         @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(
*                 @OA\Property(
*                     property="email",
*                     type="string"
*                 ),
*                 @OA\Property(
*                     property="password",
*                     type="string"
*                 ),
*                 example={"email": 10, "password": "Jessica Smith"}
*             )
*         )
*     ),
*   @OA\Response(response="422", description="User does not exist"),
*   @OA\Response(response="200", description="Return Token",
*           @OA\MediaType(
*             mediaType="application/json",
*              @OA\Schema(
*                 @OA\Property(
*                     property="Token",
*                     type="string"
*                 ),
*                 example={"Token": "wrfdfgrt"}
*             )
*         ),
*   )
* )
**/