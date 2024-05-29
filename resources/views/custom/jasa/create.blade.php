@if(!empty($_GET['klien']))
<input type=hidden name=klien_id value={{$_GET['klien']}}>
@endif

<div id=app>


<div class='row isian form-group'>
    <label  class='control-label col-md-4 text-right'>produk</label>


<?php if(empty($dataModel)){?>
<v-select class='col-md-8' style='width:500px;'  label="id_supplier" :filterable="false"
 :options="options" @search="onSearch"  v-model="produk">
@include('core.component.vselect_template')
   </v-select>
   <input type=hidden name=produk_id v-model=produk.id>
<?php
}
else
  echo $dataModel->produk->nama;

 ?>
  </div>

 <div v-show='produk.id'>


{!! form_text(['nama'=>'tema'])!!}
 {!! form_number(['nama'=>'jumlah','tambahan'=>['v-model'=>'jumlah']])!!}
 {!! form_number(['nama'=>'harga','tambahan'=>['v-model'=>'harga']])!!}
 <div v-show='jumlah && harga'>
 {!! form_date(['nama'=>'deadline'])!!}
<div class=row>
<div class='col-md-4'></div><h3 class='col-md-8'>spesifikasi</h3></div>
<div v-for="spek in produk.spek">

   {{-- @{{spek.nama_spek}} --}}


<div class='isian form-group row' v-if='spek.id_spek'>
    <label  class='control-label col-md-4 text-right'>@{{spek.nama_spek}}</label>
<input type=text :name="'spesifikasi['+ spek.id_spek + ']'" class='form-control col-md-8'>

 </div>


</div>

{!! form_text(['nama'=>'keterangan','label'=>'keterangan lainnya'])!!}
</div>

</div>
</div>
  	<script src="{{ asset('js/vue-select-2.4.js') }}"></script>
    <script src="{{ asset('js/lodash-4.17.4.min.js') }}"></script>

<script >Vue.component("v-select", VueSelect.VueSelect);

new Vue({
  el: "#app",
  data: {
    options: [],
<?php if(empty($dataModel)){?>
    harga:'',
    jumlah:'',
    spesifikasi:[],
  produk:{id:'',nama:''},
  <?php
}
else {?>
    harga:{{$dataModel->harga}},
    jumlah:{{$dataModel->jumlah}},
    spesifikasi:[],
  produk:{id:{{$dataModel->produk_id}},nama:''},
<?php
}
?>

  },
  methods: {

    onSearch: function (search, loading) {
      loading(true);
      this.search(loading, search, this);
    },
    search: _.debounce(function (loading, search, vm) {
      fetch("{{url('autocomplete/produk2')}}?q=" + escape(search)).then(function (res) {
        res.json().then(function (json) {
          return vm.options = json.items;
        });
        loading(false);
      });
    }, 350),
    },

});
</script>
