<div>目前位置：首頁 > 分類網誌 > <span id="navtag">健康新知</span></div>
<div style="display: flex;">
    <fieldset style="width: 20%;">
        <legend>分類項目</legend>
        <a><div class="tag" data-type="1">健康新知</div></a>
        <a><div class="tag" data-type="2">菸害防治</div></a>
        <a><div class="tag" data-type="3">癌症防治</div></a>
        <a><div class="tag" data-type="4">慢性病防治</div></a>
    </fieldset>
    <fieldset style="width: 70%;">
        <legend>文章列表</legend>
        <div id="newslist"></div>
        <div id="news" style="display: none;"></div>
    </fieldset>
</div>

<script>
    // 預設先顯示第一分類的文章列表
    getlist(1);
    $('.tag').on("click",function(){
        let navtag=$(this).text();
        $('#navtag').text(navtag);
        // 取得這分類的數字↓↓↓
        let type=$(this).data('type');
        // 使用分類數字取得該分類的文章列表
        getlist(type);
    })

    // 得到文章列表
    function getlist(type){
        $.get("api/getlist.php",{type},(list)=>{
            // 取得後在該id填入內容
            $('#newslist').html(list);
            // 所有的文章隱藏
            $('#news').hide();
            // 文章列表顯示
            $('#newslist').show();
        })
    }

    // 得到文章內容
    function getnews(id){
        $.get("api/getnews.php",{id},(news)=>{
            $('#news').html(news);
            $('#newslist').hide();
            $('#news').show();
        })
    }

</script>