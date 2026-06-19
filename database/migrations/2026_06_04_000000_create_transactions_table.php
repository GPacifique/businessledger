<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
      Schema::create('transactions', function (Blueprint $table) {
    $table->id();

    $table->string('transaction_number')->unique();

    $table->foreignId('account_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('transaction_category_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->enum('type', [
        'income',
        'expense',
        'transfer'
    ]);

    $table->decimal('amount', 15, 2);

    $table->date('transaction_date');

    $table->text('description')->nullable();

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
