<?php

class UserController

{
    public function index()
    {
        /**
         * @OA\Get(
         ** path="/api/users",
         *   tags={"Management User"},
         *   summary="Get All User",
         *   operationId="users",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *   @OA\Response(
         *      response=200,
         *       description="Success",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=401,
         *       description="Unauthenticated"
         *   ),
         *   @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         *   @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *)
         **/
    }

    public function insert()
    {
        /**
         * @OA\Post(
         ** path="/api/insertuser",
         *   tags={"Management User"},
         *   summary="Create New User",
         *   operationId="insertuser",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *  @OA\Parameter(
         *      name="name",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *  @OA\Parameter(
         *      name="email",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *   @OA\Parameter(
         *      name="password",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *      @OA\Parameter(
         *      name="c_password",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *   @OA\Response(
         *      response=200,
         *       description="Success",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=401,
         *       description="Unauthenticated"
         *   ),
         *   @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         *   @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *)
         **/
    }

    public function edit()
    {
        /**
         * @OA\Get(
         ** path="/api/user/{id}",
         *   tags={"Management User"},
         *   summary="Get User By Id",
         *   operationId="getUserById",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *    @OA\Parameter(
         *      name="id",
         *      in="path",
         *      required=true,
         *      @OA\Schema(
         *          type="integer",
         *           format="int64"
         *      )
         *   ),
         *   @OA\Response(
         *      response=200,
         *       description="Success",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=401,
         *       description="Unauthenticated"
         *   ),
         *   @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         *   @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *)
         **/
    }

    public function update()
    {
        /**
         * @OA\Put(
         ** path="/api/update",
         *   tags={"Management User"},
         *   summary="Update User",
         *   operationId="updateuser",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *    @OA\Parameter(
         *      name="id",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *          type="integer",
         *           format="int64"
         *      )
         *   ),
         *  @OA\Parameter(
         *      name="name",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *  @OA\Parameter(
         *      name="email",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *   @OA\Parameter(
         *      name="password",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *      @OA\Parameter(
         *      name="c_password",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *   @OA\Response(
         *      response=200,
         *       description="Success",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=401,
         *       description="Unauthenticated"
         *   ),
         *   @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         *   @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *)
         **/
    }

    public function delete()
    {
        /**
         * @OA\Delete(
         ** path="/api/deleteuser/{id}",
         *   tags={"Management User"},
         *   summary="Delete User",
         *   operationId="deleteUser",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *    @OA\Parameter(
         *      name="id",
         *      in="path",
         *      required=true,
         *      @OA\Schema(
         *          type="integer",
         *           format="int64"
         *      )
         *   ),
         *   @OA\Response(
         *      response=200,
         *       description="Success",
         *      @OA\MediaType(
         *           mediaType="application/json",
         *      )
         *   ),
         *   @OA\Response(
         *      response=401,
         *       description="Unauthenticated"
         *   ),
         *   @OA\Response(
         *      response=400,
         *      description="Bad Request"
         *   ),
         *   @OA\Response(
         *      response=404,
         *      description="not found"
         *   ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *)
         **/
    }
}
