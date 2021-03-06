<?php

class ArticleController
{
    public static function save($article)
    {
        try
        {
            DB::insert('articles', Article::INDEXES, $article->get_values());
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
                DB::update('articles', [$index], [$article->$index + 1], 'WHERE a_id=' . $article->a_id);
                $article->a_views++;
            }
            else
            {
                throw new Exception('invalid index');
            }
        }
        catch (Exception $e)
        {
            echo $e;
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
                if (property_exists(Article::class, $key) && !in_array($key, Article::DEFAULT))
                {
                    $indexes[] = $key;
                    $values[] = htmlspecialchars(strip_tags(trim($value)));
                }
                else
                {
                    throw new Exception('Invalid property');
                }
            }
            $indexes[] = 'a_updated_at';
            $values[] = date("Y-m-d H:i:s");
            DB::update('articles', $indexes, $values, 'WHERE a_id=' . $article->a_id);    
        }
        catch (Exception $e)
        {
            echo $e;
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