<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container-fluid">
    <?php
    //Get the old XML file
    if (file_exists('old.xml')) {
        $oldxml = simplexml_load_file('old.xml');
        //Load all the old product IDs into an array
        $oldproductsarray = array();
        foreach ($oldxml->Product as $oldp) {
            $oldproductsarray[] = (int)$oldp->Id;
        }
    } else {
        echo "Old XML does not exist";
    }

    //Get the new xml file
    if (file_exists('new.xml')) {
        $newxml = simplexml_load_file('new.xml');

        //Load the new product IDs into an array
        $newproductsarray = array();
        foreach ($newxml->Product as $newprod) {
            $newproductsarray[] = (int)$newprod->Id;
        }
    } else {
        echo "New XML file does not exist";
    }
    ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Barcode</th>
            </tr>
            <?php
            //Loop though the old products
            foreach ($oldxml->Product as $oldproduct) {
                //Add the current product's id to $x
                $x = $oldproduct->Id;
                //Test to see if the current product's Id is the array of new products
                //if it is not then it must be out of stock
                if (!(in_array($x, $newproductsarray))) {
                    echo '<tr class="danger">';
                    echo '<td>Out of stock</td>';
                    echo '<td>' . $oldproduct->Name . '</td>';
                    echo '<td>' . $oldproduct->Barcode . '</td>';
                    echo '</tr>';
                }
            }
            unset($oldproduct);//End the loop
            //Loop through new products
            foreach ($newxml->Product as $newproduct) {
                //Add the current product's Id to $y
                $y = $newproduct->Id;
                //Test to see if the current product's Id is in the array of old products
                //if it is not it must be back in stock
                if (!(in_array($y, $oldproductsarray))) {
                    echo '<tr class="success">';
                    echo '<td>In stock</td>';
                    echo '<td>' . $newproduct->Name . '</td>';
                    echo '<td>' . $newproduct->Barcode . '</td>';
                    echo '</tr>';
                }
            }
            unset($newproduct);//End loop
            ?>
        </table>
    </div>
</div>
</body>
</html>
