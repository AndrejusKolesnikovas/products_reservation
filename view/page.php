<!DOCTYPE html>
<html>
<head>
    <title>Products reservations</title>
</head>
<body>
<header>
    <nav>
        <a href="#"> Products reservations</a>
    </nav>
</header>
<main>
    <h3>Reserve product</h3>
    <form action="/" method="POST">
        <div style="display: flex; flex-direction: column; width: 20vh">
            <input type="email" name="email" placeholder="test@test.lt" required/>
            <input type="text" name="quantity" placeholder="Quantity" required/>
            <input type="text" name="name" placeholder="Name" required/>
            <button type="submit">Submit</button>
        </div>
    </form>
</main>
</body>
</html>