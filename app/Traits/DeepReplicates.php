<?php 

trait DeepReplicates {
    public function replicate(){
        $copy = parent::replicate();
        $copy->push();

        foreach ($model->getRelations() as $relation => $entries){
            foreach($entries as $entry){
                $e = $entry->replicate();
                if ($e->push()){
                    $clone->{$relation}()->save($e);
                }
            }
        }
    }
}