<?php 

class CommentController
{
    public static function save($comment)
    {
        try
        {
            DB::insert('comments', Article::INDEXES, $comment->get_values());
        }
        catch (Exception $e)
        {
            return $e;
        }
    }
}