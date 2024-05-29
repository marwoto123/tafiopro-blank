@php

$ar=Auth::user()->pegawai->ar->kode??'semua';
        $list_ar=$project_list=App\Models\Sdm\Ar::pluck('kode','kode');
        $list_ar['semua']='semua';
        $project_list   = App\Models\Jasa\Project_flow::Grup('produksi')->get();

@endphp
@section('main')
    <div id="app">

@component('tafio::core.header')
Produksi
 {!! panah() !!}
Dashboard

@slot('kanan')

  <div class='pull-right m-r-20'>

    {!! cek_button_tambah('klien',null,'tambah order')!!}
  </div>

  <div class='pull-right m-r-20'>

  <div class="input-group"> <span class="input-group-addon" id="basic-addon2">AR</span>



{!! form_select(['nama'=>'ar','options'=>$list_ar,'nolabel'=>true,'tambahan'=>['v-model'=>'ar']]) !!}


</div>
</div>

@endslot


@endcomponent


<div class="container-fluid r-aside">


 <div class="row"><div class="col-md-6">
<?php $i=0;?>

@foreach($project_list as $project_flow)

<?php
$i++;
if($i==5)
echo"</div><div class=col-md-6>";

?>
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
        </div> <!-- / #project -->


        </div> <!-- / #project -->


{!!script_ar($list_ar,$ar)!!}

@stop
