<fieldset>
    <legend>新增文章</legend>
    <form action="./api/add_news.php" method="post">
        <div>
            <label for="">文章標題<input type="text" name="title"></label>
        </div>
        <div>
            <label for="type">文章分類
                <select name="type" id="type">
                    <option value="1">健康新知 </option>
                    <option value="2">菸害防治</option>
                    <option value="3">癌症防治</option>
                    <option value="4">慢性病防治</option>
                </select>
            </label>
        </div>
        <div style="display: flex;align-items:center;">
            <label for="text">文章內容</label>
            <textarea name="text" id="text" cols="60" rows="15"></textarea>
        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</fieldset>