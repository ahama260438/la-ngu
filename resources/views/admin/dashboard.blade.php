@extends('layouts.app_admin')

@section('content')
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="menu-icon fa fa-tachometer"></i>
					<a href="#">{{$title}}</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<!-- ข้อมูล-->						
					<div class="infobox infobox-red infobox-larg infobox-dark">
						<div class="infobox-data" align="center">
							<div class="infobox-content"><strong>จำนวนผู้สมัครทั้งหมด</strong></div>
							<div class="infobox-content">{{$cont_all}} คน</div>
						</div>
					</div>
					<div class="infobox infobox-green infobox-larg infobox-dark">
						<div class="infobox-data">
							<div class="infobox-content"><strong>จำนวนผู้สมัคร ปวช</strong></div>
							<div class="infobox-content">{{$cont_vc}} คน</div>
						</div>
					</div>
					<div class="infobox infobox-blue infobox-larg infobox-dark">
						<div class="infobox-data">
							<div class="infobox-content"><strong>จำนวนผู้สมัคร ปวส</strong></div>
							<div class="infobox-content">{{$cont_hvc}} คน</div>
						</div>
					</div>
					
					<!-- จบข้อมูล-->
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
@endsection
