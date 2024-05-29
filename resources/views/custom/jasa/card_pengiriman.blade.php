<?php $pengirimanx=array('diambil'=>'diambil','diantar'=>'diantar ke alamat','jasa'=>'pakai jasa pengiriman');
$invoicex=array('disertakan'=>'disertakan dengan barang','terpisah'=>'dikirim terpisah','email'=>'diemail','tidak'=>'tidak pakai');
?>

@component('tafio::widgets.card')

<div class=row>
  <div class='col-md-11'>
  <div class="d-flex" style='margin-top:-10px;margin-bottom:-10px'>
    <div class="display-6 text-info p-t-0"><i class="ti ti-truck"></i></div>
    <div class="m-l-20">

      <h3 class="m-b-0">pengiriman</h3>
      @if(!empty($dataModel->pengiriman))

        <h6>{{ $pengirimanx[$dataModel->pengiriman] }}</h6>
      @else
        <h6>tidak ada informasi</h6>
      @endif
      </div>
    </div>
  </div>
  <div class='col-md-1'>
    @if(cek_alamat('project.edit'))
    {!! button_edit('project/' . $dataModel->id . '/edit','bulat') !!}
  @endif
</div>
</div>

      @if(!empty($dataModel->pengiriman))
    <hr class='m-b-10 m-t-5'>


    <div class="row">


      @if(!empty($dataModel->invoice))
        <div class="col">
          <h6 class="m-b-0 font-medium">Invoice</h6>
          <small>{!! $invoicex[$dataModel->invoice] !!}</small>
        </div>
      @endif

      @if($dataModel->pengiriman=='diambil' or $dataModel->pengiriman=='diantar')


        <div class="col">
          <h6 class="m-b-0 font-medium">Pembayaran</h6>
        <small>{!! $dataModel->jenis_pembayaran !!}</small>
        </div>
      @else
        <div class="col">
          <h6 class="m-b-0 font-medium">Jasa pengiriman</h6>
        <small>{!! $dataModel->jasa !!}</small>
        </div>

        <div class="col">
          <h6 class="m-b-0 font-medium">Ongkir</h6>
        <small>{!! uang($dataModel->ongkir) !!}</small>
        </div>

      @endif

    </div>
    <hr class='m-b-10 m-t-5'>

    @if(!empty($dataModel->ket_kirim))

      <h6 class='font-medium'>  keterangan lainnya </h6>
    <small>    {!! $dataModel->ket_kirim !!} </small>
    @endif
@endif



@endcomponent
