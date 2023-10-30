<?php namespace App\ArrivalHook\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddNewFields extends Migration
{
    public function up()
    {
        Schema::table('app_arrival_arrivals', function (Blueprint $table) {
            $table->boolean('Dog')->nullable();
        });
    }

    public function down()
{
    Schema::table('app_arrival_arrivals', function($table) {
        $table->dropColumn([
            'Dog'
        ]);
    });
} 

}
