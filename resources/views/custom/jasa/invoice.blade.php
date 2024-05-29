<style type="text/css">
  body, a, table{
    color: black;
		text-decoration: none;
		font-family: tahoma;
		font-size:11px;
	}
	.tablex,.tablex th,.tablex td {
			border:1px solid #555555;
	}
	.tablex {
			border-bottom:0;
			border-left:0;
	}
	.tablex td,.tablex th {
			border-top:0;
			border-right:0;
	}
	#gambar_ttd{
	margin-top: -65px;
	}

	#stempel{
		background-image: url('{!!master_gambar('stempel')!!}');
		background-size: 110px;
		background-repeat: no-repeat;
		background-position: 0px 10px;
	}

</style>
<?php
	extract($var);
?>
<div  style="float:left"> {!!master('logo')!!}
</div>

<div style='float:right;margin-right:20px; '>
  <b>Office</b><br>
   {!!master('alamat')!!}
</div>


<div style='clear:both'></div>
<hr size=2px color=green>

<div  style="float:left;">
<b>konsumen</b>: {{$parent->klien->nama}}<br>
</div>
<div   style='float:right;margin-right:10px;'>
  <table border=0>
    <tr><td> <b>nomor invoice</b><td>:{{$parent->id}}
  <tr><td><b>tanggal</b><td>: {{$parent->created_at->format('d-m-Y')}}

  </table>
 </div>
 <div style='clear:both'></div>
 <br>
	 <table   cellpadding="3" cellspacing="0" width=100% class=tablex>
<tr>
<td>no
<td>nama barang
<td>keterangan
<td>jumlah
<td> harga
<td> sub total
<?php
		$subtotaly=0;

			$i = 0;
      foreach($parent->project_detail as $row)
			{


	if($row->status=="batal")
	{
continue;
  };

		$datastatusx="";
		$j=0;

	    $subtotal=$row->harga*$row->jumlah;

		  	$subtotalx=number_format($subtotal, 0, ',', '.');
				$hargax=number_format($row->harga, 0, ',', '.');
				$jumlahx=number_format($row->jumlah, 0, ',', '.');


		$subtotaly+=$subtotal;


		$nama_barang = $row->produk->nama;

				echo "<tr><td>".++$i."<td>".  $nama_barang."<td>".$row->tema."<td><div align=right>".$jumlahx."<td><div align=right>".$hargax."<td><div align=right>".$subtotalx;
			}
?>
</table><table  width=100% border=0  ><tr><td width=14% rowspan=6 align=center><br>

@if(!empty($_GET['ttd']))
<a href={!!url('project/'.$parent->id.'/invoice')!!}>
<div id=stempel>Hormat kami<br><br><br><br><br>(&nbsp;{{Auth::user()->pegawai->nama}}&nbsp;)</div>
<div id=gambar_ttd>
{{-- <img src="gambar/ttd/ttd-".$namax.".png width=90px> --}}
<img src='{!!gambar('ar',Auth::user()->pegawai->ar->id)!!}' width=110px>
</div>
</a>
@else
<a href={!!url('project/'.$parent->id.'/invoice?ttd=true')!!}>
Hormat kami<br><br><br><br><br>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
</a>
@endif
<td rowspan=6 width=3%> <td rowspan=6 width=60%><br>

{!! master('rekening')!!}

<td width=12%> <td width=3%> <td width=8%><div align=right>
<?php
if(!empty($parent->ongkir))
	echo"<tr><td>ongkir<td>:<td ><div align=right>".$parent->ongkir;
if(!empty($parent->diskon))
	echo"<tr><td>diskon<td>:<td ><div align=right>".$parent->diskon;
	echo"<tr><td>total<td>:<td ><div align=right>".$parent->total;
	echo"<tr><td>sudah dibayar<td>:<td ><div align=right>".$parent->bayar;
	echo"<tr><td>kekurangan<td>:<td ><div align=right>".(($parent->total)-($parent->bayar));
	echo"<tr><td><td><td></table>";
?>
