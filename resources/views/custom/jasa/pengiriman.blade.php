
 <div id=app2>
<div class="isian form-group row">

  	<label class='control-label col-md-4 text-right'><b>pengiriman:</b></label>
<div class='col-md-8'>

 {!! Form::radio('pengiriman', 'diambil',null,['v-model' => "pengiriman"]) !!} diambil  &nbsp;&nbsp;
 {!! Form::radio('pengiriman', 'diantar',null,['v-model' => "pengiriman"]) !!} diantar ke alamat  &nbsp;&nbsp;
 {!! Form::radio('pengiriman', 'jasa',null,['v-model' => "pengiriman"]) !!} pakai jasa pengiriman
	</div>
</div>

<div class="isian form-group row">
  <label class='control-label col-md-4 text-right'><b>invoice:</b></label>
  <div class='col-md-8'>

 {!! Form::radio('invoice', 'disertakan',null,['v-model' => "invoice"]) !!} disertakan dengan barang  &nbsp;&nbsp;
 {!! Form::radio('invoice', 'terpisah',null,['v-model' => "invoice"]) !!} dikirim terpisah  &nbsp;&nbsp;
 {!! Form::radio('invoice', 'email',null,['v-model' => "invoice"]) !!} diemail  &nbsp;&nbsp;
 {!! Form::radio('invoice', 'tidak',null,['v-model' => "invoice"]) !!} tidak pakai
</div>

</div>

	<div class="isian form-group row" v-show="pengiriman=='jasa'">
{!!Form::label('', 'jasa pengiriman:', ['class' => 'control-label col-md-4 text-right']) .
 Form::text('jasa', null, ['class' => 'form-control col-md-8'])!!}
	</div>

<div class="isian form-group row"  v-show="pengiriman=='jasa'">

{!!Form::label('', 'ongkir:', ['class' => 'control-label col-md-4 text-right']) .
 Form::number('ongkir',null, ['class' => 'form-control col-md-8'])!!}

</div>

<div class="isian form-group row "  v-show="pengiriman!='jasa'">
  	<label class="control-label col-md-4 text-right"><b>pembayaran:</b></label>
    <div class='col-md-8'>

 {!! Form::radio('jenis_pembayaran', 'cod','',['v-model' => "jenis_pembayaran"]) !!} cod  &nbsp;&nbsp;
 {!! Form::radio('jenis_pembayaran', 'transfer','',['v-model' => "jenis_pembayaran"]) !!} transfer
</div>
</div>
{!!form_textarea(['nama'=>'ket_kirim','label'=>'keterangan tambahan'])!!}

</div>
<script>
var app = new Vue({
  el: '#app2',
  data: {
    pengiriman:'{{$dataModel->pengiriman}}',
    jenis_pembayaran:'{{$dataModel->jenis_pembayaran}}',
    invoice:'{{$dataModel->invoice}}',
  }

})

</script>
