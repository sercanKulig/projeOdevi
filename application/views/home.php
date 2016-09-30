<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

</head>
<body>

    <h4>Liste</h4>
    <table cellpadding="2" cellspacing="2" border="1">
        <tr>
            <th>name</th>
            <th>price</th>
            <th>description</th>
            <th>calories</th>
        </tr>
        <?php
            foreach ($breakfastList->result() as $item){
               echo "<tr>
                        <td>".$item->name."</td>
                        <td>".$item->price."</td>
                        <td>".$item->description."</td>
                        <td class='calories'>".$item->calories."</td>
                    </tr>
            ";
            };
        ?>
    </table>
    <?php
    echo "<div class='sum'></div>";
    echo $this->pagination->create_links();
    ?>

    <script>
        $(document).ready(function(){
            var sum = 0;
            $('td.calories').each(function (){
                sum += parseInt( $(this).html());
            });
            $(".sum").html(sum);
        });
    </script>

</body>
</html>