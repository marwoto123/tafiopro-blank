<div id=app>
<table  id=table_belanja class=table >
<tr><th width=500>

	<div class="input-group"> <span class="input-group-addon" id="basic-addon2">supplier</span>
<v-select  style='width:500px;' label="id_supplier" :filterable="false"
 :options="options2" @search="onSearch2"  v-model="supplier">
@include('core.component.vselect_template')

   </v-select>
      <input type=hidden name=supplier_id v-model=supplier.id>
</div>
<th>
	<div class="input-group"> <span class="input-group-addon" id="basic-addon2">dari kas</span>
<?php
$options=App\Models\Keuangan\Akundetil::kas()->pluck('nama','id');
echo Form::select('akundetil_id',$options,null,['class'=>'form_control','placeholder'=>'pilih kas','v-model'=>'kas']) ;
?></div><th>


<input type="text" placeholder="nomer nota" class="form-control" name="nota" size="10" value="" />
<th>
</table>

<table  id=table_belanja width=1100 class=table v-show='supplier.id && kas'>

<tr><td><h4>no<td width=350><h4>nama barang<td><h4>keterangan</td><td><h4>satuan<td><h4>jumlah</td><td><h4>harga</td><td align=right><h4>sub total</td><td></tr>

<tr v-for="field in fields"><td>
@{{field.i}}

	<td width=283px>
<v-select label="barang" :filterable="false" v-model="field.hasil"
:options="options" @search="onSearch">
	@include('core.component.vselect_template')
              </v-select>
<input type="hidden" name="barang[]" v-model=field.hasil.id  />
<td>
<input type=text class=form-control name=keterangan[]  placeholder=keterangan  id=ket1 size=30  >
<td> @{{field.hasil.satuan}}
<td><input type=number class=form-control name=jumlah[]  v-model="field.jumlah" size=5 placeholder=jumlah>
<td width=150><input type=number class=form-control name=harga[]   v-model="field.harga" placeholder=harga>
<td align=right>
	@{{ field.harga*field.jumlah}}
<td></tr>
<tr><td><td><td><td>
  diskon<td width=125>
<input type=number class=form-control name=diskon   placeholder=diskon v-model="diskon">
    <td>total<td align=right> @{{total}}
 <input type="hidden" name="total" v-model='total'/>
<tr>
<td>
     <td><td><td><td><td colspan=2>
<div class="input-group-btn">
        <div class="btn btn-info  pull-right" @click="addrow()">tambah baris</div>
        <div class="btn btn-danger  pull-right" @click="deleterow()">hapus baris</div>

      </div>
  </table>
</div>
  <script src="{{ asset('js/vue-select-2.4.js') }}"></script>
    <script src="{{ asset('js/lodash-4.17.4.min.js') }}"></script>

<script >Vue.component("v-select", VueSelect.VueSelect);

new Vue({
  el: "#app",
  data: {
    options2: [],
		kas:'',
    fields: [{harga:'',jumlah:'',i:1,hasil:{satuan:''}}],
    supplier:{ id:'',nama:''} ,
    options: [],
		diskon:'',
		i:1,
  produk:{id:'',nama:''},
  },
  methods: {
        addrow: function(){
			this.i++;
      this.fields.push({harga:0,jumlah:0,i:this.i,hasil:{satuan:''}});
    },

    deleterow: function(){
			this.i--;
this.fields.pop();
    },

    onSearch2: function (search2, loading) {
      loading(true);
      this.search2(loading, search2, this);
    },
    search2: _.debounce(function (loading, search2, vm) {
      fetch("{{url('autocomplete/supplier')}}?q=" + escape(search2)).then(function (res) {
        res.json().then(function (json) {
          return vm.options2 = json.items;
        });
        loading(false);
      });
    }, 350),
    onSearch: function onSearch(search, loading) {
      loading(true);
      this.search(loading, search, this);
    },

    search: _.debounce(function (loading, search, vm) {
      fetch("{{url('autocomplete/barangbeli')}}?q=" + escape(search)).then(function (res) {
        res.json().then(function (json) {
          return vm.options = json.items;
        });
        loading(false);
      });
    }, 350),
  },

	computed:{

total:function()
{

var total=0;
  for (var i = 0; i < this.fields.length; i++)
total+= (this.fields[i].harga* this.fields[i].jumlah)?(this.fields[i].harga* this.fields[i].jumlah):0;

hasilx=this.diskon?(total-this.diskon):total

return hasilx
}
}
});
</script>
