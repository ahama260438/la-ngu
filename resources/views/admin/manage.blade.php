@extends('layouts.app_admin')

@section('content')
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="menu-icon fa fa-list-alt"></i>
					<a href="#">{{$title}}</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					@if(session()->has('message'))
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>{{session()->get('message') }}</strong>
					</div>
					@endif
					<!-- ข้อมูล-->	
					<a class="btn btn-primary btn-sm" href="#modal-add" role="button" data-toggle="modal">เพิ่มข้อมูล</a>				
					<div class="col-xs-12">
						
						<br>

						<div class="table-header">
							จัดการข้อมูลผู้สมัคร
						</div>

						<!-- div.table-responsive -->
						
						<!-- div.dataTables_borderWrap -->
						<div class="table-responsive">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead> 
									<tr>
										<th width="10" align="center">ลำดับ</th>
										<th>วันที่สมัคร</th>
										<th>ชื่อ-สกุล</th>
										<th>ระดับชั้น</th>
										<th>จบจาก</th>
										<th>แผนก</th>
										<th width="15%" >จัดการ</th>
									</tr>
								</thead>
								<tbody>
									@if(count($data)>0)
									@foreach($data as $i =>$row)
									<tr>
										<td align="center">{{$i+1}}</td>
										<td>{{$row->created_at->format('d/m/Y')}}</td>
										<td>{{$row->title}}{{$row->name}} {{$row->lastname}}</td>
										<td>{{$row->type}}</td>
										<td>{{$row->school}}</td>
										<td>{{$row->department}}</td>
										<td align="center"><button class="btn btn-danger btn-sm" onclick="del('{{$row->id}}')" ><i class="ace-icon fa fa-trash-o fa-2x icon-only"></i>
										</button>
										<a class="btn btn-info btn-sm edit"  id="{{$row->id}}" href="#modal-update" role="button" data-toggle="modal"><i class="fa fa-pencil fa-2x icon-only"></i>
										</a>

									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="6" style="text-align:center; height:40px; background-color:#FFFFCC;"> ไม่มีข้อมูล</td>
								</tr>

								@endif
							</tbody>
						</table>							
					</div>
				</div>
				<!-- จบข้อมูล-->
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<!-- /.modal add -->
<div id="modal-add" class="modal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">เพิ่มข้อมูลผู้สมัคร</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">

						<form method="post" id="register_form" action="{{action('AdminController@add')}}">
							{{csrf_field()}}
							<div class="form-group col-md-12" align="center">
								<label class="radio-inline"><input type="radio" name="type" value="ปวช" required="">ปวช</label>
								<label class="radio-inline"><input type="radio" name="type" value="ปวส" required="">ปวส</label>
							</div>
							<div class="form-group col-md-3">
								<input class="form-control" type="text" name="title" placeholder="คำนำหน้าชื่อ" required="">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" name="name" placeholder="ชื่อ" required="">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" name="lastname" placeholder="นามสกุล" required="">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" name="school" placeholder="จบจาก" required="">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" name="department" placeholder="แผนก" required="">
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-primary" type="submit" name="submit" value="add">
						<i class="ace-icon fa fa-check"></i>
						Save
					</button>
					<button class="btn btn-sm" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Cancel
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.end modaladd -->

<!-- /.modal update -->
<div id="modal-update" class="modal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">แก้ไขข้อมูลผู้สมัคร</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">

						<form method="post" action="{{action('AdminController@update')}}">
							{{csrf_field()}}
							<div class="form-group col-md-12" align="center">
								<label class="radio-inline"><input type="radio" name="type" id="vc" value="ปวช" required="">ปวช</label>
								<label class="radio-inline"><input type="radio" name="type" id="hvc" value="ปวส" required="">ปวส</label>
							</div>
							<div class="form-group col-md-3">
								<input class="form-control" type="text" id="title" name="title">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" id="name" name="name">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" name="lastname" id="lastname">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" name="school" id="school" required="">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" name="department" id="department" required="">
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_user" id="id_user">
					<button class="btn btn-sm btn-primary" type="submit" name="submit" value="add">
						<i class="ace-icon fa fa-check"></i>
						update
					</button>
					<button class="btn btn-sm" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Cancel
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.end modaladd -->
<script type="text/javascript">
	function del(id){
		var txt;
		var r = confirm("คุณแน่ใจว่าต้องการลบข้อมูลนี้ !");
		if (r == true) {
			//console.log(id);
			$.ajax({
				url:"{{route('admin.delete')}}",
				mehtod:"get",
				data:{id:id},
				success:function(data)
				{
					alert(data);
					location.reload();
				}
			})
		} else {
			return false;
		}
	}

</script>

<script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='{{asset('assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>
<script src="{{asset('assets/js/jquery.colorbox.min.js')}}"></script>

<script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
<script src="{{asset('assets/js/ace.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.select.min.js')}}"></script>

<script type="text/javascript">
	jQuery(function($) {
		$(document).on('click', '.edit', function(){
			var id = $(this).attr("id");
			$('#form_output').html('');
			$.ajax({
				url:"{{route('admin.fetchdata')}}",
				method:'get',
				data:{id:id},
				dataType:'json',
				success:function(data)
				{
					//console.log(data);
					$('#title').val(data.title);
					$('#name').val(data.name);
					$('#lastname').val(data.lastname);
					$('#school').val(data.school);
					$('#department').val(data.department);
					$('#id_user').val(data.id);
					if (data.type=='ปวช') {
						$("#vc").prop("checked", true);
					}else{
						$("#hvc").prop("checked", true);
					}
				}
			})
		});

				// //initiate dataTables plugin
				var myTable = $('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					{ "bSortable": false },
					null,null, null,null,null,
					{ "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			        
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					
					"iDisplayLength": 25,
					
					
					select: {
						style: 'multi'
					}
				} );
				
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					{
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					},
					{
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					}		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});


				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {

					defaultColvisAction(e, dt, button, config);


					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});

				////
				
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);





				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );




				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});



				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});



				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});



				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
					
					var off2 = $source.offset();
					//var w2 = $source.width();
					
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}




				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/





				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
				
				
			})
		</script>

		@endsection
