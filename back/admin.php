<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $rows = $User->all();
            foreach ($rows as $row) {
                if ($row['acc'] != 'admin') {

            ?>
                    <tr>
                        <td><?= $row['acc']; ?></td>
                        <td><?= str_repeat("*", mb_strlen($row['pw'])); ?></td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>
            <?php

                }
            }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>

    <legend>會員新增</legend>
    <table style="width:100%">
        <tr>
            <td class="clo">帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">信箱</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="clean()">清除</button>
            </td>

        </tr>
    </table>

    <script>
        function reg() {
            let user = {
                acc: $("#acc").val(),
                pw: $("#pw").val(),
                pw2: $("#pw2").val(),
                email: $("#email").val()
            }

            if (user.acc != '', user.pw != '', user.pw2 != '', user.email != '') {
                if (user.pw == user.pw2) {
                    $.post("./api/chk_acc.php", {
                        acc: user.acc
                    }, (res) => {
                        if (parseInt(res) == 1) {
                            alert("帳號重複")
                        } else {
                            $.post("./api/reg.php", user, (res) => {

                                location.reload();
                            })
                        }
                    })
                } else {
                    alert("密碼錯誤")
                }
            } else {
                alert("不可空白")
            }

        }
    </script>

</fieldset>