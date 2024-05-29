@php

        $ar_user=Auth::user()->pegawai->ar->kode??'semua';
        $list_ar=App\Models\Sdm\Ar::pluck('kode','kode');
        $list_ar['semua']='semua';
        $project_list   = App\Models\Jasa\Project_flow::Grup('marketing')->get();
        $terdaftar = App\Models\Marketing\Project_marketing::whereNotNull('klien_id')->where('status','<>','batal')->where('status','<>','order')->orderBy('id','desc')->get();
@endphp

@extends('tafio::layouts.main')

@section('main')
    <div id="app">

@component('tafio::core.header')
Marketing
 {!! panah() !!}
 dashboard
@slot('kanan')


  <div class='pull-right m-r-20'>

    {!! cek_button_tambah('followup',null,'tambah marketing')!!}
  </div>

  <div class='pull-right m-r-20'>

  <div class="input-group"> <span class="input-group-addon" id="basic-addon2">AR</span>

{!! form_select(['nama'=>'ar','options'=>$list_ar,'nolabel'=>true,'tambahan'=>['v-model'=>'ar']]) !!}
</div>
</div>


 @endslot
@endcomponent

<div class="container-fluid r-aside">



 <div class="row"> <div class="col-md-6">


        <h3>Marketing</h3>



@component('tafio::widgets.card2')

@foreach($terdaftar as $item)

<?php
$ar=$item->klien->ar;

$id_ar='kosong';
if(!empty($ar))
$id_ar=$ar->kode;
$content="<p class='text-success pull-left'>".(!empty($item->klien)?$item->klien->perusahaanar:'')."</p> &nbsp;<span class='text-info'>".substr($item->pertanyaan,0,30)."</span><div class=pull-right>".jadwal($item->followup_next)." </div>";
echo link_biasa('marketing/'.$item->id,$content," v-show='".$id_ar."' ",'popup')

?>
@endforeach
@endcomponent

</div>

<div class=col-md-6>
        <h3>Order</h3>

@foreach($project_list as $project_flow)

@component('tafio::widgets.card2')
   @slot('judul')
   {{$project_flow->nama}}
   @endslot

@if($project_flow->project_detail)
{!! grouping($project_flow->project_detail->sortByDesc('id'))!!}
@endif
@endcomponent

@endforeach
</div> <!-- / #project -->

    </div> <!-- / #project -->
    </div> <!-- / #project -->


    </div> <!-- / #project -->

{!!script_ar($list_ar,$ar_user)!!}


@stop
