<?php

/* 
User input as follows:
* register {username} {password}
* login {username} {password}
* ask {title} {body}
* answer {questionId} {body}
* comment {answerId} {body}
*/

require_once 'Forum.php';
require_once 'Author/User.php';
require_once 'Content/Question.php';
require_once 'Content/Answer.php';

$forum = new Forum();
$forum->start();