
<script src="{{ asset('js/google_chart.js') }}"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {

    var container = document.getElementById('grafik');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Position' });
    dataTable.addColumn({ type: 'string', id: 'Name' });
    dataTable.addColumn({ type: 'date', id: 'Start' });
    dataTable.addColumn({ type: 'date', id: 'End' });
    dataTable.addRows([

@php
$yy=0;
$i=0;
foreach($dataModel->project_detail as $item)
{
if(!empty($item->deadline))
{
$i++;
$yy=1;
$pertama=$dataModel->created_at;
$namax=$i.'. '.$item->produk->nama." ".$item->tema;
foreach($item->schedule as $schedule)
{
$deadline=$schedule->pivot->deadline;
echo"['".$namax."','".$schedule->nama."',new Date(".$pertama->format('Y,m-1,d')."), new Date(".$deadline->format('Y,m-1,d').")],";
$pertama=$deadline;
}
echo"['".$namax."','deadline',new Date(".$pertama->format('Y,m-1,d')."), new Date(".$item->deadline->format('Y,m-1,d').")],";
}
}

@endphp

    ]);
    chart.draw(dataTable);
  }
</script>

@if($yy==1)
<div id="grafik" style='margin-bottom:-70px;margin-top:-10px'></div>
@endif
