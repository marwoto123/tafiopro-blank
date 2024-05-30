
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public $nama_tabel = "mahasiswas";
    public function up()
    {
        Schema::create($this->nama_tabel, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('nama');
            // $table->string('jurusan_id');
            $table->unsignedBigInteger('jurusan_id');
          
            $table->timestamps();
        });
        Schema::table($this->nama_tabel, function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('core_companies')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->nama_tabel, function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });
        Schema::dropIfExists($this->nama_tabel);
    }
};
