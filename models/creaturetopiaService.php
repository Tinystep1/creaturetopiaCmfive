<?php

class creaturetopiaService extends DbService {

// returns all example animal instances
public function GetAllPetinfo() {
return $this->GetObjects('creaturetopiaPetinfo',['is_deleted'=>0]);
}

// returns a single example aniaml matching the given id
public function GetPetinfoForId($id) {
return $this->GetObject('creaturetopiaPetinfo',$id);
}

// returns all example item instances
public function GetAllItems() {
    return $this->GetObjects('creaturetopiaItem',['is_deleted'=>0]);
    }
    
    // returns a single example item matching the given id
    public function GetItemForId($id) {
    return $this->GetObject('creaturetopiaItem',$id);
    }

    public function GetItemLinksForInfoId($petinfo_id) {
        return $this->GetObjects('creaturetopiaItemLink',['is_deleted'=>0,'info_id'=>$petinfo_id]);
    }

    public function getAllItemsForInfoId($petinfo_id) {
        $links = $this->GetItemLinksForInfoId($petinfo_id);
        $results = [];
        if (!empty($links)) {
            foreach ($links as $link) {
                $results[] = $this->GetItemForId($link->item_id);
            }
        }
        return $results;
    }

    public function getItemLinkForInfoIdAndItemId($petinfo_id, $item_id){
        return $this->GetObject('creaturetopiaItemLink',['is_deleted'=>0,'info_id'=>$petinfo_id, 'item_id'=>$item_id]);
    }

public function navigation(Web $w, $title = null, $prenav=null) {
    if ($title) {
        $w->ctx("title",$title);
    }
    $nav = $prenav ? $prenav : array();
    if ($w->Auth->loggedIn()) {
        $w->menuLink("creaturetopia","Pet Info", $nav);
        $w->menuLink("creaturetopia-item/index","Items", $nav);
        
    }
    $w->ctx("navigation", $nav);
    return $nav;
}

}