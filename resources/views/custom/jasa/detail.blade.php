<?php
extract($var);
$proses_list= App\Models\Jasa\Proses::all()->pluck('nama','id');
$project_flow_list= App\Models\Jasa\Project_flow::all()->pluck('nama','id');
$jadwal_list  = App\Models\Jasa\Project_flow::Jadwal()->get();
$link_komplain=cek_alamat("komplain.create");
$link_edit=cek_alamat("project.detail.edit");
$link_schedule=cek_alamat("schedule.edit");
$dataModel=$parent;

?>

@extends('tafio::layouts.main')
@section('main')
@include('custom.jasa.header')
@include('tafio::_partial.flash_message')
@include('tafio::errors.form_error_list')
<div class="container-fluid r-aside">
	@include('custom.jasa.card_order')
	@include('custom.jasa.card_jadwal')
	<div class=row>
		<div class="col-md-5">
			@include('custom.jasa.card_pengiriman')
			@can('aksesku','kurir/show')
				@include('custom.jasa.card_hasil_pengiriman')
			@endcan
			@endcomponent
		</div>
		<div class='col-md-7'>
			@include('core.chat',['table_name'=>'project','table_id'=>$dataModel->id])
		</div>
	</div>
</div>
</div>
@stop
