<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="result"></div>
    <div><button onclick="find()">尋找</button></div>
</fieldset>

<script>
    function find(){
        $.post("api/find_pw.php",{email:$('#email').val()},(res)=>{
            $('#result').text(res);
        })
    }
    
</script>