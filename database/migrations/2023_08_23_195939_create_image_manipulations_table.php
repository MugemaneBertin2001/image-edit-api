<?php

use App\Models\User;
use App\Models\Album;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageManipulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_manipulations', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('path',2000);
            $table->string('type',25);
            $table->text('data');
            $table->string('output_path');
            $table->timestamp('created_at');
            $table->foreignIdFor(User::class,'user_id');
            $table->foreignIdFor(Album::class,'album_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_manipulations');
    }
}
