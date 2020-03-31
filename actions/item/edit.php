<?php

function edit_GET(Web $w) {

   // we now need to check if we are creating a new item or editing an existing one
   // we will use pathMatch to retrieve an item id from the url.
   $p = $w->pathMatch('id');
   // if the id exists we will retrieve the data for that item otherwise we will create a new item. 
   $item = !empty($p['id']) ? $w->creaturetopia->GetItemForId($p['id']) : new creaturetopiaItem($w);

    //add a title to the action
   // change the title to reflect editing or adding a new anaiml
   $w->ctx('title', !empty($p['id']) ? 'Edit item' : 'Add new item');

    // this array is the form deffinition
    $formData = [
        'Item Data' =>[                         // this is a form section title
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Name','text','item_name', $item->item_name],      // this if the input field definition. [Label, type, name, value]
            ],
            [                                   // this row has 1 input fields.
                ['Description', 'textarea', 'item_description',$item->item_description],    //brief item description
            ],
            [ 
                ['Stat List', 'text','stats_affected',  $item->stats_affected]       //List of stats item affects
            ]
        ]
    ];

   // If we are editing an existing item we need to send the id to the post method.
   if (!empty($p['id'])) {
       $postUrl = '/creaturetopia-item/edit/' . $item->id;
   } else {
       $postUrl = '/creaturetopia-item/edit';
   }
        // sending the form to the 'out' function bypasses the template. 
   $w->out(Html::multiColForm($formData, $postUrl));
    
}

function edit_POST(Web $w) {

    // As in the GET method we need to check if we are editing an existing item.
    $p = $w->pathMatch('id');
    $item = !empty($p['id']) ? $w->creaturetopia->getItemForId($p['id']) : new creaturetopiaItem($w);
    
    //use the fill function to fill input field data into properties with matching names
    $item->fill($_POST);
    
    // function for saving to database
    $item->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('Item Saved', '/creaturetopia-item');
}