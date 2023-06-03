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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_header_logo')->nullable();
            $table->string('site_footer_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_email')->nullable();
            $table->text('site_description')->nullable();
            $table->text('site_keywords')->nullable();
            $table->string('site_url')->nullable();
            $table->enum('site_currency', ['USD', 'CAD', 'AUD', 'GBP', 'EUR', 'AED'])->default('USD');
            $table->string('site_address')->nullable();
            $table->string('site_postcode')->nullable();      
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
        Schema::dropIfExists('site_settings');
    }
};
