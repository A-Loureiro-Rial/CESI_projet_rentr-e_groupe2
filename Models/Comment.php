<?php
require './Article.php';

class Comment
{
    public const INDEXES = ['c_author', 'c_content', 'c_article', 'c_likes', 'c_dislikes', 'c_created_at', 'c_updated_at'];
    public const DEFAULT = ['c_id', 'c_likes', 'c_dislikes', 'c_created_at', 'c_updated_at'];
    public $c_id;
    public $c_author;
    public $c_content;
    public $c_article;
    public $c_likes;
    public $c_dislikes;
    public $c_created_at;
    public $c_updated_at;

    public function __construct($table = null)
    {
        try
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
                $this->c_likes = 0;
                $this->c_dislikes = 0;
                $this->c_created_at = date("Y-m-d H:i:s");
                $this->c_updated_at = date("Y-m-d H:i:s");
                if (Article::findById($this->c_article) == NULL)
                {
                    throw new Exception('Invalid article for this comment');
                }
            }
        }
        catch (Exception $e)
        {
            return $e;
        }
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

    public static function fill($content)
    {
        $article = new self;
        foreach($content as $key => $value)
        {
            $article->$key = $value;
        }
        return $article;
    }

        public static function list($article)
        {
            try
            {
                $list = DB::select('comments', '*', "WHERE c_article=" . $article->a_id);
                $tab = [];
                foreach ($list as $comment)
                {
                    $tab [] = self::fill($comment);
                }
                return $tab;
            }
            catch (Exception $e)
            {
                return $e;
            }
        }
}