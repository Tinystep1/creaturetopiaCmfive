<?php

class InsightTestClass2 extends InsightBaseClass
{
    public $name = "Test Insight 2";
    public $description = "Test model for insights in creaturetopia repository";

    //Displays Filters to select user
    public function getFilters(Web $w, $parameters = []): array

    {
        return ["Select User" => [
            [
                ["Users", "select", "users", null, AuthService::getInstance($w)->getUsers()],
                ['Date', 'date', 'date', null]
            ]
        ]];
    }

    //Displays insights for selected member
    public function run(Web $w, $parameters = []): array

    {
        InsightService::getInstance($w)->date2db($parameters['date']);
        $results = [];
        $results[] = new InsightReportInterface('Test Title', ['column 1', 'column 2'], [['data 1', 'data 2'], ['data 1', 'data 2']]);
        return $results;
    }
}
