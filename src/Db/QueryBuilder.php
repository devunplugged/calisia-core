<?php
namespace CalisiaCore\Db;

class QueryBuilder{

    private $query = [];
    private $params = [];
    private $modelNames = [];
    private $models;


    public function __construct(){
        global $wpdb;
        $this->db = $wpdb;
    }

    public function getQuery(){
        $query = $this->query['select'];
        $query .= isset($this->query['from']) ? $this->query['from'] : '';
        $query .= isset($this->query['where']) ? $this->query['where'] : '';
        return $query;
    }

    public function select($modelName){
        $this->modelNames[] = $modelName;
        $model = new $modelName();
        $reflect = new \ReflectionClass($model);
        $tableName = $this->db->prefix . strtolower($reflect->getShortName());

        $this->appendToQuery('select', 'SELECT ');

        foreach($reflect->getProperties() as $property){
            $this->appendToQuery('select', $tableName . '.' . $property->getName() . ' AS ' . $tableName . $property->getName() . ', ');
        }
        $this->query['select'] = rtrim($this->query['select'], ', ');

        $this->appendToQuery('from', ' FROM ' . $tableName . ' ');

        return $this;
    }

    public function and($condition){
        $this->appendToQuery('where', 'AND ' . $condition[0] . ' ' . $condition[1] . ' ' . $this->getPlaceholder($condition[2]));
        $this->params[] =  $condition[2];
        return $this;
    }

    public function or($condition){
        $this->appendToQuery('where', 'OR ' . $condition[0] . ' ' . $condition[1] . ' ' . $this->getPlaceholder($condition[2]));
        $this->params[] =  $condition[2];
        return $this;
    }

    private function appendToQuery($type, $content){
        if(isset($this->query[$type])){
            $this->query[$type] .= $content;
        }else{
            $this->query[$type] = $content;
        }
    }

    public function where($condition){
        
        $this->appendToQuery('where', 'WHERE ' . $condition[0] . ' ' . $condition[1] . ' ' . $this->getPlaceholder($condition[2]));
        $this->params[] =  $condition[2];
        return $this;

    }

    public function leftJoin($modelName){
        $this->modelNames[] = $modelName;
        $model = new $modelName();
        $reflect = new \ReflectionClass($model);
        $tableName = $this->db->prefix . strtolower($reflect->getShortName());

        $this->appendToQuery('where', 'LEFT JOIN ' . $tableName . ' ');

        foreach($reflect->getProperties() as $property){
            $this->query['select'] .= ', ' . $tableName . '.' . $property->getName() . ' AS ' . $tableName . $property->getName();
        }


        return $this;
    }

    public function on($condition){
        $this->appendToQuery('where', 'ON ' . $condition[0] . ' ' . $condition[1] . ' ' . $condition[2] . ' ');
        return $this;
    }

    private function getPlaceholder($var){
        if(is_int($var)){
            return '%d';
        }
        if(is_string($var)){
            return '%s';
        }
        if(is_float($var)){
            return '%f';
        }

        return '%s';
    }

    public function execute(){
      
        if(empty($this->params)){
            $results = $this->db->get_results($this->getQuery(), ARRAY_A);
        }else{
            $results = $this->db->get_results($this->db->prepare($this->getQuery(), $this->params), ARRAY_A);
        }
        


        $queryResults = [];
        foreach($results as $result){
            $queryResult = [];
            foreach($this->modelNames as $modelName){
                $model = new $modelName();
                $reflect = new \ReflectionClass($model);
                $tableName = $this->db->prefix . strtolower($reflect->getShortName());
                foreach($reflect->getProperties() as $property){
                    if(isset($result[$tableName . $property->getName()])){
                        $methodName = 'set_' . $property->getName();
                        $model->$methodName($result[$tableName . $property->getName()]);

                    }
                }
                $queryResult[$reflect->getShortName()] = $model;
            }
            $queryResults[] = $queryResult;
        }
        return $queryResults;
    }
}