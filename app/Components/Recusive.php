<?php

namespace App\Components;

class Recusive {
    private $htmlselect = '';
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($id = 0, $text = '')
    {

        foreach($this->data as $value) {
            if($id == $value['parent_id']){
                $this->htmlselect.=  "<option value='". $value['id'] . "'>" . $text . $value['name'] . "</option>";
                $this->categoryRecusive($value['id'], $text. '-');
            }
        }
        // return view('category.create');
        return $this->htmlselect;
    }
}