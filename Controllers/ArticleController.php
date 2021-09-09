<?php
require('../Models/Article.php');
require('DB.php');

class ArticleController
{
    public static function save($article)
    {
        try
        {
            DB::insert('articles', Article::INDEXES, $article->get_values);
        }
        catch (Exception $e)
        {
            return $e;
        }
    }

    public static function add_one($article, $index)
    {
        try
        {
            if (property_exists(Article::class, $index))
            {
                if (gettype($article->$index != 'int'))
                {
                    throw new Exception('invalid index');
                }
                DB::update('articles', [$index], $article->$index + 1, 'WHERE a_id=' . $article->a_id);
            }
            else
            {
                throw new Exception('invalid index');
            }
        }
        catch (Exception $e)
        {
            return $e;
        }
    }

    public static function update($article, $modify)
    {
        try
        {
            $indexes = [];
            $values = [];
            foreach ($modify as $key => $value)
            {
                if (property_exists(Article::class, $key))
                {
                    $indexes[] = $key;
                    $values[] = htmlspecialchars(strip_tags(trim($value)));
                }
                else
                {
                    throw new Exception('Invalid property');
                }
            }
            DB::update('articles', $indexes, $values, 'WHERE a_id=' . $article->a_id);    
        }
        catch (Exception $e)
        {
            return $e;
        }
    }

    public static function delete($article)
    {
        try
        {
            DB::delete('articles', 'a_id=' . $article->a_id);
        }
        catch (Exception $e)
        {
            return $e;
        }
    }
}