<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Restaurants</title>
</head>

<body>
    <center>
        <h1>Food Restaurants</h1>
        <form action="insert.php" method="post">
        <p>
                <label for="item">Menu:</label>
                <select type="text" name="item" id="item">
                    <option value="pizza">Pizza</option>
                    <option value="burger">Burger</option>
                    <option value="nuggets">Nuggets</option>
                    <option value="biryani">Biryani</option>
                </select>
            </p>
           
        
            <p>
                <label for="orderdate">Order Date:</label>
                <input type="text" value="yyy-mm-dd" name="orderdate" id="orderdate">
            </p>

          
            <p>
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" id="quantity">
            </p>


            <input type="submit" value="Submit">
        </form>
    </center>
</body>

</html>