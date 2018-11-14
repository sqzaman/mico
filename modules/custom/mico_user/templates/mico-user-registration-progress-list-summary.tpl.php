<?php
global $base_url, $language;
?>
<div id="reservation-container">
    <!--<a href="<?php echo $base_url. "/mico/reservations/export-csv"?>" target="_blank" class="btn btn-primary">Export CSV</a>-->
    <h1>User registration summary</h1>
    <table id="example" class="table table-striped" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Total User</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 0;
        $total_user = 0;
        foreach ($rows as $row):?>
            <tr>
                <td scope="row"><?php echo ++$counter; ?></td>
                <td><?php echo $row->date ?></td>
                <td><?php $total_user += $row->total; echo $row->total; ?></td>

            </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
        <td ></td>
        <td><b>Total users: </b></td>
        <td><b><?php echo $total_user; ?></b></td>
        </tfoot>
    </table>

</div>

<style>
#reservation-container{
margin: 40px;
}
</style>