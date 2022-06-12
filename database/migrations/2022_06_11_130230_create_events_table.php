<?php

use App\Domains\Event\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('code')->index();
            $table->string('name', 100);
            $table->json('venue')->nullable();
            $table->boolean('is_online');
            $table->string('link', 255)->nullable();
            $table->dateTime('start_time')->index();
            $table->dateTime('end_time')->index();
            $table->unsignedTinyInteger('status')->default(Status::UPCOMING->value)->index();
            $table->boolean('is_private');
            $table->string('time_zone', 25);
            $table->string('description', 1000)->nullable();
            $table->unsignedTinyInteger('created_by');
            $table->unsignedTinyInteger('event_in_charge')->nullable();
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
        Schema::dropIfExists('events');
    }
};
