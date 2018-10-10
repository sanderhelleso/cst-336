
<html>
    <body>
        <h1>Custom Password Generator</h1>
        <form action="inc/generatePasswords.php" method="post">
            How many passwords? <input type="number" name="amount"/> (No more than 8)
            
            <h3>Password Length</h3>
            <input type="radio" name="length" value="6" /> 6 characters
            <input type="radio" name="length" value="8" /> 8 characters
            <input type="radio" name="length" value="10" /> 10 characters
            <br>
            <br>
            <input type="checkbox" name="digits"/>Include digits (up to 3 digits will be part of password)
            <br>
            <br>
            <input type="submit" value="Create Passwords!"/>
            <br>
            <br>
            <input type="submit" value="Create Password History"/>
        </form>
    </body>
</html>