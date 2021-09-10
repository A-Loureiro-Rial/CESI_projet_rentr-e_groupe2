<?php
    require('../Controllers/DB.php');

class Article
{
    public const INDEXES = ['a_title', 'a_content', 'a_views', 'a_likes', 'a_dislikes', 'a_author', 'a_status'];
    public const DEFAULT = ['a_id', 'a_views', 'a_likes', 'a_dislikes', 'a_created_at', 'a_updated_at'];
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

    public function __construct($table = null)
    {
        if ($table != NULL)
        {
            foreach($table as $column => $value)
            {
                {
                    if (property_exists($this, $column) && !in_array($column, self::DEFAULT));
                    {
                        $this->$column =  htmlspecialchars(strip_tags(trim($value)));
                    }
                }
            }
            $this->a_views = 0;
            $this->a_likes = 0;
            $this->a_dislikes = 0;
            $this->a_created_at = date("Y-m-d H:i:s");
            $this->a_updated_at = date("Y-m-d H:i:s");    
        }
    }

    public static function fill($content)
    {
        $article = new self;
        foreach($content as $key => $value)
        {
            $article->$key = $value;
        }
        return $article;
    }

    public function get_values()
    {
        try
        {
            $values = [];
            foreach (self::INDEXES as $index)
            {
                $values[] = htmlspecialchars(strip_tags(trim($this->$index)));
            }
            return $values;
        }
        catch (Exception $e)
        {
            return $e;
        }
    }

    public static function list()
    {
        try
        {
            $list = DB::select('articles', '*');
            $tab = [];
            foreach ($list as $article)
            {
                $tab [] = self::fill($article);
            }
            return $tab;
        }
        catch (Exception $e)
        {
            return $e;
        }
    }

    public static function findLast()
    {
        try
        {
            $last = DB::select('articles', '*', "ORDER BY a_created_at DESC LIMIT 1");
            if (count($last) == 0)
            {
                throw new Exception('No article found');
            }
            else
            {
                return self::fill($last[0]);
            }
        }
        catch (Exception $e)
        {
            return $e;
        }
    }

    public static function findById($a_id)
    {
        $article = DB::select('articles', '*', 'WHERE a_id=' . $a_id);
        if (count($article) == 0)
        {
            return NULL;
        }
        else
        {
            $article = $article[0];
            return self::fill($article);
        }
    }
}