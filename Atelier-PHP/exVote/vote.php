<?php
if(isset($_POST["envoyer"])){
    if(!isset($_COOKIE['hasVoted']) && !isset($_COOKIE['voteContent']))
    {
        $voteContent=$_POST['vote'];
        $expireTime=time() + 120;
        setcookie("voteContent",$voteContent,$expireTime);
        setcookie("hasVoted",1,$expireTime);
    }
    else
    {
        $voteContent=$_COOKIE['voteContent'];
        $hasVoted=$_COOKIE['hasVoted'];
        echo "<script>alert('vous avez deja voté $voteContent')</script>";
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vote</title>
    <!--        link bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">

    <h2>Votez</h2>
    <form action="" method="POST">
        <p>Que pensez-vous du service de ce restaurant ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vote" id="flexRadioDefault1" value="bon" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                    Bon
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vote" id="flexRadioDefault2"  value="moyen" >
            <label class="form-check-label" for="flexRadioDefault2">
                Moyen
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="vote" id="flexRadioDefault2"  value="mauvais">
            <label class="form-check-label" for="flexRadioDefault2">
                    Mauvais
            </label>
        </div>
        <button type="submit" class="btn btn-primary mt-4" name="envoyer">Envoyer le vote</button>

    </form>

</div>

</body>
</html>
