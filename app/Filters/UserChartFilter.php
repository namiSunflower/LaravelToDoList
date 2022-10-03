<?php

namespace App\Filters;
use Illuminate\Http\Request;

class UserChartFilter{
    protected $allowedParms = [
        'name' => ['eq'],
        'weight' => ['eq', 'gt', 'lt', 'gte', 'lte'],
        'height' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];

    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->allowedParms as $parm => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $parm;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}