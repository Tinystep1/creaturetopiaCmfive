<?php

function edit_GET(Web $w) {

   // we now need to check if we are creating a new statistic or editing an existing one
   // we will use pathMatch to retrieve an statistic id from the url.
   $p = $w->pathMatch('id');
   // if the id exists we will retrieve the data for that statistic otherwise we will create a new stat. 
   $stats = !empty($p['id']) ? $w->creaturetopia->GetStatForId($p['id']) : new creaturetopiaStats($w);

    //add a title to the action
   // change the title to reflect editing or adding a new anaiml
   $w->ctx('title', !empty($p['id']) ? 'Edit statistic' : 'Add new statistic');

    // this array is the form deffinition
    $formData = [
        'Statistic Data' =>[                         // this is a form section title
            [                                   // each array on this level represents a row on the form. This row has only a single input feild.
                ['Stat','string','statistics', $stats->statistic],      // this if the input field definition. [Label, type, name, value]. Name of statistic.
            ],
            [                                   // this row has 1 input fields.
                ['Rules', 'text', 'stat_rules',$item->statistic_rules],    //any rules that apply to the statistic
            ],
            ]
        ]
    ];

   // If we are editing an existing item we need to send the id to the post method.
   if (!empty($p['id'])) {
       $postUrl = '/creaturetopia-statistics/edit/' . $stats->id;
   } else {
       $postUrl = '/creaturetopia-statistics/edit';
   }
        // sending the form to the 'out' function bypasses the template. 
   $w->out(Html::multiColForm($formData, $postUrl));
    
}

function edit_POST(Web $w) {

    // As in the GET method we need to check if we are editing an existing item.
    $p = $w->pathMatch('id');
    $stats = !empty($p['id']) ? $w->creaturetopia->getItemForId($p['id']) : new creaturetopiaStats($w);
    
    //use the fill function to fill input field data into properties with matching names
    $stats->fill($_POST);
    
    // function for saving to database
    $stats->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('Statistic Saved', '/creaturetopia-statistics');
}