<?php
require_once("./models/item.php");
/**
 *this command will be used to update item status to finish once it's time finish.
 *
 */
class UpdateStatusCommand
{
    private $item ;
    /**init function
     */
    public function init()
    {
        $this->item = new Item();
    }
    /**
     *@return error code
     */
    public function run()
    {
        $isThereMoreRecord = true; 
        $start = 0 ;
        $limit = 100;
        while($isThereMoreRecord)
        {
            $criteria=new CDbCriteria;
            $criteria->condition = time() .  ' >  item_date_created + (item_total_time * 24 * 60 * 60) AND status = "active"';
            $criteria->limit  = $limit;
            $criteria->offset = $start; 
            $result = $this->item->findAll($criteria);
            if(count($result) == 0)
                $isThereMoreRecord = false;
            foreach($result as $item)
            {
                $item->status = "finish";
                $item->save();
            }
            $start += $limit; 
        }
    }
}
