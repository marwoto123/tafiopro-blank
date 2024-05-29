@component('tafio::widgets.card')

<div class='row m-b-10'>
  <div class='col-md-8'>
  <div class="d-flex" style='margin-bottom:-10px'>
    <div class="display-7 text-info m-t-10"><i class="ti ti-package"></i></div>
    <div class="m-l-10">

      <h3 class="m-t-5">hasil pengiriman</h3>
      </div>
    </div>
  </div>
  <div class='col-md-4'>
    @if(cek_alamat('project.pengiriman.create'))
    {!! button_tambah('project/' . $dataModel->id . '/pengiriman/create','bulat') !!}
  @endif
</div>
</div>

  <table class="table">

    @foreach($dataModel->project_kurir as $item)

      <tr>
        <td width=100px><small>{{$item->tanggal}}</small></td>


        <td class='m-t-10'><small>
  <a href="{{url('project/' . $dataModel->id . '/pengiriman/' . $item->id . '/edit')}}"  >

          <?php if(!empty($item->nomor))
          echo " <span class=text-danger>nomor:</span> ".$item->nomor;
           if(!empty($item->pengantar))
          echo " <span class=text-danger>pengantar:</span> ".$item->pengantar;
          if(!empty($item->jumlah))
          echo " <span class=text-danger>jumlah:</span> ".$item->jumlah;
          if(!empty($item->penerima))
          echo " <span class=text-danger>penerima:</span> ".$item->penerima;
          if(!empty($item->perkiraan))
          echo " <span class=text-danger>perkiraan sampai:</span> ".$item->perkiraan;

    if(!empty($item->keterangan))
          echo " <span class=text-danger>keterangan:</span> ".$item->keterangan;
?>
        </small></td>
      </tr>


    @endforeach


  </table>
