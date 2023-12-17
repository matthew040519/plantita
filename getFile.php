<?php $id = $_GET['id']; ?>

	<div style="display: <?php echo $id == 1 ? 'none' :  'block' ?> ">
		<p>File</p>
					<input type="file" class="form-control" name="file">
	</div>