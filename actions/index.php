<?php

function index_ALL(Web $w) {
    
    $w->ctx("title", "See Animal Info");
    

    // access service functions using the Web $w object and the module name
    $creaturetopiaPetinfo = $w->Creaturetopia->getAllPetinfo();

    // build the table array adding the headers and the row data
    $table = [];
    $tableHeaders = ['Name','Description','Item List','Stat List','Actions'];
    if (!empty($creaturetopiaPetinfo)) {
        foreach ($creaturetopiaPetinfo as $animal) {
            $row = [];
            // add values to the row in the same order as the table headers
            $row[] = $animal->animal_name;
            $row[] = $animal->description_of_animal;
            $row[] = $animal->item_list;
            $row[] = $animal->stat_list;
            // the actions column is used to hold buttons that link to actions per item. Note the item id is added to the href on these buttons.
            $actions = [];
            $actions[] = Html::b('/creaturetopia-petinfo/edit/' . $animal->id,'Edit Animal');
            $actions[] = Html::b('/creaturetopia-petinfo/delete/' . $animal->id, 'Delete', 'Are you sure you want to delete this animal?');
            $actions[] = Html::b('/creaturetopia-petinfo/view/' . $animal->id, 'View animal');
            $row[] = implode('',$actions);
            $table[] = $row;
        }
    }

    //send the table to the template using ctx
    $w->ctx('petinfoTable', Html::table($table,'petinfoTable','tablesorter',$tableHeaders));
    
}