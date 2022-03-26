<style>
    /* switch hover效果非必要 */
    .switch:hover {
        background-color: yellowgreen;
        cursor: pointer;
    }

    .pop {
        width: 300px;
        height: 300px;
        color: #fff;
        background: rgba(51, 51, 51, 0.8);
        overflow: auto;
        position: absolute;
        display: none;
    }
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td style="width:30%">標題</td>
            <td style="width:50%">內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $tarray = [
            "1" => "健康新知",
            "2" => "菸害防治",
            "3" => "癌症防治",
            "4" => "慢性病防治"
        ];

        $div = 5;
        $all = $News->math('count', '*', ['sh' => 1]);
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        $rows = $News->all(['sh' => 1], " ORDER BY `good` desc limit $start,$div");
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td class="switch"><?= $row['title']; ?></td>
                <td class="switch">
                    <div class="short"><?= mb_substr($row['text'], 0, 20); ?>...</div>
                    <div class="pop">
                        <h2 style="color: skyblue;"><?= $tarray[$row['type']]; ?></h2><?= nl2br($row['text']); ?>
                    </div>
                </td>
                <td>
                    <span><?= $row['good']; ?>個人說</span><img src="./icon/02B03.jpg" style="width:25px">
                    -<?php
                        if (isset($_SESSION['login'])) {
                            $chk = $Log->math('count', '*', ['news' => $row['id'], 'user' => $_SESSION['login']]);
                            if ($chk > 0) {
                                echo "<a class='g' data-news='{$row['id']}' data-type='1'>收回讚</a>";
                            } else {
                                echo "<a class='g' data-news='{$row['id']}' data-type='2'>讚</a>";
                            }
                        }
                        ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if (($now - 1) > 0) {
            $prev = $now - 1;
            echo "<a href='?do=pop&p=$prev'> ";
            echo " < ";
            echo " </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? "22px" : "16px";
            echo "<a href='?do=pop&p=$i' style='font-size:$fontsize'> ";
            echo $i;
            echo " </a>";
        }

        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=pop&p=$next'> ";
            echo " > ";
            echo " </a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $('.switch').hover(function() {
        $(this).parent().find(".pop").toggle();
    })

    $('.g').on('click', function() {
        let type = $(this).data('type');
        let news = $(this).data('news');
        $.post("api/good.php", {
            type,
            news
        }, () => {
            location.reload();
        })
    })
</script>