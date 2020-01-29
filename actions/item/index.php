<?php

function index_ALL(Web $w) {
    
    $w->ctx("title", "See Items");




    // access service functions using the Web $w object and the module name
    $creaturetopiaItem = $w->Creaturetopia->getAllItems();

    // build the table array adding the headers and the row data
    $table = [];
    $tableHeaders = ['Name','Description','Stat List','Actions'];
    if (!empty($creaturetopiaItem)) {
        foreach ($creaturetopiaItem as $item) {
            $row = [];
            // add values to the row in the same order as the table headers
            $row[] = $item->item_name;
            $row[] = $item->item_description;
            $row[] = $item->stats_affected;
            // the actions column is used to hold buttons that link to actions per item. Note the item id is added to the href on these buttons.
            $actions = [];
            $actions[] = Html::b('/creaturetopia-item/edit/' . $item->id,'Edit Item');
            $actions[] = Html::b('/creaturetopia-item/delete/' . $item->id, 'Delete', 'Are you sure you want to delete this item?');
            $row[] = implode('',$actions);
            $table[] = $row;
        }
    }

     //send the table to the template using ctx
     $w->ctx('itemTable', Html::table($table,'item_table','tablesorter',$tableHeaders));
}