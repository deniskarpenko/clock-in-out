<?php

declare(strict_types=1);

use Deniskarpenko\Timeclock\Domain\Enums\PunchType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('punches', function (Blueprint $table): void {
            $table->id('punch_id');
            $table->enum('punch_type', PunchType::cases());
            $table->unsignedInteger('user_id');
            $table->foreignId('user_id')->constrained('users', 'user_id')
                ->onDelete('cascade')
            ;
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('punches');
    }
};
