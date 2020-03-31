<?php

function index_ALL(Web $w) {
    
    $w->ctx("Stats");




    // access service functions using the Web $w object and the module name
    $creaturetopiaStats = $w->Creaturetopia->getAllStats();

    // build the table array adding the headers and the row data
    $table = [];
    $tableHeaders = ['Statistics'];
    if (!empty($creaturetopiaStats)) {
        foreach ($creaturetopiaStats as $stats) {
            $row = [];
            // add values to the row in the same order as the table headers
            $row[] = $stats->statistic;
            // the actions column is used to hold buttons that link to actions per item. Note the item id is added to the href on these buttons.
            $actions = [];
            $actions[] = Html::b('/creaturetopia-statistics/edit/' . $stats->id,'Edit Stat');
            $actions[] = Html::b('/creaturetopia-statistics/delete/' . $stats->id, 'Delete', 'Are you sure you want to delete this statistic?');
            $row[] = implode('',$actions);
            $table[] = $row;
        }
    }

     //send the table to the template using ctx
     $w->ctx('statisticsTable', Html::table($table,'statistics_table','tablesorter',$tableHeaders));
}