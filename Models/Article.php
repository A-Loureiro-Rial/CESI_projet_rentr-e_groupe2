<?php

class article
{
    public $a_id;
    public $a_title;
    public $a_content;
    public $a_views;
    public $a_likes;
    public $a_dislikes;
    public $a_author;
    public $a_status;
    public $a_created_at;
    public $a_updated_at;

    public function __construct($table)
    {
        foreach($table as $column => $value)
        {
            {
                if (property_exists($this, $column) && !in_array($column,['a_id', 'a_views', 'a_likes', 'a_dislikes', 'a_created_at', 'a_updated_at']));
                {
                    $this->$column = $value;
                }
            }
        }
        $this->a_views = 0;
        $this->a_likes = 0;
        $this->a_dislikes = 0;
//        $this->a_created_at
//        $this->a_updated_at
    }
}