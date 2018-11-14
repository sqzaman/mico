<?php
global $base_url, $language;
?>
<div id="reservation-container">
    <h4>Total Records:<?php echo count($reservations);?></h4>
    <a href="<?php echo $base_url. "/mico/reservations/export-csv"?>" target="_blank" class="btn btn-primary">Export CSV</a>
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Country</th>
            <th>Amount of token</th>
            <th>Reservation code</th>
            <th>Reservation time</th>
            <th>Confirmation time</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 0;
$total_reserved_token = 0;
        foreach ($reservations as $reservation):?>
            <tr>
                <td scope="row"><?php echo ++$counter; ?></td>
                <td><?php echo $reservation->user_name; ?></td>
                <td><?php echo $reservation->user_email; ?></td>
                <td><?php echo $reservation->phone_number; ?></td>
                <td><?php echo $reservation->country; ?></td>
                <td><?php echo $reservation->total_token_amount; ?></td>
                <td><?php echo $reservation->reservation_code; ?></td>
                <td><?php echo $reservation->reservation_time; ?></td>
                <td><?php echo $reservation->confirmation_time; ?></td>
            </tr>
            <?php $total_reserved_token += $reservation->token_amount; ?>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <td ></td>
        <td></td>
        <td><b>Total token reserved: </b></td>
        <td><b><?php echo $total_reserved_token; ?></b></td>
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