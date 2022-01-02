<?php

use Html\Form\InputField;
use Html\Form\Select;

function edit_GET(Web $w)
{
    // we now need to check if we are creating a new animal or editing an existing one
    // we will use pathMatch to retrieve an animal id from the url.
    $p = $w->pathMatch('id');
    // if the id exists we will retrieve the data for that animal otherwise we will create a new item.
    $animal = !empty($p['id']) ? $w->creaturetopia->GetPetinfoForId($p['id']) : new creaturetopiaPetinfo($w);

    //add a title to the action
    // change the title to reflect editing or adding a new animal
    $w->ctx('title', !empty($p['id']) ? 'Edit animal' : 'Add new animal');

    // this array is the form definition
    $formData = [
        'Animal Data' =>[                         // this is a form section title
            [                                   // each array on this level represents a row on the form. This row has only a single input.
                ['Name','text','animal_name', $animal->animal_name], // this if the input field definition. [Label, type, name, value]
                (new \Html\Form\Select($w))->setLabel('Template')->setName('template_id')->setOptions(TemplateService::getInstance($w)->findTemplates('insights', 'AuditInsight_pdf', false, false)),
                //template_select
    // $insight_class_name_pdf = $p['insight_class'] . '_pdf';
        
    // //Drop-down for choosing template to use for export
    // $templates = TemplateService::getInstance($w)->findTemplates('insights', $insight_class_name_pdf, false, false);

    // $template_select = (new \Html\Form\Select($w))->setLabel('Template')->setName('template_id')->setOptions($templates);//->setRequired(false)

    // $w->ctx('template_select', $template_select);
            ],
            [                                   // this row has 3 input fields.
                ['Description', 'textarea', 'description_of_animal', $animal->description_of_animal],    //brief animal description
            ],
            [
                ['Item List', 'text', 'item_list', $animal->item_list],      //List of items specific to animal
                ['Stat List', 'text','stat_list',  $animal->stat_list]       //List of stats most helpful to this type of animal in shows
            ]
        ]
    ];

    // If we are editing an existing item we need to send the id to the post method.
    if (!empty($p['id'])) {
        $postUrl = '/creaturetopia-petinfo/edit/' . $animal->id;
    } else {
        $postUrl = '/creaturetopia-petinfo/edit';
    }
        // sending the form to the 'out' function bypasses the template.
    $w->out(Html::multiColForm($formData, $postUrl));
}

function edit_POST(Web $w)
{
    // As in the GET method we need to check if we are editing an existing item.
    $p = $w->pathMatch('id');
    $animal = !empty($p['id']) ? $w->creaturetopia->getPetInfoForId($p['id']) : new creaturetopiaPetinfo($w);
    
    //use the fill function to fill input field data into properties with matching names
    $animal->fill($_POST);
    
    // function for saving to database
    $animal->insertOrUpdate();
    
    // the msg (message) function redirects with a message box
    $w->msg('Animal Saved', '/creaturetopia/index');
}
