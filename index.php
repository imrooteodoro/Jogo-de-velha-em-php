<!DOCTYPE html>
<html>
<head>
    <title>Jogo da Velha</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>


 <div class="container">  
    <br> <br>

 <img src="assets/img/ifto.png" width="100" height="100" style="background:white;padding-top:2rem;border-radius:20px 40px;"/>
<?php

$playerOne = '';
$playerTwo = '';
$player = 'x';
$board = '.........';
$winner = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerOne = $_POST['player1'];
    $playerTwo = $_POST['player2'];
    $currentPlayer = $_POST['currentPlayer'];
    $board = $_POST['board'];
    $position = $_POST['position'];

    if ($currentPlayer === 'x') {
        $player = 'o';
    } else {
        $player = 'x';
    }

    if ($board[$position] !== '.') {
        echo "<p>Posição ocupada, escolha outra posição.</p>";
    } else {
        $board[$position] = $currentPlayer;

        if (
            ($board[0] === 'x' && $board[1] === 'x' && $board[2] === 'x') ||
            ($board[3] === 'x' && $board[4] === 'x' && $board[5] === 'x') ||
            ($board[6] === 'x' && $board[7] === 'x' && $board[8] === 'x') ||
            ($board[0] === 'x' && $board[3] === 'x' && $board[6] === 'x') ||
            ($board[1] === 'x' && $board[4] === 'x' && $board[7] === 'x') ||
            ($board[2] === 'x' && $board[5] === 'x' && $board[8] === 'x') ||
            ($board[0] === 'x' && $board[4] === 'x' && $board[8] === 'x') ||
            ($board[2] === 'x' && $board[4] === 'x' && $board[6] === 'x')
        ) {
            $winner = 'x';
        }

        if (
            ($board[0] === 'o' && $board[1] === 'o' && $board[2] === 'o') ||
            ($board[3] === 'o' && $board[4] === 'o' && $board[5] === 'o') ||
            ($board[6] === 'o' && $board[7] === 'o' && $board[8] === 'o') ||
            ($board[0] === 'o' && $board[3] === 'o' && $board[6] === 'o') ||
            ($board[1] === 'o' && $board[4] === 'o' && $board[7] === 'o') ||
            ($board[2] === 'o' && $board[5] === 'o' && $board[8] === 'o') ||
            ($board[0] === 'o' && $board[4] === 'o' && $board[8] === 'o') ||
            ($board[2] === 'o' && $board[4] === 'o' && $board[6] === 'o')
        ) {
            $winner = 'o';
        }
    }
}

?>

<br> <br>

<h1>Jogo da Velha - Algoritmos e Laboratório de Programação.</h1>

<?php if ($winner !== null || strpos($board, '.') === false) : ?>

    <?php if ($winner === 'X') : ?>
        <h2>O vencedor é <?php echo $playerOne; ?>!</h2>
    <?php elseif ($winner === 'O') : ?>
        <h2>O vencedor é <?php echo $playerTwo; ?>!</h2>
    <?php else : ?>
        <h2>Venceu!</h2>
    <?php endif; ?>

    <button><a href="index.php">Jogar novamente</a></button>

<?php else : ?>

    <?php if ($player === 'x') : ?>
        <h2>Vez de <?php echo $playerOne; ?> <br> (x) <br> </h2>
        <br>
    <?php else : ?>
        <h2>Vez de <?php echo $playerTwo; ?> <br>  (o)</h2> <br>
    <?php endif; ?>
    <div class="formulario">  
    <form method="POST" action="index.php">
        <label for="player1">Nome do jogador 1:</label>
        <input type="text" name="player1" id="player1" value="<?php echo $playerOne; ?>" required><br>

        <label for="player2">Nome do jogador 2:</label>
        <input type="text" name="player2" id="player2" value="<?php echo $playerTwo; ?>" required><br>

        <input type="hidden" name="currentPlayer" value="<?php echo $player; ?>">
        <input type="hidden" name="board" value="<?php echo $board; ?>">  </div>

       <div class="card">  
         <table class="tabela">
            <tr>
                <td><button type="submit" name="position" value="0"><?php echo $board[0]; ?></button></td>
                <td><button type="submit" name="position" value="1"><?php echo $board[1]; ?></button></td>
                <td><button type="submit" name="position" value="2"><?php echo $board[2]; ?></button></td>
            </tr>
            <tr>
                <td><button type="submit" name="position" value="3"><?php echo $board[3]; ?></button></td>
                <td><button type="submit" name="position" value="4"><?php echo $board[4]; ?></button></td>
                <td><button type="submit" name="position" value="5"><?php echo $board[5]; ?></button></td>
            </tr>
            <tr>
                <td><button type="submit" name="position" value="6"><?php echo $board[6]; ?></button></td>
                <td><button type="submit" name="position" value="7"><?php echo $board[7]; ?></button></td>
                <td><button type="submit" name="position" value="8"><?php echo $board[8]; ?></button></td>
            </tr>
        </table>
    </form>
    </div>
    </div>


      <?php endif; ?>
 
</div>

</body>
</html>
