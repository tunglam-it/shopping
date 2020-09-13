<?php
namespace App\Components;
use App\Menu;

class MenuRecursive{
    private $html='';
    public function __construct()
    {
        $this->html='';
    }

    public function menuRecursiveAdd($parent_id=0,$subMark=''){
        $data = Menu::where('parent_id',$parent_id)->get();
        foreach ($data as $data_item){
            $this->html .= "<option value=".$data_item->id.">".$data_item->name."</option>>";
            $this->menuRecursiveAdd($data_item->id,$subMark.'-');
        }
        return $this->html;
    }
    public function menuRecursiveEdit($parentIdEdit,$parent_id=0,$subMark=''){
        $data = Menu::where('parent_id',$parent_id)->get();
        foreach ($data as $data_item){
            if($parentIdEdit == $data_item->id){
                $this->html .= "<option selected value=".$data_item->id.">".$data_item->name."</option>>";
            }
            else{
                $this->html .= "<option value=".$data_item->id.">".$data_item->name."</option>>";
            }

            $this->menuRecursiveEdit($parentIdEdit,$data_item->id,$subMark.'-');
        }
        return $this->html;
    }
}
?>