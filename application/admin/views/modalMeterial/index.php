<?php
   $index=0;
 ?>
 <div>
   <a class="btn blue" href="<?=site_url("modalMeterial/create")?>">新增</a>
 </div>
<div class="portlet-body"> 
    <table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1" aria-describedby="sample_editable_1_info"> 
     <thead> 
      <tr role="row"> 
       <th style="width: 50px;">编号</th>
       <th style="width: 407px;">名称</th>
       <th style="width: 208px;">材料类别</th>
       <th style="width: 100px;">颜色</th>       
       <th style="width: 120px;">价格</th>
       <th style="width: 120px;">精度</th>
       <th style="width: 208px;">成型尺寸</th>
       <th style="width: 208px;">工艺</th>
       <th style="width: 208px;">交工周期</th>
       <th style="width: 120px;">图像</th>
       <th style="width: 240px;">创建时间</th>
       <th style="width: 100px;"></th>
       <th style="width: 100px;"></th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
     <?php foreach($list as $item):?>
      <tr class="<?=($index%2==0)?"even":"odd" ?>"> 
       <td class=" sorting_1"><?=$item->id; ?></td> 
       <td class=" "><?=$item->name; ?></td>
       <td class=" "><?=$item->categoryName; ?></td>  
       <td class="" style="text-align:center;"><div style="display:inline-block;width:22px;height:22px; background-color: <?=$item->color; ?>;"></div></td>
       <td class=" "><?=$item->price; ?></td>  
       <td class=" "><?=$item->accuracy; ?></td>  
       <td class=" "><?=$item->size; ?></td>  
       <td class=" "><?=$item->technology; ?></td>  
       <td class=" "><?=$item->workday; ?></td>  
       <td class=" "><img alt="" src="<?=$item->smallImage ?>" style="max-width:70px;max-height:50px;"></td>   
       <td class="center "><?=$item->createdTime; ?></td> 
       <td class=" "><a class="edit" href="<?=site_url("modalMeterial/edit/").$item->id ?>">编辑</a></td>
       <td class=" "><a class="delete" href="#" data-url="<?=site_url("modalMeterial/delete/").$item->id?>">删除</a></td>
      </tr>
      <?php endforeach;?>    
     </tbody>
    </table>
</div>