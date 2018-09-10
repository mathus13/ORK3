<?php
namespace Ork3\Graphql;

use GraphQL\Type\Definition\ObjectType;
use Ork3\System\Player;

class PlayerType extends ObjectType
{
    /**
     * Store_Type constructor.
     */
    public function __construct()
    {
        $config = [
        'name' => 'user',
        'description' => 'Fields for a store',
        'fields' => [
            'id' => [
                'type' => Types::int(),
                'description' => 'Store ID',
                'resolve' => function (Player $player) {
                    return $player->MundaneId;
                }
            ],
            'name' => [
                'type' => Types::string(),
                'description' => 'Mundane Name',
                'resolve' => function (Player $player) {
                    return "{$player->GivenName} {$player->Surname}";
                }
            ],
            'persona' => [
                'type' => Types::string(),
                'description' => 'Persona Name',
                'resolve' => function (Player $player) {
                    return $player->Persona;
                }
            ],
            'classes' => [
                'type' => Types::collection(ClassType::class),
                'description' => 'Player Classes',
                'resolve' => function (Player $player) {

                }
            ],
            'awards' => [
                'type' => Types::collection(AwardType::class),
                'description' => 'Player Awards',
                'resolve' => function (Player $player) {

                }
            ],
            'signins' => [
                'type' => Types::collection(SigninType::class),
                'description' => 'Player Signins',
                'resolve' => function (Player $player) {

                }
            ],
            'park' => [
                'type' => Types::object(ParkType::class),
                'resolve' => function (Player $player) {

                }
            ],
            'kingdom' => [
                'type' => Types::object(KingdomType::class),
                'resolve' => function (Player $player) {

                }
            ]
        ]
        ];
        parent::__construct($config);
    }
}
