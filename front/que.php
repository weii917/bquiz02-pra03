<fieldset>
    <legend>目前位置: 首頁 > 問卷調查</legend>
    <table style="text-align: center;">
        <tr>
            <th style="width:10%">編號</th>
            <th style="width:60%">問卷題目</th>
            <th style="width:10%">投票總數</th>
            <th style="width:10%">結果</th>
            <th style="width:10%">狀態</th>
        </tr>
        <?php
        $ques = $Que->all(['subject_id' => 0]);
        foreach ($ques as $idx => $que) {
        ?>
            <tr>
                <td><?= $idx + 1; ?></td>
                <td style="text-align: left;"><?= $que['text']; ?></td>
                <td><?= $que['vote']; ?></td>
                <td>
                    <a href="?do=result&id=<?= $que['id']; ?>">結果</a>
                </td>
                <td>
                    <?php
                    if (!isset($_SESSION['user'])) {
                    ?>
                        <span>請先登入</span>
                    <?php
                    } else {
                    ?>
                        <a href="?do=vote&id=<?= $que['id']; ?>">參與投票</a>

                    <?php

                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>