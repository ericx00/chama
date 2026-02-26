<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->decimal('interest_rate', 5, 2)->default(0);
            $table->enum('status', ['pending', 'approved', 'rejected', 'fully_repaid'])->default('pending');
            $table->dateTime('approved_date')->nullable();
            $table->text('approval_notes')->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('balance_remaining', 10, 2)->nullable();
            $table->timestamps();
            $table->index(['member_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
