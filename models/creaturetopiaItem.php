<?php

class creaturetopiaItem extends DbObject {

    public $item_name;
    public $item_description;
    public $stats_affected;
    


    function getSelectOptionTitle() {
        return $this->item_name;// . ' ' . $this->stats_affected; // only until all references are resolved
    }
}