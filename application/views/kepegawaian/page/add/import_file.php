<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Import Data</h6></div>
			<?php 
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open_multipart('pekerja/run_import', $attributes) ?>
                <fieldset class="step" id="w2first">
					<h1></h1>
					<div class="formRow">
						<input type="file" name="database" size="20" />
						<div class="clear"></div>
                    </div>
				</fieldset>
				<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
                        <input class="blueB ml10" id="next2" value="upload" type="submit" />
                    </span>
				</div>
                <div class="clear"></div>
			</form>
			<div class="data" id="w2"></div>
        </div>
</div>