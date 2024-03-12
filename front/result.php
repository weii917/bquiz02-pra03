<fieldset>
    <?php
    $que = $Que->find($_GET['id']);
    ?>
    <legend>目前位置:首頁 > 問卷調查 > <?= $que['text']; ?></legend>
    <h4><?= $que['text']; ?></h4>



    <?php
    $opts = $Que->all(['subject_id' => $_GET['id']]);
    foreach ($opts as $idx => $opt) {
        $total = ($que['vote'] != 0) ? $que['vote'] : 1;
        $rate = round($opt['vote'] / $total, 2);
    ?>
        <div style="display:flex">
            <div style="width:50%;"><?= ($idx + 1) . ". " . $opt['text']; ?></div>
            <div style="width:<?= $rate * 40; ?>%;height:20px;background-color:#ccc"></div>
            <div style="width:10%;"><?= $opt['vote']; ?>票(<?= $rate * 100; ?>%)</div>
        </div>



    <?php
    }
    ?>
    <div class="ct">
        <input type="button" value="返回" onclick="location.href='?do=que'">
    </div>

</fieldset>