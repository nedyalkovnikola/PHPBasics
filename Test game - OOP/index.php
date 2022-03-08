<?php
declare(strict_types=1);

/* 
A small game where two players fight with each other.
- The players have life and attack.
- Each attack will draw a corresponding amount of life.
- Game is over when one of the players drops to 0 or less health 
*/

require_once 'Player.php';
require_once 'Game.php';
?>

<form>
    Player One: <input type="text" name="player_one_name"><br/>
    Player Two: <input type="text" name="player_two_name"><br/>
    <input type="submit" name="start" value="Start Battle">
</form>

<?php
    if(isset($_GET['start'])) {
        $nameOne = $_GET['player_one_name'];
        $nameTwo = $_GET['player_two_name'];

        $player1 = new Player($nameOne);
        $player2 = new Player($nameTwo);

        $battle = new Game($player1, $player2);
        $battle->start();

        if ($battle->getResult() === null) {
            echo "DRAW BATTLE";
        } else {
            echo "THE WINNER IS: " . $battle->getResult()->getName();
        }
    }
?>