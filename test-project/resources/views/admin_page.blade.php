<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hi</h1>
    <?php print_r($users); ?>

    <form action="/admin_maker" method="post">
    @csrf  <input type="text" name="hihi" id="hiid" value="" placeholder="hihi">
    <input type="submit" value="hihi" name="btn">
</form>

</body>

</html>