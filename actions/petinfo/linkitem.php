<?php

function linkitem_GET(Web $w)
{

    $p = $w->pathMatch('id');
    if (empty($p['id'])) {
        $w->error('No id found', 'creaturetopia');
    }
    $animal = $w->Creaturetopia->GetPetinfoForId($p['id']);
    if (empty($animal)) {
        $w->error('No animal found for id', 'creaturetopia');
    }

    //add a title to the action
    // change the title to reflect editing or adding a new animal
    $w->ctx('title', 'link item');

    // this array is the form definition
    $formData = [
        'item' =>[                         // this is a form section title
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['select item','select','item_id', '', $w->creaturetopia->GetAllItems()],      // this if the input field definition. [Label, type, name, value]
            ],
        ]
    ];

   
    // sending the form to the 'out' function bypasses the template.
    $w->out(Html::multiColForm($formData, '/creaturetopia-petinfo/linkitem/'.$animal->id));
}

function linkitem_POST(Web $w)
{

    $p = $w->pathMatch('id');
    if (empty($p['id'])) {
        $w->error('No id found', 'creaturetopia');
    }
    $animal = $w->creaturetopia->GetPetinfoForId($p['id']);
    if (empty($animal)) {
        $w->error('No animal found', 'creaturetopia');
    }

    $link = new creaturetopiaItemLink($w);
    $link->item_id = $_POST['item_id'];
    $link->info_id = $animal->id;
    
    // function for saving to database
    $link->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('item added', '/creaturetopia-petinfo/view/'.$animal->id);
}
