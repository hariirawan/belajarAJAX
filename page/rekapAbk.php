<h2 class="page-header">Rekapitulasi Data Anak Berkebutuhan Khusus</h2>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-8">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#input">
				<i class="glyphicon glyphicon-plus-sign">&nbsp;</i>Tambah Data</button>
				<button type="button" class="btn btn-info btn-sm" id="priview">
				<i class="glyphicon glyphicon-send">&nbsp;</i>Priview Data</button>
				<button class="btn btn-warning btn-sm " id="printOrEx">Print Or Export</button>
			</div>
			<div class="col-sm-4 ">
			  	<div class="input-group search">
				    <input type="text" placeholder="Search For.." class="form-control" id="cari">
					<span class="input-group-btn">
						<input class="btn btn-warning" type="reset">Reset !</input>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="table-tampil">

	</div>
</div>
<!--Modal -->
		<div class="modal fade" id="input">
			<div class="modal-dialog " role="document">
			    <div class="modal-content">
			    	<div class="modal-header">
			    		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    		<h4 class="modal-title" id="myModalLabel">Input Data Anak </h4>
			    	</div>
			    	<div class="modal-body" style="overflow-y: scroll;  max-height: 500px; ">
		    			<form class="form-horizontal" id="formAbk">
		    				<div class="panel panel-info">
					    		<div class="panel-heading">
								    <h3 class="panel-title">Biodata Anak Berkebutuhan Khusus</h3>
								</div>
								<div class="panel-body" >
								  <div class="form-group form-group-sm">
								    <label class="col-sm-3 control-label" for="nama_anak">Nama Lengkap Anak</label>
								    <div class="col-sm-9">
								      <input class="form-control" type="text" id="nama_anak" name="namaAnak" placeholder="Nama Lengkap Anak">
								    </div>
								  </div>
								  <div class="form-group form-group-sm">
								    <label class="col-sm-3 control-label" for="jk">Jenis Kelamin</label>
								    <div class="col-sm-9">
								      <select id="jk" name="jk" class="form-control">
								      	<option >-- Jenis Kelamin --</option>
								      	<option value="L">Laki-Laki</option>
								      	<option value="P">Perempuan</option>
								      </select>
								    </div>
								  </div>
								  <div class="form-group form-group-sm">
								    <label class="col-sm-3 control-label" for="umur">Umur</label>
								    <div class="col-sm-9">
								      <input class="form-control" type="text" id="umur" name="umur" placeholder="Umur Anak">
								    </div>
								  </div>
								  <div class="form-group form-group-sm">
								    <label class="col-sm-3 control-label" for="nama_ortu">Nama Ortu</label>
								    <div class="col-sm-9">
								      <input class="form-control" type="text" id="nama_ortu" name="namaOrtu" placeholder="Nama Orang Tua">
								    </div>
								  </div>
								   <div class="form-group form-group-sm">
								    <label class="col-sm-3 control-label" for="pekerjaan">Pekerjaan</label>
								    <div class="col-sm-9">
								      <input class="form-control" type="text" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
								    </div>
								  </div>
									<div class="form-group form-group-sm">
									    <label class="col-sm-3 control-label" for="kec">Kecamatan</label>
									    <div class="col-sm-9">
									      <select class="form-control" id="kec" name="kec">
														
									      </select>
									    </div>
									  </div>
									<div class="form-group form-group-sm">
									    <label class="col-sm-3 control-label" for="kel">Desa/Kelurahan</label>
									    <div class="col-sm-9">
									      <select class="form-control" id="kel" name="desa">
									      	<option value="">Pilih Kelurahan/Desa</option>
									      </select>
									    </div>
								  	</div>
								    <div class="form-group form-group-sm">
								    	<label class="col-sm-3 control-label" for="dusun">Alamat Dusun</label>
									    <div class="col-sm-9">
									     <select class="form-control" id="dusun" name="dusun">
									      	<option value="">Pilih Dusun</option>
									      </select>
									    </div>
								  	</div>
										  	
		    						<div class="panel panel-default ">
							  		<div class="panel-heading ">
							  			<h3 class="panel-title">
							  				Kebutuhan Khusus yang dialami anak
							  			</h3>
							  		</div>
						  			<div class="panel-body">
						  				<div class="col-sm-2 col-sm-offset-1">
						  					<div class="checkbox">
											  <label>
											    <input type="checkbox" id="APS" name="APS" value="1"> APS
											  </label>
											</div>
											<div class="checkbox">
											  <label>
											    <input type="checkbox" id="ABA" name="ABA" value="1"> ABA
											  </label>
											</div>
						  				</div>
						  				<div class="col-sm-2">
											<div class="checkbox">
											  <label>
											    <input type="checkbox" id="BGM" name="BGM" value="1"> BGM
											  </label>
											</div>
						  					<div class="checkbox">
											  <label>
											    <input type="checkbox" id="HIV" name="HIV" value="1"> HIV
											  </label>
											</div>
						  				</div>
						  				<div class="col-sm-2">
											<div class="checkbox">
											  <label>
											    <input type="checkbox" id="ABM" name="ABM" value="1"> ABM
											  </label>
											</div>
											<div class="checkbox">
											  <label>
											    <input type="checkbox" id="APC" name="APC" value="1"> APC
											  </label>
											</div>
						  					
						  				</div>
						  				<div class="col-sm-2">
						  					<div class="checkbox">
											  <label>
											    <input type="checkbox" id="AYP" name="AYP" value="1"> AYP
											  </label>
											</div>
											<div class="checkbox">
											  <label>
											    <input type="checkbox" id="ATA" name="ATA" value="1"> ATA
											  </label>
											</div>
						  				</div>
						  				<div class="col-sm-2">
											<div class="checkbox">
											  <label>
											    <input type="checkbox" id="ATD" name="ATD" value="1"> ATD
											  </label>
											</div>
											<div class="checkbox">
											  <label>
											    <input type="checkbox" id="ADL" name="ADL" value="1"> ADL
											  </label>
											</div>
						  				</div>
						  			</div>
							  	</div>
								</div>
							</div>
						</form>
	    			</div>
					
			    	<div class="modal-footer">
			    		<button class="btn btn-primary text-right" id="simpan">Simpan</button>
			    		<button class="btn btn-danger text-right" id="close" data-dismiss="modal">Close</button>
			    	</div>	
			    </div>
		  	</div>
		</div>
<!--Modal -->		
<script src="ajax/abk.js"></script>