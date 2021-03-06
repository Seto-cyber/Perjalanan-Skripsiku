<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/datepicker.css')?>">
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js')?>"></script>
<script src="<?php echo base_url('assets/tinymce/tinymce.min.js')?>"></script>
<script>
$(function(){
	$('#tgl_input').datepicker();
	$('button[type="reset"]').click(function(evt) {
	    evt.preventDefault();
	    $(this).closest('form').get(0).reset();
	
	});
});
</script>
<div id="body-container">
	<div class="container">
		<div class="page-header form-header">
			<h3><?php echo $title?></h3>
		</div>
		<?php
			 $msg_err = $this->session->flashdata('admin_save_error');
			 $msg_succes = $this->session->flashdata('admin_save_success');
		?>
		<?php if(!empty($msg_err)): ?>
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Error!</strong> <?php echo $msg_err;?>
		</div>
		<?php endif; ?>
		<?php if(!empty($msg_succes)): ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Succes!</strong> <?php echo $msg_succes;?>
		</div>
		<?php endif; ?>
		<form  method="post" action="<?php echo site_url("pengumuman/save")?>"  >
			<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data->id_pengumuman; ?>" >
			<div class="panel panel-default form-master">
			  <div class="panel-heading">
			  		<div class="row">
			  			<div class="col-md-4  pull-right">
			  				<div class="form-action pull-right">
			     				<button type="submit" class="btn btn-success" name="action" value="save">Save</button>
								<button type="submit" class="btn btn-success" name="action" value="saveexit">Save & Exit</button>
			     				<button type="reset" class="btn btn-warning">Reset</button>
			     				<a  href="<?php echo site_url("pengumuman")?>" class="btn btn-danger">Cancel</a>
			     			</div>
			  			</div>
			  		</div>
			  </div>
			  <div class="panel-body">
				<div class="form-horizontal" >
					<div class="form-group">
						<label for="id_pengumuman" class="col-sm-2 control-label">ID pengumuman</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" id="id_pengumuman" placeholder="input id pengumuman" name="id_pengumuman" value="<?php echo $data->id_pengumuman == "" ? $data->autocode : $data->id_pengumuman; ?>"  readonly >
						</div>
					</div>
					<div class="form-group">
						<label for="judul" class="col-sm-2 control-label">Judul</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" id="judul" placeholder="input judul" name="judul" required="required" value="<?php echo $data->judul; ?>"  >
						</div>
					</div>
					<div class="form-group">
						<label for="isilabel" class="col-sm-2 control-label">Isi</label>
						<div class="col-sm-9">
						  <textarea class="form-control tinymce" rows="8" id="isi" name="isi" ><?php echo $data->isi; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="tgl_input" class="col-sm-2 control-label">Tanggal Input</label>
						<div class="col-sm-4">
							<div class="input-group">
							 <input type="text" class="form-control datepicker" id="tgl_input" name="tgl_input"  readonly data-date-format="mm/dd/yyyy" value="<?php echo ($data->tgl_input != "") ? date("m/d/Y",strtotime($data->tgl_input)) : date("m/d/Y") ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="id_thn_ajaran" class="col-sm-2 control-label">Tahun Ajaran</label>
						<div class="col-sm-2">
					       <select class="form-control input-sm" name="id_thn_ajaran">
							  <?php foreach ($tahun_ajaran as $thn):?>
							  <option value="<?php echo $thn['id_thn_ajaran'];?>" <?php echo $data->id_thn_ajaran == $thn['id_thn_ajaran'] ? 'selected' : ($this->session->userdata('selected_tahun_ajaran') == $thn['id_thn_ajaran'] && $data->id_thn_ajaran == "" ? 'selected' : '');?> ><?php echo $thn['thn_ajaran']?></option>
							  <?php endforeach;?>
							</select>
					    </div>
					</div>
				</div>
			  </div>
			  <div class="panel-footer">
			  
			  </div>
			</div>
		</form>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/tinymce/plugins/visualblocks/plugin.min.js"></script>
<script>
	baseurl = <?php echo json_encode(base_url()); ?>;
	tinymce.init({
		selector: "textarea.tinymce",
		theme: "modern",
		plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor importcss"
		],
		external_plugins: {
			//"moxiemanager": "/moxiemanager-php/plugin.js"
		},
		content_css: "assets/tinymce/css/development.css",
		add_unload_trigger: false,

		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table",

		image_advtab: true,

		style_formats: [
			{title: 'Bold text', format: 'h1'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		],

		template_replace_values : {
			username : "Jack Black"
		},

		template_preview_replace_values : {
			username : "Preview user name"
		},

		templates: [ 
			{title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'}, 
			{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'} 
		],

		setup: function(ed) {
			/*ed.on(
				'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
				'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
				'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
				console.log(e.type, e);
			});*/
		},

		spellchecker_callback: function(method, words, callback) {
			if (method == "spellcheck") {
				var suggestions = {};

				for (var i = 0; i < words.length; i++) {
					suggestions[words[i]] = ["First", "second"];
				}

				callback(suggestions);
			}
		}
	});
</script>
