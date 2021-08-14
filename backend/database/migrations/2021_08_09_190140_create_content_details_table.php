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
            $table->bigIncrements('id');
            $table->string('title')
            ->nullable();
            $table->string('description')
            ->nullable();
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('category_id')
            ->nullable();
            $table->string('img_path')
            ->nullable();
            $table->timestamps();

            $table->foreign('parent_id')
            ->references('id')
            ->on('contents')
            ->onDelete('cascade');

            $table->foreign('category_id')
            ->references('id')
            ->on('content_categories')
            ->onDelete('cascade');
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
