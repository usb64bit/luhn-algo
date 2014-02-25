<?php
$numbers = '';

if(!empty($_POST['cardNumber']))
{
    require_once("luhn-algo.php");

    $luhn = new LuhnAlgorithm($_POST['cardNumber']);

    if($luhn->check())
        $numbers = "CORRECT!";
    else
        $numbers = $luhn->getAccountNumbers() . " did not work";

}
?>
<html>
    <head>
        <title>Luhn Algorithm Tester</title>
    </head>
    <body>
    <form method="POST">
    <input type="text" name="cardNumber" />
    <button type="submit">submit</button>
    </form>

    <p><?php echo $numbers; ?></p>
    </body>
</html>