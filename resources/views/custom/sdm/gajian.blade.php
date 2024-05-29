<div id=app><?php

echo form_label(['label'=>'periode','isi'=>$periode]);
echo form_label(['label'=>'nama','isi'=>$parent->nama]);
echo form_label(['label'=>'bagian','isi'=>$gaji->bagian->nama]);
echo form_label(['label'=>'level','isi'=>$gaji->level->nama]);
echo form_label(['label'=>'gaji pokok','isi'=>$pokok]);
echo form_label(['label'=>'tunjangan laman kerja','isi'=>$lama_kerja]);
echo form_label(['label'=>'tunjangan bagian','isi'=>$bagian]);
echo form_label(['label'=>'tunjangan performance','isi'=>$performance]);
echo form_label(['label'=>'tunjangan transportasi','isi'=>$transportasi]);
echo form_label(['label'=>'tunjangan komunikasi','isi'=>$komunikasi]);
echo form_label(['label'=>'tunjangan lain2','isi'=>$lain2]);
echo form_label(['label'=>'nilai tunjagan lain2','isi'=>$jumlah_lain2]);
echo form_label(['label'=>'lembur','isi'=>$jam_lembur.' jam']);
echo form_label(['label'=>'tunjangan lembur','isi'=>$lembur]);
echo form_number(['nama'=>'kehadiran','label'=>'tunjangan kehadiran','tambahan'=>['v-model.number'=>'kehadiran']]);
echo form_number(['nama'=>'kasbon','label'=>'potong kasbon','tambahan'=>['v-model.number'=>'kasbon']]);
echo form_number(['nama'=>'bonus','tambahan'=>['v-model.number'=>'bonus']]);
echo form_number(['nama'=>'potongan','tambahan'=>['v-model.number'=>'potongan']]);
echo form_label(['label'=>'total','isi'=>'{{total}}']);
$options=App\Models\Keuangan\Akundetil::kas()->pluck('nama','id');
echo form_select(['nama'=>'akundetil_id','options'=>$options,'label'=>'dibayar dari kas' ]);

?>
</div>
<script >
new Vue({

  el: "#app",
  data: {
		kehadiran:'',
    bonus:'',
    kasbon:'',
    potongan:'',
  },
	computed:{

total:function()
{
hasilx={{$total}}+this.kehadiran+this.bonus-this.kasbon-this.potongan
return hasilx
}}
});

</script>
