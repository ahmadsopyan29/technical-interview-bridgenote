<?php

class AuthController

{
    public function login()
    {
        /**
         * @OA\Post(
         ** path="/api/login",
         *   tags={"Authentication"},
         *   summary="Login",
         *   operationId="login",
         *
         *   @OA\Parameter(
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
         *          type="string"
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

    public function logout()
    {
        /**
         * @OA\Get(
         ** path="/api/logout",
         *   tags={"Authentication"},
         *   summary="Logout",
         *   operationId="logout",
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
}
