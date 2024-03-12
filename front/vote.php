<fieldset>
    <?php
    $que = $Que->find($_GET['id']);
    ?>
    <legend>目前位置:首頁 > 問卷調查 > <?= $que['text']; ?></legend>
    <h4><?= $que['text']; ?></h4>
    <form action="./api/vote.php" method="post">


        <?php
        $opts = $Que->all(['subject_id' => $_GET['id']]);
        foreach ($opts as $idx => $opt) {
        ?>
            <div>
                <input type="radio" name="opt" value="<?= $opt['id']; ?>">
                <?= $opt['text']; ?>
            </div>

        <?php
        }
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>