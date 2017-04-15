<?php
   $index=0;
 ?>
 <div>
   <a class="btn blue" href="<?=site_url("modalmeterialcategory/create")?>">新增</a>
 </div>
<div class="portlet-body"> 
    <table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info"> 
     <thead> 
      <tr role="row"> 
       <th style="width: 263px;">编号</th>
       <th style="width: 407px;">名称</th>
       <th style="width: 208px;">描述</th>
       <th style="width: 286px;">创建时间</th>
       <th style="width: 157px;"></th>
       <th style="width: 209px;"></th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
     <?php foreach($list as $item):?>
      <tr class="<?=($index%2==0)?"even":"odd" ?>"> 
       <td class=" sorting_1"><?=$item->id; ?></td> 
       <td class=" "><?=$item->name; ?></td> 
       <td class=" "><?=$item->description; ?></td>  
       <td class="center "><?=$item->createdTime; ?></td> 
       <td class=" "><a class="edit" href="<?=site_url("modalmeterialcategory/edit/").$item->id ?>">编辑</a></td>
       <td class=" "><a class="delete" href="#" data-url="<?=site_url("modalmeterialcategory/delete/").$item->id?>">删除</a></td>
      </tr>
      <?php endforeach;?>    
     </tbody>
    </table>
</div>