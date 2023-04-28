<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->string('employee');
      $table->string('passport_type');
      $table->string('passport_num');
      $table->date('issue_date');
      $table->date('expiry_date');
      $table->longText('comment');
      // $table->string('title');
      // $table->string('category');
      // $table->longText('content');
      $table->string('image');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('posts');
  }
}

