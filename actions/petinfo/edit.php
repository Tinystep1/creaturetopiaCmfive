<?php

function edit_GET(Web $w) {

    //add a title to the action
    $w->ctx('title','Add new animal');

    $p = $w->pathMatch('id');
    $animal = !empty($p['id']) ? $w->Example->getItemForId($p['id']) : new creaturetopiaPetinfo($w);


    // this array is the form deffinition
    $formData = [
        'Item Data' =>[                         // this is a form section title
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Name','text','animal_name', $animal->animal_name],      // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // this row has 3 input fields.
                ['Description', 'text', 'description_of_animal', $animal->description_of_animal],    //brief animal description
                ['Item List', 'text', 'item_list', $animal->item_list],      //List of items specific to animal
                ['Stat List', 'text','stat_list',  $animal->stat_list]       //List of stats most helpful to this type of animal in shows
            ]
        ]
    ];

    if (!empty($p['id'])) {
        $postUrl = '/creaturetopia-petinfo/edit/' . $animal->id;
    } else {
        $postUrl = '/creaturetopia-petinfo/edit';
    }

    // sending the form to the 'out' function bypasses the template. 
    $w->out(Html::multiColForm($formData, $postUrl));

}

function edit_POST(Web $w) {

    $p = $w->pathMatch('id');
    $animal = !empty($p['id']) ? $w->creaturetopia->getItemForId($p['id']) : new creaturetopiaPetinfo($w);
    
    //use the fill function to fill input field data into properties with matching names
    $animal->fill($_POST);
    
    // function for saving to database
    $animal->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('Animal Saved', '/creaturetopia');
}