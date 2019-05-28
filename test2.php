<?
session_start();
if (isset($_GET['new_game'])) {
    unset($_SESSION['Tic_Tac_Toe']);
}
include_once "AI.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="?new_game">NEW GAME</a>
    <?



    $AI = new AI(3, 'cross');
    $AI->load_data_to_session();

    if (isset($_GET['i']) && isset($_GET['j'])) {
        if ($AI->check_winner() == '') {
            $AI->put_cross($_GET['i'], $_GET['j']);
            $AI->random_put_circle();
        }
    }

    $AI->show();

    if ($AI->check_winner() != '') {
        echo "Winner: " . $AI->check_winner();
    }
    $AI->save_data_to_session();
    ?>
</body>

</html>