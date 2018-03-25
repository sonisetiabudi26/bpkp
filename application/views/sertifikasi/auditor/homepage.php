<?php
	echo "<h2 class='margin-20 font-hitam'>auditor</h2>";
?>
<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
					<th>pk lookup</th>
					<th>code</th>
        </tr>
      </thead>
      <tbody>
				<?php foreach ($lookups as $lookups_item):
				?>
					<tr>
				        <td><?php echo $lookups_item->PK_LOOKUP;?></td>
				        <td><?php echo $lookups_item->CODE;?></td>
					</tr>
				<?php endforeach; ?>
       </tbody>
    </table>
