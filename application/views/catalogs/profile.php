<!DOCTYPE html>
<html>
	<?php $this->load->view("commons/head");?>
	<link rel="stylesheet" href="<?php echo baseurl();?>assets/padi/plugins/datepicker/datepicker3.css" />
	<script type="text/javascript" src="<?php echo baseurl();?>assets/padilibs/padi.imagelib.js"></script>	
	<script src="<?php echo baseurl()?>assets/niceedit/nicEdit.js" type="text/javascript"></script>
	<script type="text/javascript">
		uploadImage = function(evt){
		  var input = evt.target;
		  var fileReader = new FileReader();
		  fileReader.onloadend = function(){
			  $("body").css("cursor","wait");
				resizeImage(fileReader.result,function(uri){
					$("#picture").attr("src",uri);
					$("body").css("cursor","default");
				});
		  }
		  fileReader.readAsDataURL(input.files[0]);
		}
		bkLib.onDomLoaded(function() {
			nicEditors.allTextAreas({
				uploadURI : '<?php echo baseurl();?>nicUpload/do_upload', 
				buttonList : ['bold','italic','underline','upload'], 
				iconsPath:'<?php echo baseurl(); ?>assets/niceedit/nicEditorIcons.gif'
			});
		}); 

	</script>	
  <body class="skin-blue">
    <div class="wrapper">
      <?php $this->load->view("commons/header");?>
      <?php $this->load->view("catalogs/dialogs");?>
      <!-- Left side column. contains the logo and sidebar -->
	<?php $this->load->view("commons/sidebar");?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Produk
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Catalog</a></li>
            <li class="active">Edit Produk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<input id="catalogId" type="hidden" value="<?php echo $obj->id;?>" />
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $obj->name?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
						<img id="picture" src="<?php echo $obj->image;?>" width="300px" height="400px">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile" id="pilih_gambar">File input</label>
                      <div id="status"></div>
                      <input type="file" id="addImage" onchange="uploadImage(event)"/>
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->



              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Produk terkait</h3>
                  
                  
                  
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">

				<button class="btn btn-block btn-default btn-lg" id="btnAddRelatedProduct">Tambahkan Produk Terkait</button>
                  <table id="tCatalog" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="40%">Nama</th>
                        <th width="25%">Keterangan</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach($relateds as $rel){?>
                      <tr trid="<?php echo $rel["id"];?>">
                        <td class="tname"><?php echo $rel["name"];?></td>
                        <td><?php echo $rel["description"];?></td>
                        <td>Hapus</td>
                      </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th width="40%">Nama</th>
                        <th width="25%">Keterangan</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </tfoot>
                  </table>

                  </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            
            




            
            
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Data Produk</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" placeholder="Nama ..." id="name" value="<?php echo $obj->name;?>"/>
                    </div>
                    <div class="form-group">
                      <label>Harga Beli</label>
                      <input type="text" class="form-control" placeholder="Harga Beli ..." id="buyprice" value="<?php echo $obj->sellprice;?>"/>
                    </div>
                    <div class="form-group">
                      <label>Harga Jual</label>
                      <input type="text" class="form-control" placeholder="Harga Jual ..." id="sellprice" value="<?php echo $obj->sellprice;?>"/>
                    </div>
                    <div class="form-group">
                      <label>Harga Hapus</label>
                      <input type="text" class="form-control" placeholder="Harga Hapus ..." id="dellprice" value="<?php echo $obj->sellprice;?>"/>
                    </div>
                    <div class="form-group">
                      <label>Tampilkan di depan</label>
                      <?php echo form_dropdown("showinfront",array("1"=>"Ya","0"=>"Tidak"),$obj->showinfront,"id='showinfront'");?>
                    </div>
                    <div class="form-group">
                      <label>Tampilkan di depan (exhibit)</label>
                      <?php echo form_dropdown("exhibit",array("1"=>"Ya","0"=>"Tidak"),$obj->exhibit,"id='exhibit'");?>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..." id="description"><?php echo $obj->description?></textarea>
                    </div>
                  <div class="box-footer">
                    <div  id="saveCatalog" class="btn btn-primary">Simpan</div>
                  </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php $this->load->view("commons/pagefooter");?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url()?>assets/padi/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url()?>assets/padi/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url()?>assets/padi/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>assets/padi/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/padi/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script type="text/javascript">
		(function($){
			var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
			addTrailingZero = function(pnumber){
				var out;
				for(var i=pnumber.toString().length;i<=2;i++){
					out = '0'+pnumber.toString();
				}
				return out;
			}
			$.fn.initDateBox = function($option){
				console.log("init datebox fired");
				var that = $(this),
					arr = $(this).val().split(" "),
					out = arr[2]+"-"+addTrailingZero(months.indexOf(arr[1])+1)+"-"+arr[0];
				that.attr("dValue",out);
				return that;
			};
			$.fn.dateVal = function($option){
				$settings = $.extend({
					srcFormat:"dd MM yyyy",
					outFormat:"yyyy-mm-dd"
				});
				var that = $(this),
					arr = $(this).val().split(" "),
					out = arr[2]+"-"+addTrailingZero(months.indexOf(arr[1])+1)+"-"+arr[0];
					that.attr("dValue",out);
			}
			$("#bday").datepicker({
				format:"dd MM yyyy",
				autoclose:true
			})
			.on("changeDate",function(){
				$(this).dateVal();
			})
			.on("show",function(){
				console.log("Datepicker fired");
			});//.initDateBox();
			$("#saveCatalog").click(function(){
				console.log("save catalog");
				$.ajax({
					url:"<?php echo base_url();?>catalogs/update",
					data:{
						id:$("#catalogId").val(),
						name:$("#name").val(),
						sellprice:$("#sellprice").val(),
						dellprice:$("#dellprice").val(),
						buyprice:$("#buyprice").val(),
						image:$("#picture").attr("src"),
						showinfront:$("#showinfront").val(),
						exhibit:$("#exhibit").val(),
						description:$("div.nicEdit-main").html()
					},
					type:"post"
				})
				.done(function(res){
					console.log("res",res);
					window.location.href = "<?php echo base_url();?>catalogs";
				})
				.fail(function(err){
					console.log("Err",err);
				});
			});
			$("#btnAddRelatedProduct").click(function(){
				console.log("Add Related Product clicked");
				$("#dAddRelated").modal();
			});
			$("#example1").dataTable();
		}(jQuery))
    </script>
  </body>
</html>
