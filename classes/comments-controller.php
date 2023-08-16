<?php

    class CommentsController extends Comments {


        public function addNewComment($postid, $username, $comment) {
            $this->addComment($postid, $username, $comment);
        }

        public function showAllCurrentComments($postid) {
            return $this->showAllComments($postid);
        }
    }