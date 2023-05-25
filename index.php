<?php
require_once './elements/checkInput.php';
require_once './elements/callMethod.php';

?>

<!DOCTYPE php>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($title)) :  ?>
            <?php echo $title; ?>
        <?php else :  ?>
            Convertisseur
        <?php endif  ?>
    </title>
    <meta name="description" content="Description des compétences de Sylvain Beggiora, du parcours professionnel de beggiora sylvain et des diplomes de beggiora Sylvain">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/ecran8.css">
    <link rel="stylesheet" href="./css/ecran5.css">
    <link rel="stylesheet" href="./css/animation.css">
    <link rel="shortcut icon" href="./image/fav.jpeg">
</head>

<body>
    <section id="convertisseur">
        <div class="container">
            <form action="index.php" method="POST">
                <label for="from">Devise de départ :</label><br>
                <select name="from" id="from"><br>
                    <option value=""></option>
                    <?php foreach ($dev['devise'] as $key => $value) : ?>
                        <option value="<?= $key ?>"><?= $key ?> - <?= $value ?></option>
                    <?php endforeach; ?>
                </select><br>
                <?php if ($fromError) : ?>
                    <h4 class="error"><?= $fromError ?></h4>
                <?php endif ?>

                <label for="to">Devise d'arrivée :</label><br>
                <select name="to" id="to"><br>
                    <option value=""></option>
                    <?php foreach ($cur as $key => $value) : ?>
                        <option value="<?= $key ?>"><?= $key ?> - <?= $value ?></option>
                    <?php endforeach; ?>
                </select><br>
                <?php if ($toError) : ?>
                    <h4 class="error"><?= $toError ?></h4>
                <?php endif ?>

                <label for="amt">Montant :</label><br>
                <input type="integer" name="amt" id="amt"><br>
                <button type="submit" class="btnConvert">Convertir</button>
            </form>
            <?php if (isset($convert)) : ?>
                <h4>Le :<?= $convert["date"] ?></h4>
                <p><?= $convert["amount"] ?> <?= $convert["name"] ?></p>
                <p>a pour valeur</p>
                <p><?= $convert["rates"] ?> <?= $convert["name_to"] ?></p>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>