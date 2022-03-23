<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號:</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼:</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button>
                <button onclick="reset()">清除</button>
            </td>
            <td>
                <a href="?do=forget">忘記密碼</a>|
                <a href="?do=reg">尚末註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reset() {
        $('#acc', '#pw').val("");
    }

    function login() {
        let user = {
            acc: $('#acc').val(),
            pw: $('#pw').val()
        }
        $.post("api/chk_acc.php", {
            acc: user.acc
        }, (chk) => {
            if (parseInt(chk) == 0) {
                alert("查無此帳號");
                reset();
            } else {
                $.post("api/chk_pw.php", user, (chk) => {
                    if(parseInt(chk)==0){
                        alert("密碼錯誤");
                        reset();
                    }else{
                        if(user.acc=='admin'){
                            location.href='back.php';
                        }else{
                            location.href='index.php';
                        }
                    }
                })
            }
        })
    }
</script>