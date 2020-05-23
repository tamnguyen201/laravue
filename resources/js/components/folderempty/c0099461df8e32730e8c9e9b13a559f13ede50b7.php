<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-check-circle-o"></i> <?php echo trans('roles::role.name'); ?> <small> <?php echo trans('app.manage'); ?> <?php echo trans('roles::role.names'); ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo guard_url('/'); ?>"><i class="fa fa-dashboard"></i> <?php echo trans('app.home'); ?> </a></li>
            <li class="active"><?php echo trans('roles::role.names'); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div id='roles-role-entry'>
    </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <li class="active"><a href="<?php echo guard_url('roles/role'); ?>"><?php echo trans('roles::role.names'); ?></a></li>
                    <li class=""><a href="<?php echo guard_url('roles/permission'); ?>"><?php echo trans('roles::permission.names'); ?></a></li>
                    
                    <li class="pull-right">
                    <span class="actions">

                    <?php echo $__env->make('roles::admin.role.partial.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('roles::admin.role.partial.column', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </span> 
                </li>
            </ul>
            <div class="tab-content">
                <table id="roles-role-list" class="table table-striped data-table">
                    <thead class="list_head">
                        <th style="text-align: right;" width="1%"><a class="btn-reset-filter" href="#Reset" style="display:none; color:#fff;"><i class="fa fa-filter"></i></a> <input type="checkbox" id="roles-role-check-all"></th>
                        <th><?php echo trans('roles::role.label.name'); ?></th>
                    <th><?php echo trans('roles::role.label.slug'); ?></th>
                    <th><?php echo trans('roles::role.label.level'); ?></th>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

var oTable;
var oSearch;
$(document).ready(function(){
    app.load('#roles-role-entry', '<?php echo guard_url('roles/role/0'); ?>');
    oTable = $('#roles-role-list').dataTable( {
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function (data, type, full, meta){
                return '<input type="checkbox" name="id[]" value="' + data.id + '">';
            }
        }], 
        
        "responsive" : true,
        "order": [[1, 'asc']],
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '<?php echo guard_url('roles/role'); ?>',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $.each(oSearch, function(key, val){
                aoData.push( { 'name' : key, 'value' : val } );
            });
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'id'},
            {data :'name'},
            {data :'slug'},
            {data :'level'},
        ],
        "pageLength": 25
    });

    $('#roles-role-list tbody').on( 'click', 'tr td:not(:first-child)', function (e) {
        e.preventDefault();

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        var d = $('#roles-role-list').DataTable().row( this.closest('tr') ).data();
        $('#roles-role-entry').load('<?php echo guard_url('roles/role'); ?>' + '/' + d.id);
    });

    $('#roles-role-list tbody').on( 'change', "input[name^='id[]']", function (e) {
        e.preventDefault();

        aIds = [];
        $(".child").remove();
        $(this).parent().parent().removeClass('parent'); 
        $("input[name^='id[]']:checked").each(function(){
            aIds.push($(this).val());
        });
    });

    $("#roles-role-check-all").on( 'change', function (e) {
        e.preventDefault();
        aIds = [];
        if ($(this).prop('checked')) {
            $("input[name^='id[]']").each(function(){
                $(this).prop('checked',true);
                aIds.push($(this).val());
            });

            return;
        }else{
            $("input[name^='id[]']").prop('checked',false);
        }
        
    });


    $(".reset_filter").click(function (e) {
        e.preventDefault();
        $("#form-search")[ 0 ].reset();
        $('#form-search input,#form-search select').each( function () {
          oTable.search( this.value ).draw();
        });
        $('#roles-role-list .reset_filter').css('display', 'none');

    });


    // Add event listener for opening and closing details
    $('#roles-role-list tbody').on('click', 'td.details-control', function (e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });

});
</script><?php /**PATH D:\xampp\htdocs\website\resources\views/vendor/roles/admin/role/index.blade.php ENDPATH**/ ?>