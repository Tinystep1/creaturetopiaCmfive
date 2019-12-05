<?php

class creaturetopiaService extends DbService {

// returns all example item instances
public function GetAllPetinfo() {
return $this->GetObjects('creaturetopiaPetinfo',['is_deleted'=>0]);
}

// returns a single example item matching the given id
public function GetPetinfoForId($id) {
return $this->GetObject('creaturetopiaPetinfo',$id);
}

}