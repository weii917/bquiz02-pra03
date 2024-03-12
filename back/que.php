<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">

        <div>
            <label class="clo">問卷名稱</label>
            <input type="text" name="subject" id="">
        </div>
        <div class="clo" id="opt">
            選項<input type="text" name="option[]" id="">
            <input type="button" value="更多" onclick="more()">
        </div>
        <div>
            <input type="submit" value="新增"><input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more() {
        let opt = ` <div class="clo" >
        選項<input type="text" name="option[]">
    </div>`

        $("#opt").before(opt)
    }
</script>