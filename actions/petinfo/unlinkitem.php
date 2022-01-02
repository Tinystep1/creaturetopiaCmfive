<?php

function unlinkitem_ALL(Web $w)
{
    // start by finding the item id included in the URL
    $p = $w->pathMatch('id');
    // check to see if the id has been found
    if (empty($p['id'])) {
        // if no id found use the 'error' function to redirect the use to a safe page and display a message.
        $w->error('No id found for info', 'creaturetopia');
    }
    $info_id = $p['id'];
    $item_id = $w->request('item_id');
    if (empty($item_id)) {
        $w->error('No item id found', 'creaturetopia');
    }
    $link = $w->creaturetopia->getItemLinkForInfoIdAndItemId($info_id, $item_id);
    if (empty($link)) {
        $w->error('No link found', 'creaturetopia');
    }

    // unlink the item
    $link->delete();
    // redirect the user back to the item list with a message
    $w->msg('Item removed', 'creaturetopia-petinfo/view/'. $info_id);
}
