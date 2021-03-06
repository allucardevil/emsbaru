<div class="twoOne">
<div class="widget">
          <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Detail Pegawai</h6></div>
            <?php 
				foreach ($pegawai as $row_pegawai) :
				{ 
					if ($row_pegawai['peg_jns_kelamin'] == 'P')
					{
						$kelamin = 'Perempuan';
					}
					else
					{
						$kelamin = 'Laki Laki';
					}
					if ($row_pegawai['peg_gol_darah'] == NULL)
					{
						$gol_darah = '-';
					}
					else
					{
						$gol_darah = $row_pegawai['peg_gol_darah'];
					}
					$datestring = "%d-%m-%Y" ;
					$tgl_lahir = mdate($datestring,strtotime($row_pegawai['peg_tgl_lahir']));
					$detail = anchor('pekerja/get_pegawai/'.$row_pegawai['peg_nipp'],'Detail'); 
				}endforeach; 
				if ($data_agama == NULL)
					{ $agama = '-';}
				else {
					foreach ($data_agama as $row_agama) :
					{ 
						$agama = $row_agama['p_ag_agama'];
					}endforeach;
				}
				if ($data_fisik == NULL)
					{ $foto = '';
					  $tinggi = '-';
					  $berat = '-';}
				foreach ($data_fisik as $row_fisik) :
				{ 
					$foto = $row_fisik['p_fs_foto'];
					$tinggi = $row_fisik['p_fs_tinggi'];
					$berat = $row_fisik['p_fs_berat'];
				}endforeach;
				if ($data_alamat == NULL)
					{ $telp = '-';
					  $jalan = '-';
					  $kelurahan = '-';
					  $kecamatan = '-';
					  $kabupaten = '-';
					  $provinsi = '-';}
				foreach ($data_alamat as $row_alamat) :
				{ 
					$telp = $row_alamat['p_al_no_telp'];
					$jalan = $row_alamat['p_al_jalan'];
					$kelurahan = $row_alamat['p_al_kelurahan'];
					$kecamatan = $row_alamat['p_al_kecamatan'];
					$kabupaten = $row_alamat['p_al_kabupaten'];
					$provinsi = $row_alamat['p_al_provinsi'];
				}endforeach;
				if ($data_status_keluarga == NULL)
					{ $row_stk['p_stk_status_keluarga'] = '-';}
				foreach ($data_status_keluarga as $row_stk) :
				{ 
				}endforeach;
				if ($data_pendidikan == NULL)
				{
					$row_pdd['p_pdd_tingkat'] = '';
					$row_pdd['p_pdd_lp']='';
					$row_pdd['p_pdd_masuk']='';
					$row_pdd['p_pdd_keluar']='';
				}else{
					foreach ($data_pendidikan as $row_pdd) :
					{ 
					}endforeach;
				}
				?>
				<?php 
				foreach ($data_jabatan_tmt as $row_jbt_tmt) :
				{
					$datestring = "%d-%m-%Y" ;
					$tmt = mdate($datestring,strtotime($row_jbt_tmt['p_tmt_tmt']));
					$status = $row_jbt_tmt['p_tmt_status'];
					$provider = $row_jbt_tmt['p_tmt_provider'];
				} endforeach;
				foreach ($data_unit as $row_unit) :
				{} endforeach;
				if ($data_grade == NULL)
				{ $grade = '';} else {
					foreach ($data_grade as $row_grade) :
					{
						$grade = $row_grade['p_grd_grade'];
					} endforeach;
				}?>
			<table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <tfoot>
					<tr><td colspan=8><p align="right"><?php echo anchor ('pekerja/edit_data/'.$row_pegawai['peg_nipp'],'[edit]');?></p></td></tr>
				</tfoot>
				<tbody>
				
					<tr>
						<td width="25%" rowspan="11"><img src="<?php echo base_url()?>pegawai/foto/<?php echo $foto; ?>" width="220px" ></td>
						<td>NIPP</td><td><?php echo $row_pegawai['peg_nipp']; ?></td>
						<tr><td>Nama</td><td><?php echo $row_pegawai['peg_nama']; ?></td></tr>
						<tr><td>Tempat / Tanggal Lahir</td><td><?php echo $row_pegawai['peg_tmpt_lahir'].' / '.$tgl_lahir; ?></td></tr>
						<tr><td>Jenis Kelamin</td><td><?php echo $kelamin; ?></td></tr>
						<tr><td>Golongan Darah</td><td><?php echo $gol_darah; ?></td></tr>
						<tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
						<tr><td>Tinggi</td><td><?php echo $tinggi.' cm'; ?></td></tr>
						<tr><td>Berat</td><td><?php echo $berat.' kg'; ?></td></tr>
						<tr><td>Nomor Telp</td><td><?php echo $telp; ?></td></tr>
						<tr><td>Status Keluarga</td><td><?php echo $row_stk['p_stk_status_keluarga']; ?></td></tr>
                    </tr> 
                </tbody>
            </table>
			<div id="clear"></div>
        </div>
</div>
<div class="oneThree">
<div class="widget">
<div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /><h6>Delete Pegawai</h6></div>
<table cellpadding="0" cellspacing="0" width="100%" class="sTable">
<?php echo form_open(); ?>
	<tr><td>Reason</td>
	<td><?php 
	$reason = array(
		'Pindah Cabang' => 'Pindah Cabang',
		'Pensiun Dini' => 'Pensiun Dini',
		'Pensiun' => 'Pensiun',
		'PHK' => 'Pemutusan Hubungan Kerja',
		'Other' => 'Other'
		);
	echo form_dropdown('reason',$reason) ?></td></tr>
	<tr><td>Terhitung Mulai</td>
	<td><?php 
	$tanggal = array(
		'name' => 'tanggal',
		'id'   => 'tanggal',
		'class'=> 'maskDate'
	);
	echo form_input($tanggal)?></td></tr>
	<tr><td>Keterangan</td>
	<td><?php 
	$ket = array(
		'name' => 'ket',
		'id'   => 'ket',
	);
	echo form_textarea($ket)?></td></tr>
	<tr><td colspan="2" align="right">
	<?php $submit = array(
			'class' => 'blueB m110',
			'id'	=> 'next2',
			'value'	=> 'Submit',
			);
	echo form_submit($submit)?></td></tr>
</table>
</div>
</div>

<div class="twoOne2">
	<div class="widget rightTabs"> 
            <div class="title"><img src="<?php echo base_url()?>images/icons/dark/frames.png" alt="" class="titleIcon" /></div>     
            <ul class="tabs">
                <li><a href="#tab1">Alamat</a></li>
                <li><a href="#tab2">Pendidikan</a></li>
				<li><a href="#tab3">Jabatan</a></li>
				<li><a href="#tab4">Pasangan</a></li>
				<li><a href="#tab8">Data Anak</a></li>
				<li><a href="#tab5">Data Orang Tua</a></li>
				<li><a href="#tab6">Data Mertua</a></li>
            </ul>
            <div class="tab_container">
                <div id="tab1" class="tab_content np">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                        <tfoot>
							<tr><td colspan=2><p align="right">
							<?php if ($status !== 'Outsource')
							{
								echo anchor('pekerja/edit_alamat_pegawai/'.$row_pegawai['peg_nipp'],'[edit]');
							}?></p></td></tr>
						</tfoot>
                        <tbody>
								<tr><td width="30%">Jalan</td><td><?php echo $jalan;?></td></tr>
                                <tr><td>Kelurahan</td><td><?php echo $kelurahan;?></td></tr>
								<tr><td>Kecamatan</td><td><?php echo $kecamatan;?></td></tr>
								<tr><td>Kabupaten</td><td><?php echo $kabupaten;?></td></tr>
								<tr><td>Provinsi</td><td><?php echo $provinsi;?></td></tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tab2" class="tab_content np">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                        <tfoot>
							<tr><td colspan=2><p align="right"><?php 
							if ($status !== 'Outsource')
							{echo anchor('pekerja/add_bahasa_pegawai/'.$row_pegawai['peg_nipp'],'[add]  '); echo anchor('pekerja/edit_pendidikan_pegawai/'.$row_pegawai['peg_nipp'],'[edit]');}?></p></td></tr>
						</tfoot>
                        <tbody>
                            <tr><td width="30%">Pendidikan Terakhir</td><td><?php echo $row_pdd['p_pdd_tingkat'];?></td></tr>
                            <tr><td>Lembaga Pendidikan</td><td><?php echo $row_pdd['p_pdd_lp'];?></td></tr>
							<tr><td>Tahun</td><td><?php echo $row_pdd['p_pdd_masuk'].' s/d '.$row_pdd['p_pdd_keluar'];?></td></tr>
							<?php if ($jumlah_bahasa == 0)
							{
								$jumlah_bahasa = 1;
							} ?>
							<tr><td rowspan=<?php echo $jumlah_bahasa ?>>Bahasa yang dikuasai</td>
							<?php 
							$jumlah_bhs = 1;
							if ($data_bahasa == NULL)
							{ ?>
								<td></td>
							<?php }
							foreach ($data_bahasa as $row_bhs) :
							{ 	
							if ($jumlah_bhs == 1)
							{?>
								<td><?php echo $row_bhs['p_bhs_bahasa'];?></td>
							<?php } else {
							?>
								<tr><td><?php echo $row_bhs['p_bhs_bahasa'];?></td></tr>
							<?php }
							$jumlah_bhs++;
							}endforeach; ?>
							</tr>
						</tbody>
                    </table>
                </div>
				
                <div class="clear"></div>
				<div id="tab3" class="tab_content np">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                        <tfoot>
							<tr><td colspan=8><p align="right"><?php echo anchor('pekerja/edit_jabatan_pegawai/'.$row_pegawai['peg_nipp'],'[edit]');?></p></td></tr>
						</tfoot>
                        <tbody>
                            <tr><td width="30%">Jabatan Terakhir</td><td><?php echo $row_jbt_tmt['p_jbt_jabatan']?></td></tr>
                            <tr><td>Terhitung Mulai Tanggal</td><td><?php echo $tmt; ?></td></tr>
							<tr><td>Unit</td><td><?php echo $row_unit['p_unt_kode_unit']?></td></tr>
							<tr><td>Grade</td><td><?php echo $grade?></td></tr>
							<tr><td>Status Pegawai</td><td><?php echo $status?></td></tr>
							<tr><td>Provider</td><td><?php echo $provider?></td></tr>
                        </tbody>
                    </table>
                </div>
				<?php 
				if ($data_pasangan == NULL)
				{
					$row_pasangan['p_ps_nama'] = '-';
					$row_pasangan['p_ps_tmpt_lahir'] = '-';
					$row_pasangan['p_ps_alamat'] = '-';
					$row_pasangan['p_ps_pekerjaan'] = '-';
					$tgl_lahir = '-';
				}else{
					foreach ($data_pasangan as $row_pasangan) :
					{
						$datestring = "%d-%m-%Y" ;
						$tgl_lahir = mdate($datestring,strtotime($row_pasangan['p_ps_tgl_lahir']));
					} endforeach;}?>
                <div class="clear"></div>
				<div id="tab4" class="tab_content np">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                        <tfoot>
							<tr><td colspan=8><p align="right"><?php if ($status !== 'Outsource')
							{echo anchor('pekerja/edit_pasangan_pegawai/'.$row_pegawai['peg_nipp'],'[edit]');}?></p></td></tr>
						</tfoot>
                        <tbody>
                            <tr><td width="30%">Nama</td><td><?php echo $row_pasangan['p_ps_nama'];?></td></tr>
                            <tr><td>Tempat / Tanggal Lahir</td><td><?php echo $row_pasangan['p_ps_tmpt_lahir'].' / '.$tgl_lahir;?></td></tr>
							<tr><td>Alamat</td><td><?php echo $row_pasangan['p_ps_alamat'];?></td></tr>
							<tr><td>Pekerjaan</td><td><?php echo $row_pasangan['p_ps_pekerjaan'];?></td></tr>
                        </tbody>
                    </table>
                </div>
				<?php 
				if ($data_ayah == NULL)
				{
					$row_ayah['p_ay_nama'] = '-';
					$row_ayah['p_ay_tmpt_lahir'] = '-';
					$row_ayah['p_ay_alamat'] = '-';
					$row_ayah['p_ay_pekerjaan'] = '-';
					$ay_tgl_lahir = '-';
				}else{
					foreach($data_ayah as $row_ayah) :
					{
						$datestring = "%d-%m-%Y" ;
						$ay_tgl_lahir = mdate($datestring,strtotime($row_ayah['p_ay_tgl_lahir']));
					} endforeach;}
					
				if ($data_ibu == NULL)
				{
					$row_ibu['p_ibu_nama'] = '-';
					$row_ibu['p_ibu_tmpt_lahir'] = '-';
					$row_ibu['p_ibu_alamat'] = '-';
					$row_ibu['p_ibu_pekerjaan'] = '-';
					$ibu_tgl_lahir = '-';
				} else {
					foreach($data_ibu as $row_ibu) :
					{
						$datestring = "%d-%m-%Y" ;
						$ibu_tgl_lahir = mdate($datestring,strtotime($row_ibu['p_ibu_tgl_lahir']));
					} endforeach;}?>
                <div class="clear"></div>
				<div id="tab5" class="tab_content np">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                        <tfoot>
							<tr><td colspan=8><p align="right"><?php if ($status !== 'Outsource')
							{echo anchor('pekerja/edit_ortu_pegawai/'.$row_pegawai['peg_nipp'],'[edit]');}?></p></td></tr>
						</tfoot>
                        <tbody>
                            <tr><td width="30%">Nama Ayah</td><td><?php echo $row_ayah['p_ay_nama']; ?></td></tr>
                            <tr><td>Tempat / Tanggal Lahir</td><td><?php echo $row_ayah['p_ay_tmpt_lahir'].' / '.$ay_tgl_lahir; ?></td></tr>
							<tr><td>Alamat</td><td><?php echo $row_ayah['p_ay_alamat']; ?></td></tr>
							<tr><td>Pekerjaan</td><td><?php echo $row_ayah['p_ay_pekerjaan']; ?></td></tr>
							<tr><td colspan=2></td></tr>
							<tr><td width="30%">Nama Ibu</td><td><?php echo $row_ibu['p_ibu_nama']; ?></td></tr>
                            <tr><td>Tempat / Tanggal Lahir</td><td><?php echo $row_ibu['p_ibu_tmpt_lahir'].' / '.$ibu_tgl_lahir; ?></td></tr>
							<tr><td>Alamat</td><td><?php echo $row_ibu['p_ibu_alamat']; ?></td></tr>
							<tr><td>Pekerjaan</td><td><?php echo $row_ibu['p_ibu_pekerjaan']; ?></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
				<div id="tab6" class="tab_content np">
				<?php if ($data_ayah == NULL)
				{
					$row_m_ayah['p_may_nama'] = '-';
					$row_m_ayah['p_may_tmpt_lahir'] = '-';
					$row_m_ayah['p_may_alamat'] = '-';
					$row_m_ayah['p_may_pekerjaan'] = '-';
					$m_ay_tgl_lahir = '-';
				}else{
				foreach($data_mert_ayah as $row_m_ayah) :
				{
					$datestring = "%d-%m-%Y" ;
					$m_ay_tgl_lahir = mdate($datestring,strtotime($row_m_ayah['p_may_tgl_lahir']));
				} endforeach;}
				if ($data_ibu == NULL)
				{
					$row_m_ibu['p_mib_nama'] = '-';
					$row_m_ibu['p_mib_tmpt_lahir'] = '-';
					$row_m_ibu['p_mib_alamat'] = '-';
					$row_m_ibu['p_mib_pekerjaan'] = '-';
					$m_ibu_tgl_lahir = '-';
				} else {
				foreach($data_mert_ibu as $row_m_ibu) :
				{
					$datestring = "%d-%m-%Y" ;
					$m_ibu_tgl_lahir = mdate($datestring,strtotime($row_m_ibu['p_mib_tgl_lahir']));
				} endforeach;}?>
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                        <tfoot>
							<tr><td colspan=8><p align="right"><?php if ($status !== 'Outsource')
							{echo anchor('pekerja/edit_mertua_pegawai/'.$row_pegawai['peg_nipp'],'[edit]');}?></p></td></tr>
						</tfoot>
                        <tbody>
                            <tr><td width="30%">Nama Ayah Mertua</td><td><?php echo $row_m_ayah['p_may_nama']; ?></td></tr>
                            <tr><td>Tempat / Tanggal Lahir</td><td><?php echo $row_m_ayah['p_may_tmpt_lahir'].' / '.$m_ay_tgl_lahir; ?></td></tr>
							<tr><td>Alamat</td><td><?php echo $row_m_ayah['p_may_alamat']; ?></td></tr>
							<tr><td>Pekerjaan</td><td><?php echo $row_m_ayah['p_may_pekerjaan']; ?></td></tr>
							<tr><td colspan=2></td></tr>
							<tr><td width="30%">Nama Ibu Mertua</td><td><?php echo $row_m_ibu['p_mib_nama']; ?></td></tr>
                            <tr><td>Tempat / Tanggal Lahir</td><td><?php echo $row_m_ibu['p_mib_tmpt_lahir'].' / '.$m_ibu_tgl_lahir; ?></td></tr>
							<tr><td>Alamat</td><td><?php echo $row_m_ibu['p_mib_alamat']; ?></td></tr>
							<tr><td>Pekerjaan</td><td><?php echo $row_m_ibu['p_mib_pekerjaan']; ?></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
				<div class="clear"></div>
				<div id="tab8" class="tab_content np">
                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
						<tfoot>
							<tr><td colspan=8><p align="right"><?php if ($status !== 'Outsource')
							{echo anchor('pekerja/add_anak_pegawai/'.$row_pegawai['peg_nipp'],'[add]  ');echo anchor('pekerja/edit_anak_pegawai/'.$row_pegawai['peg_nipp'],'[edit]');}?></p></td></tr>
						</tfoot>
                        <tbody>
							<?php 
							$number = 1;
							$datestring = "%d-%m-%Y" ;
							foreach ($data_anak as $row_anak) :
							{ ?>
                            <tr><td width="5%" rowspan=3><?php echo $number ?></td><td width="25%">Nama</td><td><?php echo $row_anak['peg_ank_nama']; ?></td></tr>
                            <tr><td>Tempat / Tanggal Lahir</td><td><?php echo $row_anak['peg_ank_tempat_lahir'].' / '.mdate($datestring,strtotime($row_anak['peg_ank_tgl_lahir'])); ?></td></tr>
							<tr><td>Pendidikan</td><td><?php echo $row_anak['peg_ank_pendidikan']; ?></td></tr>
							<?php 
							$number++;
							} endforeach;
							?>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>	
        </div>
</div>
