<?php
namespace Author;

use Content\Question;
use Content\Answer;


class User 
{
    private static $lastId;

    private $id;
    private $username;
    private $password;

    /**
     * @var Question []
     */
    private $questions = [];

    /**
     * @var Answer []
     */
    private $answers = [];

    /**
     * @var Answer []
     */
    private $comments = [];

    public function __construct(string $username, string $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->id = ++self::$lastId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        if (!preg_match("/[0-9]+/", $password)) {
            throw new \Exception("Password should contain numbers");
        }

        if (!preg_match("/[a-z]+/", $password)) {
            throw new \Exception("Password should contain letters");
        }

        $this->password = $password;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function askQuestion (Question $question)
    {
        $this->questions[] = $question;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function answer (Question $question, Answer $answer)
    {
        $this->answers[] = $answer;
        $question->answer($answer);
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function comment (Answer $comment, Answer $answer)
    {
        $this->comments[] = $comment;
        $answer->comment($comment);

    }

}