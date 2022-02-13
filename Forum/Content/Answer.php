<?php
namespace Content;

use Author\User;

class Answer
{
    const BODY_MIN_LENGTH = 10;

    private static $lastId;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $body;

    /**
     * @var User
     */
    private $author;

    /**
     * @var Question
     */
    private $question;

    /**
     * @var Answer
     */
    private $answer;

    /**
     * @var Answer[]
     */
    private $comments = [];

    public function __construct(string $body, User $author, Question $question, Answer $answer = null)
    {
        $this->setBody($body);
        $this->setAuthor($author);
        $this->setQuestion($question);
        $this->setAnswer($answer);
        $this->id = ++self::$lastId;
    }


    public function setBody (string $body)
    {
        if (strlen($body) < self::BODY_MIN_LENGTH) {
            throw new \Exception("Body too short");
        }

        $this->body = $body;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setAuthor(User $author)
    {
        $this->author = $author;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setQuestion(Question $question)
    {
        $this->question = $question;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setAnswer(Answer $answer = null)
    {
        $this->answer = $answer;
    }

    public function getAnswer(): Answer
    {
        return $this->answer;
    }

    public function comment (Answer $answer)
    {
        $this->comments[] = $answer;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getId()
    {
        return $this->id;
    }

}

?>