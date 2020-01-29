<?php

function view_GET(Web $w) {

    $p = $w->pathMatch('id');
    if (empty($p['id'])) {
        $w->error('No id found','creaturetopia');
    }
    $animal = $w->creaturetopia->GetPetinfoForId($p['id']);
    if (empty($animal)) {
        $w->error('No animal found','creaturetopia');
    }
    $w->ctx("animal", $animal);

    $w->ctx('title', $animal->animal_name);

    $creaturetopiaItem = $w->Creaturetopia->getAllItemsForInfoId($animal->id);

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
            $actions[] = Html::b('/creaturetopia-petinfo/unlinkitem/' . $animal->id . '?item_id=' . $item->id, 'Remove', 'Are you sure you want to remove this item?');
            $row[] = implode('',$actions);
            $table[] = $row;
        }
    }

     //send the table to the template using ctx
     $w->ctx('itemTable', Html::table($table,'item_table','tablesorter',$tableHeaders));

}