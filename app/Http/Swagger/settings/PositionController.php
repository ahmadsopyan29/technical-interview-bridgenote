<?php

class PositionController

{
    public function insert()
    {
        /**
         * @OA\Post(
         ** path="/api/insertposition",
         *   tags={"Management Position"},
         *   summary="Create New Position",
         *   operationId="insertposition",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *  @OA\Parameter(
         *      name="user_id",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *  @OA\Parameter(
         *      name="position",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *  @OA\Parameter(
         *      name="status",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           enum= {"active", "inactive"}
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
         ** path="/api/position/{user_id}",
         *   tags={"Management Position"},
         *   summary="Get Position By User Id",
         *   operationId="getPositionById",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *    @OA\Parameter(
         *      name="user_id",
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
         ** path="/api/updateposition",
         *   tags={"Management Position"},
         *   summary="Update Position",
         *   operationId="updateposition",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *  @OA\Parameter(
         *      name="user_id",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *  @OA\Parameter(
         *      name="position",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           type="string"
         *      )
         *   ),
         *  @OA\Parameter(
         *      name="status",
         *      in="query",
         *      required=true,
         *      @OA\Schema(
         *           enum= {"active", "inactive"}
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
         ** path="/api/deleteposition/{user_id}",
         *   tags={"Management Position"},
         *   summary="Delete Position",
         *   operationId="deleteposition",
         *   security={{"bearerAuth":{}}},
         *     security={
         *         {
         *             "api_key": {},
         *         }
         *     },
         *    @OA\Parameter(
         *      name="user_id",
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
