<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public $nama_tabel="mahasiswas";
    public function up()
    {
        Schema::create($this->nama_tabel, function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('nama');
            $table->timestamps();
        });
        Schema::table($this->nama_tabel, function (Blueprint $table)
        {
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
        Schema::table($this->nama_tabel, function (Blueprint $table)
        {
            $table->dropForeign(['company_id']);
        });
        Schema::dropIfExists($this->nama_tabel);
    }
};
