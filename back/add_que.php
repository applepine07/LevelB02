<fieldset>
    <legend>新增問卷</legend>
    <form action="api/add_que.php" method="post">
        <div style="display: flex;">
            <div class="clo">問卷名稱</div>
            <div><input type="text" name="subject"></div>
        </div>
        <div class="clo" id="opt">
            <div>
                <input type="text" name="options[]">
                <input type="button" onclick="more()" value="更多">
            </div>
        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more(){
        let opt = `<div><input type="text" name="options[]"></div>`;
        $('#opt').prepend(opt);
    }
</script>