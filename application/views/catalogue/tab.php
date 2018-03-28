<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/datatables.min.js"></script>
<table id="table">
    <thead>
    <tr>
        <th>sku</th>
        <?php foreach($catalogue["store"] as $key => $val):?>

            <th><?php echo $key ?></th>

        <?php endforeach ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach($catalogue["product"] as $line => $val):?>
        <tr>

            <td><?php  echo ($line) ?></td>
            <?php foreach($catalogue["store"] as $key => $valStore){
                if(count($val[$key]) == 0 || $val[$key]["prix"] == 0){
                    echo "<td></td>";

                }else{

                    echo "<td>".floatval($val[$key]["prix"])."€</td>";
                }
            }

            ?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script>
    $('#table').DataTable({
     responsive:true,
        "columns": [
            { "type": "html" },
            <?php for($p = 1; $p <= count($catalogue["store"]);$p++){
            echo '{ "type": "num-fmt" },';
        }
            ?>
        ],
    });
</script>