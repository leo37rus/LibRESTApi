<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Swagger\Controller as Controller;

/**
 *
 * @OA\Post(
 *     path="/api/v1/book",
 *     summary="Создание",
 *     tags={"Api"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name", type="string", example="The Picture of Dorian Gray"),
 *                      @OA\Property(property="author", type="string", example="Oscar Wilde"),
 *                      @OA\Property(property="year", type="string", example="1890")
 *                  )
 *              }
 *          )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *             @OA\Property(property="id", type="integer", example="5"),
 *             @OA\Property(property="name", type="string", example="The Picture of Dorian Gray"),
 *             @OA\Property(property="author", type="string", example="Oscar Wilde"),
 *             @OA\Property(property="year", type="string", example="1890")
 *             ),
 *         ),
 *     ),
 * ),
 * @OA\Get(
 *      path="/api/v1/book",
 *      summary="Список",
 *      tags={"Api"},
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=404,
 *          description="Not found",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                     @OA\Property(property="id", type="integer", example="5"),
 *                     @OA\Property(property="name", type="string", example="The Picture of Dorian Gray"),
 *                     @OA\Property(property="author", type="string", example="Oscar Wilde"),
 *                     @OA\Property(property="year", type="string", example="1890")
 *              )),
 *          ),
 *      ),
 *  ),
 * @OA\Get(
 *       path="/api/v1/book/{book}",
 *       summary="Получение записи по id",
 *       tags={"Api"},
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter(
 *           description="ID книги",
 *           in="path",
 *           name="book",
 *           required=true,
 *           example=1
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Not found",
 *           @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *              @OA\Property(property="id", type="integer", example="5"),
 *              @OA\Property(property="name", type="string", example="The Picture of Dorian Gray"),
 *              @OA\Property(property="author", type="string", example="Oscar Wilde"),
 *              @OA\Property(property="year", type="string", example="1890")
 *              ),
 *          ),
 *       ),
 * ),
 * @OA\Patch(
 *        path="/api/v1/book/{book}",
 *        summary="Обновление записи",
 *        tags={"Api"},
 *        security={{ "bearerAuth": {} }},
 *        @OA\Parameter(
 *            description="ID книги",
 *            in="path",
 *            name="book",
 *            required=true,
 *            example=5
 *        ),
 *        @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="name", type="string", example="The Picture of Dorian Gray"),
 *                       @OA\Property(property="author", type="string", example="Oscar Wilde"),
 *                       @OA\Property(property="year", type="string", example="1890")
 *                   )
 *               }
 *           )
 *        ),
 *        @OA\Response(
 *            response=404,
 *            description="Not found",
 *            @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *               @OA\Property(property="id", type="integer", example="5"),
 *               @OA\Property(property="name", type="string", example="The Picture of Dorian Gray"),
 *               @OA\Property(property="author", type="string", example="Oscar Wilde"),
 *               @OA\Property(property="year", type="string", example="1890")
 *               ),
 *           ),
 *        ),
 * ),
 * @OA\Post(
 *        path="/api/v1/book/{book}/reserve",
 *        summary="Бронирование книги",
 *        tags={"Api"},
 *        security={{ "bearerAuth": {} }},
 *        @OA\Parameter(
 *            description="ID книги",
 *            in="path",
 *            name="book",
 *            required=true,
 *            example=1
 *        ),
 *         @OA\Response(
 *             response=404,
 *             description="Not found",
 *            ),
 *         ),
 *  ),
 * @OA\Post(
 *         path="/api/v1/book/{book}/unreserve",
 *         summary="Возврат книги",
 *         tags={"Api"},
 *         security={{ "bearerAuth": {} }},
 *         @OA\Parameter(
 *             description="ID книги",
 *             in="path",
 *             name="book",
 *             required=true,
 *             example=1
 *         ),
 *          @OA\Response(
 *              response=404,
 *              description="Not found",
 *             ),
 *          ),
 *   ),
 * @OA\Delete(
 *        path="/api/v1/book/{book}",
 *        summary="Удаление записи по id",
 *        tags={"Api"},
 *        security={{ "bearerAuth": {} }},
 *        @OA\Parameter(
 *            description="ID книги",
 *            in="path",
 *            name="book",
 *            required=true,
 *            example=1
 *        ),
 *        @OA\Response(
 *            response=404,
 *            description="Not found",
 *            @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="Book removed")
 *               ),
 *           ),
 *        ),
 *  ),
 *
 */
class BaseController extends Controller
{

}
