<?php
global $base_url, $language;
?>
<div id="reservation-container">
    <h4>Total Records:<?php echo count($users);?></h4>
    <!--<a href="<?php echo $base_url. "/mico/reservations/export-csv"?>" target="_blank" class="btn btn-primary">Export CSV</a>-->
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registration Date</th>
            <th>Membership Status</th>
            <th>Last login</th>
            <th>Wallet</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 0;
        $total_reserved_token = 0;
        foreach ($users as $user):?>
            <tr>
                <td scope="row"><?php echo ++$counter; ?></td>
                <td><?php echo $user->field_first_name_value . " ". $user->field_last_name_value; ?></td>
                <td><?php echo $user->mail; ?></td>
                <td><?php echo date("Y-m-d H:i:s", $user->created); ?></td>
                <td>
                    <?php
                    $status = '';
                    $class = 'btn btn-warning';
                    if($user->status == 0){
                        $class = 'btn btn-info';
                        $status = "Waiting for buyer funds";
                    } else if($user->status == -1){
                        $class = 'btn btn-warning';
                        $status = "Cancelled / Timed Out";
                    } else if($user->status == 100){
                        $class = 'btn btn-success';
                        if (!isset($user->payment_transaction_id)){
                            $class =  'btn btn-primary';
                            $status = "Already Member [imported]";
                        } else {
                            $status = "Already Paid Member";
                        }
                    } else {
                        $class =  'btn btn-primary';
                        $status = "Didn't try to be member";
                    }


                    ?>
<span class="<?php echo $class; ?>"><?php echo $status; ?></span>
                </td>
                <td><?php echo !empty($user->login) ? date("Y-m-d H:i:s", $user->login) : "never"; ?></td>
                <td><?php echo substr($user->field_user_wallet_value, 0, 45); ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <td ></td>
        <td></td>
        <td><b>Total users: </b></td>
        <td><b><?php echo count($users); ?></b></td>
        <td></td>
        <td></td>
        <td></td>
        </tfoot>
    </table>

</div>

<style>
#reservation-container{
margin: 40px;
}
</style>