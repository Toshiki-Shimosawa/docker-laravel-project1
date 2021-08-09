<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentDetailsTable extends Migration
{
    protected $set_schema_table = 'content_details';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) {
            return;
        }

        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->id();
            $table->string('title')
            ->nullable();
            $table->string('description')
            ->nullable();
            $table->unsignedInteger('parent_id')
            ->nullable();
            $table->unsignedInteger('category_id')
            ->nullable();
            $table->string('img_path')
            ->nullable();

            $table->foreign('parent_id')
            ->references('id')
            ->on('contents')
            ->OnDelete('cascade');

            $table->foreign('category_id')
            ->references('id')
            ->on('content_categories')
            ->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
