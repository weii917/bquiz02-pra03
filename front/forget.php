<fieldset style="width: 50%;margin:auto">
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="result"></div>
    <div><button onclick="forget()">尋找</button></div>

</fieldset>
<script>
    function forget() {
        email = $("#email").val();
        $.post("./api/forget.php", {
            email
        }, (res) => {
            $("#result").text(res);
        })
    }
</script>