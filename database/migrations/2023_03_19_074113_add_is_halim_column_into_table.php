<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
           $table->boolean('is_active')->default(false)->after('id');
           $table->softDeletes()->after('is_publish'); // add softDelete()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // drop column parmanently
            $table->dropColumn('is_active');
            $table->softDeletes(); // delete softDelete() column if exist then create.
        });
    }
};
