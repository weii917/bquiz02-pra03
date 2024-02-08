<fieldset>
    <legend>目前位置:首頁 > 最新文章區 </legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td></td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1], " limit $start,$div");
        foreach ($rows as $row) {
        ?>

            <tr>
                <td>
                    <div class='title' data-id="<?= $row['id']; ?>" style='cursor:pointer'><?= $row['title']; ?></div>
                </td>
                <td>
                    <div id="s<?= $row['id']; ?>">
                        <?= mb_substr($row['text'], 0, 25); ?>...
                    </div>
                    <div id="a<?= $row['id']; ?>" style='display:none'>
                        <?= $row['text']; ?>
                    </div>
                </td>
                <td>

                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $row['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo "<a href='Javascript:good({$row['id']})'>收回讚</a>";
                        } else {
                            echo "<a href='Javascript:good({$row['id']})'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php

        } ?>
    </table>

    <div>

        <?php

        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?do=news&p=$prev'>";
            echo "<";
            echo "</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($i == $now) ? 'font-size:22px' : 'font-size:16px';
            echo "<a href='?do=news&p=$i' style='$size'>";
            echo $i;
            echo "</a>";
        }
        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'>";
            echo ">";
            echo "</a>";
        }
        ?>
    </div>
</fieldset>

<script>
    //對class title進行點擊事件註冊   
    $(".title").on("click", (e) => {
        //取得點擊的id
        let id = $(e.target).data('id');
        //對id為s+id,a+id的元素進行toggle來切顯示與隱藏
        $(`#s${id},#a${id}`).toggle();

    })
</script>