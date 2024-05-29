
<div id='app'>

<?php
$project_detail=$dataModel;

		$projectflow_list=App\Models\Jasa\Project_flow::where('jadwal',1)->get();
$default=[];
$i=0;
foreach ($projectflow_list as $list) {


$namax=$list->id;
if($i==0)
$awal=$namax;
$i=1;

$schedule=$project_detail->schedule()->find($namax);


if(!empty($schedule))
{
	$deadline=$schedule->pivot->deadline;
	$default[$namax]=$deadline->format('Y-m-d');

	$default2=$deadline->format('G');
}
else
{
	$default[$namax]='';
	$default2='17';
}
$tambahan=array('v-model'=>'data_'.$namax,':min'=>'min_'.$namax,':max'=>"max_".$namax);

echo "<div class=row>
  <div class=col-md-6>".
form_date(['nama'=>"data_".$namax,'label'=>$list->nama,'tambahan'=>$tambahan])
."</div><div class=col-md-6>"


.form_select(['nama'=>'jam_'.$namax,'options'=>option_jam(),  'label'=>'jam','default'=>$default2])
."</div></div>";

}

$tambahan=array('v-model'=>'deadline',':min'=>"deadline_min");
echo "<div class=row>
  <div class=col-md-6>".
form_date(['nama'=>'deadline','tambahan'=>$tambahan])
  .
"</div><div class=col-md-6>"

.form_select(['nama'=>'jam_deadline','options'=>option_jam(), 'label'=>'jam','default'=>!empty($project_detail->deadline)?$project_detail->deadline->format('G'):'17'])

."</div></div>"
?>
      </div>

<script>
new Vue({
  el: '#app',
  data: {
    min_{{$awal}}:'{{$project_detail->project->created_at->format('Y-m-d')}}',

<?php
foreach($default as $nama=>$isi)
{
echo "data_".$nama.":'$isi',";

}
?>
    deadline:'{{!empty($project_detail->deadline)?$project_detail->deadline->format('Y-m-d'):''}}'


  },
   computed: {
<?php
$i=1;

foreach ($projectflow_list as $list) {

if ($i==1)
 $jadwal_sekarang=$list->id;


if($i>=2)
echo "max_".$jadwal_sekarang.": function () {return  this.data_".$list->id." ? this.data_".$list->id.": this.max_".$list->id."},";

if($i>=3)
echo "min_".$jadwal_sekarang.": function () {return  this.data_".$jadwal_sebelumnya." ? this.data_".$jadwal_sebelumnya.": this.min_".$jadwal_sebelumnya."},";

if($i>=2)
{
$jadwal_sebelumnya=$jadwal_sekarang;
$jadwal_sekarang=$list->id;
}

$i++;
 }

echo "max_".$jadwal_sekarang.": function () {return  this.deadline ? this.deadline: ''},";
echo "min_".$jadwal_sekarang.": function () {return  this.data_".$jadwal_sebelumnya." ? this.data_".$jadwal_sebelumnya.": this.min_".$jadwal_sebelumnya."},";
echo "deadline_min: function () {return  this.data_".$jadwal_sekarang." ? this.data_".$jadwal_sekarang.": this.min_".$jadwal_sekarang."},";

 ?>

  }
})

</script>
