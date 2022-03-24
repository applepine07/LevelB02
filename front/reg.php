<fieldset>
    <legend>會員註冊</legend>
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
</fieldset>

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
        // ↓↓↓高級用法，如果物件中form表單value值，是空值的鍵值大於等於0，就代表有空值
        if(Object.values(form).indexOf('')>=0){
        // if (form.acc == '' || form.pw == '' || form.pw2 == '' || form.email == '') {
            alert("不得空白");
        } else {
            if (form.pw != form.pw2) {
                alert("密碼錯誤");
                reset();
            } else {
                // 如果2密碼驗證沒錯就驗證帳號是否已存在
                $.post("api/chk_acc.php",{acc:form.acc},(chk)=>{
                    if(parseInt(chk)==1){
                        alert("帳號重覆");
                    }else{
                        // 帳號沒重覆就讓他註冊，先刪掉資料表中沒有的pw2，方便作業
                        delete form.pw2;
                        // 注意以下的form不要打成{form}
                        $.post("api/reg.php",form,(res)=>{
                            // ↓↓↓後端傳回res我們前端用alert表現，檢查用而已
                            // alert(res);
                            alert("註冊成功");
                            location.href='?do=login';
                        })
                    }
                })
            }
        }
    }
</script>