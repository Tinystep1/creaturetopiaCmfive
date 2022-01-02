<?php

function delete_ALL(Web $w)
{
    // start by finding the item id included in the URL
    $p = $w->pathMatch('id');
    // check to see if the id has been found
    if (empty($p['id'])) {
        // if no id found use the 'error' function to redirect the use to a safe page and display a message.
        $w->error('No id found for item', 'example');
    }
    // use the id to retrieve the item
    $item = $w->creaturetopia->getItemForId($p['id']);
    // check to see if the item was found
    if (empty($item)) {
        // no item found so let the user know
        $w->error('No item found for id', 'example');
    }
    // delete the item
    $item->delete();
    // redirect the user back to the item list with a message
    $w->msg('Item deleted', 'example');
}
