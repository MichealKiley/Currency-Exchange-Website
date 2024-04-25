<!DOCTYPE html>
<html>

<body>
    <header>
        <h1>Money Converter</h1>
    </header>
    <div class="container">
        <form action="Handlers/Currency_handler.php" method="post">
            <select name="chosen_currency" id="Currency_type">
                <option value="riel">Riel</option>
                <option value="kyat">Kyat</option>
                <option value="krones">Krones</option>
                <option value="lek">Lek</option>
            </select><br>
            <input type="text" id="amount" name="amount_of_currency">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>