<div id="shown-image-container">
	<div>
		<table
			class="table table-striped table-hover table-bordered dataTable"
			id="sample_editable_1" aria-describedby="sample_editable_1_info">
			<thead>
				<tr role="row">
					<th role="columnheader" rowspan="1" colspan="1"
						aria-label="Username">图像</th>
				</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all"
				data-bind="foreach:images">
				<tr class="odd">
					<td>
					<input type="hidden" name="shownImages[]" data-bind="value:id">
					<input type="hidden" name="shownImages[]" data-bind="value:image">
					<input type="hidden" name="shownImages[]" data-bind="value:thumbImage">
					<input type="hidden" name="shownImages[].relativePath3" data-bind="value:smallImage">
					<img data-bind="attr:{src:smallImage}"	style="max-height: 80px;" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>