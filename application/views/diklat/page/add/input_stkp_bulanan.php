<div class = "oneTwo">
	<div class="widget">
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/pencil.png" alt="" class="titleIcon" /><h6>Input Training Bulanan</h6></div>
			<?php 
			$attributes = array('class'=>'form','id'=>'wizard3');
			echo form_open('diklat/input_stkp_bulanan/part_two', $attributes) ?>
                <fieldset class="step" id="w2first">
                    <h1>Step 1 Part 1 - Data Training</h1>
                    <div class="formRow">
                        <label>Jenis :<span class="req">*</span></label>
                        <div class="formRight">
						<?php $stkp = array(
							'name' => 'stkp',
							'id'   => 'stkp',
							'style'=> 'width:80%',
						);
						echo form_input($stkp);?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Lembaga Pelaksana :<span class="req">*</span></label>
                        <div class="formRight"><?php 
						$lp = array(
							'name' => 'lp',
							'id'   => 'lp',
							'style'=> 'width:80%',
						);
						echo form_input($lp) ?><br/>
						<?php echo form_error('tanggal')?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Jumlah Pegawai :<span class="req">*</span></label>
                        <div class="formRight"><?php 
						$jumlah = array(
							'name' => 'jumlah',
							'id'   => 'jumlah',
							'style'=> 'width:30%',
						);
						echo form_input($jumlah) ?><br/>
						<?php echo form_error('jumlah')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>Tanggal Pelaksanaan :<span class="req">*</span></label>
                        <div class="formRight"><?php 
						$tanggal = array(
							'name' => 'tanggal',
							'id'   => 'tanggal',
							'style'=> 'width:30%',
							'class'=> 'maskDate'
						);
						echo form_input($tanggal) ?><br/>
						<?php echo form_error('tanggal')?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
                        <label>STKP :<span class="req">*</span></label>
                        <div class="formRight"><?php 
						$license = array(
							'name' 		=> 'license',
							'id'   		=> 'license',
							'value'     => 'yes',
							'checked'   => TRUE,
						);
						echo form_checkbox($license) ?></div>
                        <div class="clear"></div>
                    </div>
					<div class="formRow">
					<span class="req">* Tidak Boleh Kosong</span>
					<div class="clear"></div>
					</div>
					<div class="wizButtons"> 
                    <div class="status" id="status2"></div>
					<span class="wNavButtons">
                        <input class="blueB ml10" id="next2" value="Next" type="submit" />
                    </span>
				</div>
                </fieldset>
</div></div>