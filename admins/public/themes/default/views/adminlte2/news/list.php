<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List News
            <!-- <small>advanced tables</small> -->
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo URL::to('');?>">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li>
                List News
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Message Success -->
        <?php if($success = Session::has('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="icon fa fa-check"></i>
            <?php echo (null !== Session::get('success')) ? Session::get('success') : '';?>       
        </div>
        <?php endif; ?>

        <!-- Message Error -->
        <?php if($error = Session::has('error')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="icon fa fa-ban"></i>
            <?php echo (null !== Session::get('error')) ? Session::get('error') : '';?>
        </div>
        <?php endif; ?>

        <!-- Message Warning -->
        <?php if($error = Session::has('warning')): ?>
        <div class="alert alert-warning alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="icon fa fa-warning"></i>
            <?php echo (null !== Session::get('warning')) ? Session::get('warning') : '';?>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title">List Banner</h3> -->
                        <a href="<?php echo URL::to('news/add');?>">
                            <button class="btn btn-success" id="new_news">
                                <i class="fa fa-plus"></i>
                                New news
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="frm_main" role="form" method="get" action="<?php echo URL::to('news');?>" enctype="multipart/form-data">
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <div id="tb_news_length" class="dataTables_length">
                                        <label>
                                            <select id="perpage" name="perpage" size="1" aria-controls="tb_news">

                                    <?php   $perpage_arr = array('5', '10', '25', '50', '100'); 
                                            foreach ($perpage_arr as $value) { ?>
                                                <option value="<?php echo $value;?>"<?php echo ($param['perpage'] == $value ? ' selected="selected"':'');?>><?php echo $value;?></option>        
                                    <?php   } ?>

                                            </select> <strong>records per page</strong></label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="dataTables_filter">
                                        <label><strong>Search:</strong>
                                            <input type="text" name="s" value="<?php echo array_get($param, 's', '');?>">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- <table id="tb_main" class="table table-bordered table-striped"> -->
                            <table id="tb_main" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                <?php   foreach ($table_title as $key => $value):
                                            if($value[1] == 1):?>
                                        <th data-order="<?php echo $key;?>" class="<?php if(isset($param['order']) && $param['order']== $key ):?>sorting_<?php echo isset($param['sort']) ? $param['sort'] : 'desc';?><?php else: ?>sorting<?php endif;?>">
                                            <a href="#">
                                                <?php echo $value[0];?>
                                            </a>
                                        </th>
                                <?php       else: ?>
                                        <th><?php echo $value[0];?></th>
                                <?php       endif;
                                        endforeach;?>
                                    </tr>
                                </thead>
                                <tbody>

    <?php $i = 1; ?>
    <?php foreach ($data as $key => $value): ?>
                                    <tr>
                    <?php   foreach ($table_title as $key2 => $value2): ?>
                    <?php       if ($key2 == 'images'):?>
                    <?php           if($url = array_get($value, 'images.0.url', false)): ?>
                                        <td>
                                            <img src="<?php echo getImageLink('image', array_get($value, 'images.0.user_id', ''), array_get($value, 'images.0.code', ''), array_get($value, 'images.0.extension', ''), 200, 143, array_get($value, 'images.0.name', ''));?>" width="200" height="143">
                                        </td>
                    <?php           else: ?>
                                        <td>
                                            <img src="<?php echo getImageLink('img', 'news', 'siamts', 'png', 200, 143, 'news.jpg');?>" width="200" height="143">
                                        </td>
                    <?php           endif;?>
                    <?php       elseif ($key2 == 'title'): ?>
                                        <td>
                                            <a title="Edit" href="<?php echo URL::to('news');?>/<?php echo array_get($value, 'id', '');?>">
                                            <?php echo array_get($value ,$key2, '');?>
                                            </a>
                                        </td>
                    <?php       elseif ($key2 == 'manage'): ?>
                                        <td>
                                            <a title="Edit" href="<?php echo URL::to('news');?>/<?php echo array_get($value, 'id', '');?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="del_rows" data-id="<?php echo array_get($value, 'id', '');?>" data-iid="<?php echo array_get($value, 'images.0.id', '');?>" data-code="<?php echo array_get($value, 'images.0.code', '');?>" data-uid="<?php echo array_get($value, 'images.0.user_id', '');?>" title="Delete" href="javascript:void(0)"><span class="glyphicon glyphicon-remove-sign danger"></span></a>
                                        </td>
                    <?php       else: ?>
                                        <td><?php echo array_get($value ,$key2, '');?></td>
                    <?php       endif;?>
                    <?php   endforeach;?> 
                    
                                    </tr>
    <?php $i++;?>
    <?php endforeach;?>
    <?php if ($num_rows == 0): ?>
        <tr><td colspan="<?php echo count($table_title);?>" align="center">Data not found</td></tr>
    <?php endif;?>

                                </tbody>
    <?php if ($num_rows > 0): ?>
                                <tfoot>
                                    <tr>

                                <?php   foreach ($table_title as $key => $value): ?>
                                        <th><?php echo $value[0];?></th>
                                <?php   endforeach;?>
                                    </tr>
                                </tfoot>
    <?php endif;?>
                            </table>

                            <?php if(isset($pagination)): ?>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="dataTables_info" id="tb_news_info">Showing <?php echo $pagination->getFrom();?>
                                    to <?php echo $pagination->getTo();?>
                                    of <?php echo $pagination->getTotal();?> entries
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="dataTables_paginate paging_bootstrap">
                                        <ul class="pagination">
                                            <?php if(isset($param) && !empty($param)): ?>
                                            <?php echo $pagination->appends($param)->links();?>
                                            <?php else: ?>
                                            <?php echo $pagination->links();?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>

                            <input name="order" id="order" value="<?php echo $param['order'];?>" type="hidden">
                            <input name="sort" id="sort" value="<?php echo $param['sort'];?>" type="hidden">
                        </form>

                        <form id="frm_main2" role="form" method="post" action="<?php echo URL::to('news');?>" enctype="multipart/form-data">
                            <input name="action" id="action" value="" type="hidden">
                            <input name="id" id="id" value="" type="hidden">
                            <input name="user_id" id="user_id" value="" type="hidden">
                            <input name="images_id" id="images_id" value="" type="hidden">
                            <input name="code" id="code" value="" type="hidden">
                            <input name="referer" id="referer" value="<?php echo $_SERVER['REQUEST_URI'];?>" type="hidden">
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper