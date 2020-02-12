<?php

class creaturetopiaPetinfo extends DbObject {

    public $animal_name;
    public $description_of_animal;
    public $item_list;
    public $stat_list;
    

    function getItemList() {
        $items = $this->w->Creaturetopia->getAllItemsForInfoId($this->id);
        // check if it's empty
        $results = [];
        foreach($items as $item) {
            $results[] = $item->item_name;
        }
        return implode(", ", $results);
    }
}