<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keyword')->unique();
            $table->string('description')->nullable();
            $table->enum('type', ['blank', 'custom', 'employeeInfo', 'currentDate', 'autoId', 'lastUsed']);
            $table->string('default_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents_keywords');
    }
}
