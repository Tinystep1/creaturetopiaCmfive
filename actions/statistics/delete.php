<?php

function delete_ALL(Web $w) {

    // start by finding the statistic id included in the URL
    $p = $w->pathMatch('id');
    // check to see if the id has been found
    if (empty($p['id'])) {
        // if no id found use the 'error' function to redirect the use to a safe page and display a message.
        $w->error('No id found for statistic','example');
    }
    // use the id to retrieve the statistic
    $stats = $w->creaturetopia->getStatForId($p['id']);
    // check to see if the statistic was found
    if (empty($stats)) {
        // no statistic found so let the user know
        $w->error('No statistic found for id','example');
    }
    // delete the statistic
    $stats->delete();
    // redirect the user back to the statitics list with a message
    $w->msg('Statistic deleted','example');
}
