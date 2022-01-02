<?php

function viewanimalinfo_ALL(Web $w)
{
    //$w->setLayout('creaturetopia/templates/public/layout.tpl.php');

    $p = $w->pathMatch('id');
    if (empty($p['id'])) {
        $w->error('No id found', '/creaturetopia/index');
    }
    $animal = $w->creaturetopia->GetPetinfoForId($p['id']);
    if (empty($animal)) {
        $w->error('No animal found', '/creaturetopia/index');
    }
    $w->ctx("animal", $animal);
}
