<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table): void {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->integer('weight');
            $table->integer('systolic');
            $table->integer('diastolic');
            $table->integer('pulse');
            $table->date('date');
            $table->time('time');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }
};
