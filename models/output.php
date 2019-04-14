<!-- Author: Ariel Contreras -->
<!-- Display package entry details from DB -->
<html>
    <head>
        <title>SQL Query Results</title>
    </head>
    <body>
        <table>
        <thead>
            <tr>
                <td>img url</td>
                <td>name</td>
                <td>description</td>
                <td>startdate</td>
                <td>enddate</td>
                <td>price</td>
            </tr>
        </thead>
        <tbody>
        <?php
        include 'connect.php';
        
        $query = "SELECT * FROM packages";
            $result=mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)){     
        ?>
                <tr>
                    <td><?php echo $row['PkgImgUrl']?></td>
                    <td><?php echo $row['PkgName']?></td>
                    <td><?php echo $row['PkgDesc']?></td>
                    <td><?php echo $row['PkgStartDate']?></td>
                    <td><?php echo $row['PkgEndDate']?></td>
                    <td><?php echo $row['PkgBasePrice']?></td>
                </tr>
        <?php
        }
        ?>
        </tbody>
        </table>
    </body>
</html>