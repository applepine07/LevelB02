<fieldset>
    <legend>帳號管理</legend>
    <form action="api/del_user.php" method="post">
        <table class="ct" style="width:75%;margin:auto">
            <tr class="clo">
                <td>帳號</td>
                <td>密碼</td>
                <td style="width: 10%;">刪除</td>
            </tr>
            <?php
            $users = $User->all();
            foreach ($users as $key => $user) {
            ?>
                <tr>
                    <td><?=$user['acc'];?></td>
                    <td><?=str_repeat("*",mb_strlen($user['pw']));?></td>
                    <td><input type="checkbox" name="del[]" value="<?=$user['id'];?>"></td>
                </tr>
            <?php
            }
            ?>

        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
</fieldset>

    <h2>新增會員</h2>
    <div style="color:red">請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">註冊</button>
                <button onclick="reset()">清除</button>
            </td>
            <td>

            </td>
        </tr>
    </table>

<script>
    function reset() {
        $('#acc,#pw,#pw2,#email').val("");
    }

    function reg() {
        let form = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            pw2: $('#pw2').val(),
            email: $('#email').val(),
        }
        if (form.acc == '' || form.pw == '' || form.pw2 == '' || form.email == '') {
            alert("不得空白");
        } else {
            if (form.pw != form.pw2) {
                alert("密碼錯誤");
                reset();
            } else {
                $.post("api/chk_acc.php",{acc:form.acc},(chk)=>{
                    if(parseInt(chk)==1){
                        alert("帳號重覆");
                    }else{
                        delete form.pw2;
                        $.post("api/reg.php",form,(res)=>{
                            // alert(res);
                            alert("註冊成功"); 
                            location.reload();
                        })
                    }
                })
            }
        }
    }
</script>