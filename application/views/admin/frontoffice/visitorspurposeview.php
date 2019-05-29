
<div class="content-wrapper" style="min-height: 348px;">  

    <section class="content">
        <div class="row">
            <div class="col-md-2">
                <div class="box border0">
                    <ul class="tablists">
                        <li><a href="<?php echo site_url('admin/visitorspurpose') ?>" class="active"><?php echo $this->lang->line('purpose'); ?></a></li>
                        <li><a href="<?php echo site_url('admin/complainttype') ?>"><?php echo $this->lang->line('complain_type'); ?></a></li>
                        <li><a href="<?php echo site_url('admin/source') ?>"><?php echo $this->lang->line('source'); ?></a></li>

                    </ul>
                </div>
            </div><!--./col-md-3-->

            <div class="col-md-10">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('purpose'); ?> <?php echo $this->lang->line('list'); ?></h3>
                        <div class="box-tools pull-right">
                            <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>  <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('purpose'); ?></a>     
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('purpose'); ?> <?php echo $this->lang->line('list'); ?></div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>                                    
                                        <th><?php echo $this->lang->line('purpose'); ?></th>


                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($visitors_purpose_list)) {
                                        ?>
                                        <?php
                                    } else {
                                       
                                        foreach ($visitors_purpose_list as $key => $value) {
                                      
                                            ?>
                                            <tr>

                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $value['visitors_purpose'] ?></a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($value['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $value['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div></td>


                                                <td class="mailbox-date pull-right">
                                                    <?php if ($this->rbac->hasPrivilege('setup_front_office', 'can_edit')) { ?>
                                                        <a data-target="#editmyModal" onclick="get(<?php echo $value['id']; ?>)"  class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php if ($this->rbac->hasPrivilege('setup_front_office', 'can_delete')) { ?>
                                                        <a  class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="delete_recordById('<?php echo base_url(); ?>admin/visitorspurpose/delete/<?php echo $value['id']; ?>', '<?php echo $this->lang->line('delete_message') ?>')" data-original-title="<?php echo $this->lang->line('delete'); ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php } ?>


                                                </td>


                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- new END -->

</div><!-- /.content-wrapper -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-mid" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title"> <?php echo $this->lang->line('add'); ?>  <?php echo $this->lang->line('purpose'); ?></h4> 
            </div>

            <div class="modal-body pt0 pb0">

                <form id="formadd" action="<?php echo site_url('admin/visitorspurpose/add') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="pwd"><?php echo $this->lang->line('purpose'); ?></label> <small class="req"> *</small> 
                            <input class="form-control" id="description" name="visitors_purpose" value="<?php echo set_value('visitors_purpose'); ?>"/>
                            <span class="text-danger"><?php echo form_error('visitors_purpose'); ?></span>
                        </div>  
                        <div class="form-group">
                            <label for="pwd"><?php echo $this->lang->line('description'); ?></label>
                            <textarea class="form-control" id="description" name="description"rows="3"><?php echo set_value('description'); ?></textarea>
                        </div>             

                    </div>
                    <div class="box-footer">
                        <button type="submit" data-loading-text="<?php echo $this->lang->line('processing') ?>" id="formaddbtn" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                    </div>
                </form>

            </div><!--./col-md-12-->       
        </div><!--./row--> 
    </div>
</div>


<div class="modal fade" id="editmyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-mid" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="box-title"> <?php echo $this->lang->line('edit'); ?>  <?php echo $this->lang->line('purpose'); ?></h4> 
            </div>

            <div class="modal-body pt0 pb0">

                <form id="editformadd" action="<?php echo site_url('admin/visitorspurpose/edit') ?>" name="employeeform" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="pwd"><?php echo $this->lang->line('purpose'); ?></label> <small class="req"> *</small> 
                            <input class="form-control" id="visitors_purpose" name="visitors_purpose" value="<?php echo set_value('visitors_purpose'); ?>"/>
                            <span class="text-danger"><?php echo form_error('visitors_purpose'); ?></span>
                        </div>  
                        <div class="form-group">
                            <label for="pwd"><?php echo $this->lang->line('description'); ?></label>
                            <textarea class="form-control" id="description1" name="description"rows="3"><?php echo set_value('description'); ?></textarea>
                            <input type="hidden" id="id" name="id">
                        </div>                           

                    </div>
                    <div class="box-footer">
                         <button type="submit" data-loading-text="<?php echo $this->lang->line('processing') ?>" id="editformaddbtn" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                    </div>
                </form>

            </div><!--./col-md-12-->       
        </div><!--./row--> 
    </div>
</div>
<script>

    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>


<script>


    $(document).ready(function (e) {
        $('#formadd').on('submit', (function (e) {
            e.preventDefault();
            $("#formaddbtn").button('loading');
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {

                    if (data.status == "fail") {

                        var message = "";
                        $.each(data.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);
                    } else {

                        successMsg(data.message);
                        window.location.reload(true);
                    }
                    $("#formaddbtn").button('reset');
                },
                error: function () {

                }
            });


        }));

    });


    function get(id) {

        $('#editmyModal').modal('show');
        $.ajax({

            dataType: 'json',

            url: '<?php echo base_url(); ?>admin/visitorspurpose/get_data/' + id,

            success: function (result) {

                $('#id').val(result.id);
                $('#visitors_purpose').val(result.visitors_purpose);
                $('#description1').val(result.description);
            }

        });

    }


    $(document).ready(function (e) {

        $('#editformadd').on('submit', (function (e) {
            e.preventDefault();
            $("#editformaddbtn").button('loading');
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {

                    if (data.status == "fail") {

                        var message = "";
                        $.each(data.error, function (index, value) {

                            message += value;
                        });
                        errorMsg(message);
                    } else {

                        successMsg(data.message);
                        window.location.reload(true);
                    }
                  $("#editformaddbtn").button('reset');  
                },
                error: function () {

                }
            });


        }));

    });
</script>