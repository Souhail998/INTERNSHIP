<div class="panel panel-default" id="refresh">
    <div class="panel-heading">
        <b>Defects List</b>
    </div>
    <div class="panel-body">
        <form id="form-filter" class="form-horizontal">
            <div class="row">
                <div class="col-md-3">
                  <label>Area:</label>
                  <?php echo $form_area; ?>
                </div>
                <div class="col-md-3">
                  <label>Cluster:</label>
                  <?php echo $form_cluster; ?>
                </div>
                <div class="col-md-3">
                    <label>Timeframe:</label>
                    <?php echo $form_timeframe; ?>
                </div>  
                <div class="col-md-3">
                    <label>Status:</label>
                    <?php echo $form_defect_status; ?>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-3" style="display: none;">
                    <label>FUP Start Date:</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="startdate" class="form-control" id="datepickerfilter1" placeholder ="dd/mm/yyyy"/>
                    </div>
                </div>
                <div class="col-md-3" style="display: none;">
                    <label>FUP End Date:</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="enddate" class="form-control" id="datepickerfilter2" placeholder ="dd/mm/yyyy"/>
                    </div>
                </div>
                <div class="col-sm-6 pull-right" style="text-align: right;">
                    <label>&nbsp;</label><br>
                    <button type="button" id="btn-filter" class="btn btn-primary" style="margin: 0 0px;">Filter</button>
                    <button type="button" id="btn-reset" class="btn btn-default" style="margin: 0 30px;">Reset</button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
    <table id="defect_view" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
                <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Subject</th>
                <th>Address1</th>
                <th>Cluster</th>
                <th>Assign to</th>
                <th>FUP-Date</th>
                <th>Timeframe</th>
                <!-- <th>Landlord</th> -->
                <th>Status</th>
                <th>Action</th>

                </tr>
            </thead>
            <tfoot>
                <th>ID</th>
                <th>Date</th>
                <th>Subject</th>
                <th>Address1</th>
                <th>Cluster</th>
                <th>Assign to</th>
                <th>FUP-Date</th>
                <th>Timeframe</th>
                <!-- <th>Landlord</th> -->
                <th>Status</th>
                <th>Action</th> 
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
  var defect_view_var;

$(document).ready(function() {

    defect_view_var = $('#defect_view').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Property/ajax_list_for_defects')?>",
            "type": "POST",
            "data": function ( data ) {
                data.area = $('#area').val();
                data.cluster = $('#cluster').val();
                data.timeframe = $('#timeframe').val();
                data.defect_status = $('#defect_status').val();
                data.startdate = $('#datepickerfilter1').val();
                data.enddate = $('#datepickerfilter2').val();
            }
        },
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0, 9 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        defect_view_var.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        // document.getElementById('form-filter').reset();
        // defect_view_var.ajax.reload();  //just reload table
        window.location.reload();
    });

});
</script>