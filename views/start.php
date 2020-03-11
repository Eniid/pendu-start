<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_TITLE ?></title>
</head>
<body>
<div>
    <h1>Trouve le mot en moins de <?= MAX_TRIALS ?> coups !</h1>
</div>
<div>
    <p>Le mot à deviner compte <?= $_SESSION['count'] ?> lettres&nbsp;: <?= $_SESSION['remplacement'] ?></p>
</div>
<div>
    <img src="images/pendu0.gif"
        alt="">
</div>
<div>
    <p>Voici les lettres que tu as déjà essayées&nbsp;: <?= $_SESSION['used_letters'] ?></p>

</div>
    <form action="index.php"method="post">
        <fieldset>
            <legend>Il te reste <?= $_SESSION['remain_trials'] ?> essais pour sauver ta peau
            </legend>
            <div>
                <label for="triedLetter">Choisis ta lettre</label>
                <select name="triedLetter"
                        id="triedLetter">
                                            <?php
                                                foreach ($_SESSION['letters'] as $letter => $val):
                                            ?>
                                                <?php if($val): ?>
                                                <option value="<?= $letter ?>">
                                                    <?= $letter ?>
                                                </option>
                                                <?php endif; ?>
                                            <?php
                                                endforeach; ?>
                                            ?>
                                        </select>
                <input type="submit"
                    value="essayer cette lettre">
            </div>
        </fieldset>
    </form>
</body>
</html>