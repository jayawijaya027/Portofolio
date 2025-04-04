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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('programming_language')->after('description');
            $table->string('database')->after('programming_language');
            $table->string('frontend')->after('database');
            $table->string('backend')->after('frontend');
            $table->string('additional_features')->nullable()->after('backend');
            $table->dropColumn('technologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('technologies');
            //
        });
    }
};
