@component('tafio::widgets.card')
  <table class="table" style='margin-top:-20px;margin-bottom:-10px'>
    <thead>
      <tr>
        <th> barang</th>
        <th>tema</th>
        <th>jml</th>
        <th><div align=right>harga</div></th>
        <th ><span class=pull-right>sub total</th>
        <th>spesifikasi</th>
        <th ><span class=pull-right>status</th>
        <th ><span class=pull-right>pj</th>
        <th><div align=center>gbr</div></th>
        <th><div align=center>deadline</div></th>
			</tr>
		</thead>
		<tbody>
			@foreach($dataModel->project_detail as $item)
              <tr>
                <td>
                  <?php
										if(!empty($item->project_komplain)){
											$label_sukses='fa-exclamation';
											$buttonx="btn-danger";
											// $url='komplain/'.$item->project_komplain->id;
											$url='komplain/'.$item->project_komplain->id;
										}
										else{
											$label_sukses='fa-check';
											$buttonx="btn-success";
											$url='komplain/create?project_detail_id='.$item->id;
										}
                  ?>
@php
$button_komplain="<button type='button' class='btn ".$buttonx."  btn-xs btn-rounded'><i class='fa ".$label_sukses."'></i></button>";
if($link_komplain)
   echo link_biasa($url,$button_komplain,'','popup');
else echo $button_komplain;
@endphp

@if($link_edit)
	{!! link_biasa('project/' . $dataModel->id . '/detail/' . $item->id . '/edit', $item->produk->nama) !!}
@else {{$item->produk->nama}}
@endif
                </td>
                <td><small>  {{  $item->tema }} </td>
                <td align=right>  <small>{{  $item->jumlah }} </td>
                <td align=right> <small> {!!  uang($item->harga)  !!} </td>
                <td align=right>  <small>{!!  uang($item->harga*$item->jumlah)  !!} </td>
                <td><small>
									{!!$item->spesifikasi!!}
									@if(!empty($item->keterangan))
										<span class='text-danger'>   keterangan lainnya:</span> {{$item->keterangan}}
									@endif
                <td align=right><small>
                    @if($link_edit)
                      {!! form_open(['method' => 'PATCH', 'url' => 'project/' .$dataModel->id.'/detail/'.$item->id]) !!}
                      {!! Form::select('project_flow_id', $project_flow_list,$item->project_flow_id, array('onchange' => 'this.form.submit()')) !!}
                      {!! Form::close() !!}
                    @else {{$item->project_flow->nama}}
                    @endif
                  <td>
                    <?php if(!empty($item->pj->pegawai)) echo $item->pj->pegawai->nama?>
                  <td align=center>
@include('core.gambar',['nama_tabel'=>'order','id'=>$item->id, 'nama_model'=>'project_detail', 'nama_file'=>$item->picture ? $item->picture : 'tidak ada', 'nama_field'=>'picture'])
<td><small>

@php
$isi=!empty($item->deadline)?$item->deadline->format('d/m/Y'):'blm';
if($link_schedule)
echo link_biasa('schedule/'.$item->id.'/edit',$isi);
else
echo $isi;
@endphp

                  </tr>

                @endforeach

              </tbody>

            </table>


          @endcomponent
