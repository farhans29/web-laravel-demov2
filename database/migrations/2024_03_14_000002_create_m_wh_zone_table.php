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
        Schema::create('m_wh_zone', function (Blueprint $table) {
            $table->increments('idrec');
            $table->integer('id_warehouse');
            $table->string('name_wh');
            $table->string('name_zone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_wh_zone');
    }
};