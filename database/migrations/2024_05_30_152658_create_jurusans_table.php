
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public $nama_tabel = "jurusans";
    public function up()
    {
        Schema::create($this->nama_tabel, function (Blueprint $table) {
            $table->id();
            $table->string('jurusan');
            $table->unsignedBigInteger('company_id')->nullable();
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
