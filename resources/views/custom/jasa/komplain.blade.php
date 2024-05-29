<?php

extract($var);
$template='template_popup';
$hasil=$dataModel;
$disable_link=true;
?>
@extends(''.$template)
@section('main')

@component('header')
{!! $judulHalaman!!}
@slot('kanan')

@if(cek_auth($halaman,'edit'))
 {!! button_edit($alamat.'/'.$dataModel->id.'/edit',$fitur['tambah']['window']??'','')!!}


 @endif
 @endslot

@endcomponent

  @component('main')



        @component('card')

        @component('table_header')

            @endcomponent


    <table class="table-striped" data-toggle="table" >
<thead><tr><th><th></th></tr></thead>

@foreach($halaman->field->sortBy('urutan') as $field)

@if($field->nama!='no')
<tr><td>
{!!$field->judul??$field->nama!!}
  <td>
    <div align=right>
  @include('component.display')</div>
{{-- @include('component.listshow') --}}
</td></tr>
@endif
@endforeach
</table>
@endcomponent
@endcomponent


@stop
