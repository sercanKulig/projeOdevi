<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #masterSum{
            position: absolute;
            top: 10%;
            left: 5%;
            text-align: center;
        }
        #responsecontainer{
            position: absolute;
            top: 15%;
            left: 9%;
            text-align: center;
        }
    </style>

</head>
<body>
    <div class="container">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th></th>
                    <th>name</th>
                    <th>price</th>
                    <th>description</th>
                    <th>calories</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($breakfastList->result() as $item){
               echo "<tr>
                <td><input type='checkbox' class='chk' value='$item->id'></td>
                <td>".$item->name."</td>
                <td>".$item->price."</td>
                <td>".$item->description."</td>
                <td class='calories'>".$item->calories."</td>
                </tr>";
            };
        ?>
            </tbody>
        </table>
    <?php
    echo "<div id='masterSum'>Toplam Calori Değeri<br><div id='sum' class='bg-success text-warning'></div></div>";
    echo $this->pagination->create_links();
    echo "<div id='responsecontainer' align='center'>0</div>";
    ?>
    </div>
    <script>
        $(document).on('change', '.chk', function() {
            if(this.checked) {
                getResult("add", this.value);
            }else{
                getResult("subtract", this.value);
            }
        });

        function getResult(type, id){
            $.ajax({
                    url:'ajax',
                    type:'POST',
                    data:{"id":id},
                    success:function (response){
                    var result =  parseInt($("#responsecontainer").html());
                    if(type === "add"){
                        result += parseInt(response);
                    }
                    if(type ==="subtract"){
                        result -= parseInt(response);
                    }
                        $("#responsecontainer").html(result)
                 }
            });
        }
        /*
        $(document).ready(function(){
            var sum = 0;
            $('td.calories').each(function (){
                sum += parseInt( $(this).html());
            });
            $("#sum").html(sum);
        });
        */
    </script>

</body>
</html>