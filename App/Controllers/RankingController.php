<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\PersonalRecord;
use App\Models\Movement;

/**
 * @OA\Info(
 *     title="API de Ranking de Movimentos",
 *     version="1.0.0",
 *     description="Esta API permite consultar rankings de movimentos esportivos baseados nos recordes pessoais dos usuários."
 * )
 *
 * @OA\PathItem(
 *     path="/api/ranking/{movement_id}",
 *     summary="Obtém o ranking de um movimento"
 * )
 *
 * @OA\Get(
 *     path="/api/ranking/{movement_id}",
 *     summary="Obtém o ranking de um movimento",
 *     tags={"Ranking"},
 *     @OA\Parameter(
 *         name="movement_id",
 *         in="path",
 *         required=true,
 *         description="ID do movimento",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ranking retornado com sucesso",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="movimento", type="string", example="Bench Press"),
 *             @OA\Property(
 *                 property="ranking",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="posicao", type="integer", example=1),
 *                     @OA\Property(property="usuario", type="string", example="João"),
 *                     @OA\Property(property="recorde", type="float", example=180.0),
 *                     @OA\Property(property="data", type="string", format="date-time", example="2021-01-02 00:00:00")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Movimento não encontrado"
 *     )
 * )
 */
class RankingController
{
    public function getRanking(Request $request, Response $response, array $args)
    {
        $movementId = (int) $args['movement_id'];

        $movement = Movement::find($movementId);
        if (!$movement) {
            $response->getBody()->write(json_encode([
                'error' => 'Movimento não encontrado'
            ]));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }

        $records = PersonalRecord::where('movement_id', $movementId)
            ->selectRaw('user_id, MAX(value) as record, MAX(date) as last_date')
            ->groupBy('user_id')
            ->orderByDesc('record')
            ->get();

        if ($records->isEmpty()) {
            $response->getBody()->write(json_encode([
                'movimento' => $movement->name,
                'ranking'   => [],
                'message'   => 'Nenhum recorde encontrado para este movimento.'
            ]));
            return $response->withHeader('Content-Type', 'application/json');
        }

        $ranking = [];
        $posicao = 1;
        $ultimoValor = null;

        foreach ($records as $index => $record) {
            if ($ultimoValor !== null && $ultimoValor != $record->record) {
                $posicao = $index + 1;
            }

            $ranking[] = [
                'posicao' => $posicao,
                'usuario' => $record->user->name,
                'recorde' => $record->record,
                'data'    => $record->last_date
            ];

            $ultimoValor = $record->record;
        }

        $response->getBody()->write(json_encode([
            'movimento' => $movement->name,
            'ranking'   => $ranking
        ]));

        return $response->withHeader('Content-Type', 'application/json');
    }
}
