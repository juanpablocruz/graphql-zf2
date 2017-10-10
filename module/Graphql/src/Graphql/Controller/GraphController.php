<?php
namespace Graphql\Controller;

use GraphQL\Schema;
use GraphQL\GraphQl;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

/**
 * GraphQL controller
 * @package Graphql
 * @author Juan Pablo Cruz <pablo.cruz@digimobil.es>
 */
class GraphController extends AbstractActionController
{
    protected $schema;

    public function __construct(Schema $schema)
    {
        $this->schema = $schema;
    }

    /**
     * Helper for replacing the char '?' with a parameter
     * @method str_replace_first
     * @param  string          $from    string to be replaced
     * @param  string          $to      string to use as replacement
     * @param  string          $subject source to look for $from
     * @return string                   string with $from changed
     */
    protected function str_replace_first($from, $to, $subject)
    {
        $from = '/'.preg_quote($from, '/').'/';

        return preg_replace($from, $to, $subject, 1);
    }

    /**
     * Converts an array of data to the proper string format for the mutation
     * @method convertDataToMutation
     * @param  array              $data associative array for creating a mutation
     * @return string                   mutation string
     */
    protected function convertDataToMutation($data)
    {
        $mutation = [];
        if (isset($data["function"])) {
            if (isset($data["filters"])) {
                $mutation = ["query" => "mutation { ".$data['function']."(?) {?} }"];
                $mutation = json_encode($mutation);
                $query = [];
                foreach ($data["filters"] as $field => $val) {
                    array_push($query, $field.":\\\"".$val."\\\"");
                }

                $fetch = [];
                foreach ($data["fetch"] as $field) {
                    array_push($fetch, $field);
                }

                $query = implode(",", $query);
                $fetch = implode(",", $fetch);
                $mutation = $this->str_replace_first('?', ($query), $mutation);
                $mutation = $this->str_replace_first('?', $fetch, $mutation);
            }
        }
        return $mutation;
    }

    /**
     * Converts an array of data to the proper string format for quering
     * @method convertDataToQuery
     * @param  array           $data associative array for creating a query
     * @return string              query string
     */
    protected function convertDataToQuery($data)
    {
        $query = [];
        if (isset($data["function"])) {
            $args = [];
            $fetch = [];
            if (isset($data["args"])) {
                foreach ($data["args"] as $field => $val) {
                    array_push($args, $field.": ".$val);
                }
                $args = implode(",", $args);
                $args = "(".$args.")";
            }
            if (isset($data["fetch"])) {
                foreach ($data["fetch"] as $key => $field) {
                    if (is_array($field)) {
                        $subfields = [];
                        foreach ($field as $subfield) {
                            array_push($subfields, $subfield);
                        }
                        $subfields = implode(",", $subfields);
                        $field = $key."{".$subfields."}";
                    }
                    array_push($fetch, $field);
                }
                $fetch = implode(",", $fetch);
            }
            if (empty($args)) {
                $args  = "";
            }
            $query = $data["function"].$args."{ ? }";

            $query = [
              "query" => $query,
              "args" => $fetch,
            ];
        }
        return $query;
    }

    /**
     * Process an array of data to generate the proper query string
     * @method generateQuery
     * @param  array      $data associative array for creating a query
     * @return string           query string
     */
    protected function generateQuery($data)
    {
        $q = [];
        $args = [];
        foreach ($data as $query) {
            $res =  $this->convertDataToQuery($query);
            array_push($q, $res["query"]);
            array_push($args, $res["args"]);
        }
        $q = implode(" ", $q);
        foreach ($args as $arg) {
            $q = $this->str_replace_first('?', $arg, $q);
        }

        $query = [
          "query" => "query{?}",
          ];
        $query = json_encode($query);
        $query = $this->str_replace_first('?', $q, $query);
        return $query;
    }

    /**
     * url handler listening for graphql queries
     * @method graphAction
     * @return json    returns the result of the provided query via input in json format
     */
    public function graphAction()
    {
        $query = [
          [
            "function" => "package",
            "args" => [
                "id" => 3
              ],
            "fetch" => [
                "id",
                "nombre"
              ]
            ],
            [
              "function" => "list",
              "fetch" => [
                  "users" => [
                    "firstName",
                  ],
                  "packages" => [
                    "nombre"
                    ]
                ]
            ]
        ];
        $mutation = [
          "function" => "registerUser",
          "filters" => [
            "firstName" => "pepa",
            "email" => "pepe@mail.com"
          ],
          "fetch" => [
            "id",
            "firstName",
            "email"
            ]
        ];

        // $in = $this->convertDataToMutation($mutation);
        $in = $this->generateQuery($query);
        // $input = json_decode(file_get_contents('php://input'), true);
        $input = json_decode($in, true);
        $query = $input['query'];

        $variableValues = isset($input['variables']) ? $input['variables'] : null;
        $rootValue = null;
        $context = null;

        $this->schema->assertValid();
        try {
            $result = GraphQl::execute(
                $this->schema,
                $query,
                $rootValue,
                $context,
                $variableValues
            );
        } catch (\Exception $exception) {
            $result = [
                'errors' => [
                    ['message' => $exception->getMessage()]
                ]
            ];
        }

        echo json_encode($result);
        exit;
    }
}
