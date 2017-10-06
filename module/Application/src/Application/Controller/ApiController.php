<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;

class ApiController extends AbstractActionController
{
    public function graphAction()
    {
        $queryType = new ObjectType([
            'name' => 'Query',
            'fields' => [
                'echo' => [
                    'type' => Type::string(),
                    'args' => [
                        'message' => Type::nonNull(Type::string()),
                    ],
                    'resolve' => function ($root, $args) {
                        return $root['prefix'] . $args['message'];
                    }
                ],
            ],
        ]);
        $schema = new Schema([
          'query' => $queryType
        ]);

        $rawInput = file_get_contents('php://input');

        // try {
        //     $input = json_decode($rawInput, true);
        //     $query = $input['query'];
        //     $variableValues = isset($input['variables']) ? $input['variables'] : null;
        //     $rootValue = ['prefix' => 'You said: '];
        //     $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
        //     $output = $result->toArray();
        // } catch (\Exception $e) {
        //     $output = [
        //         'errors' => [
        //             [
        //                 'message' => $e->getMessage()
        //             ]
        //         ]
        //     ];
        // }
        header('Content-Type: application/json');

        return new JsonModel(["output"=>$rawInput]);
    }
}
