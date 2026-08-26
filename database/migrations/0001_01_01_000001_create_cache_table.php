<?php

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
        $cacheTable = config('cache.stores.database.table', 'cache_brr_portal');
        if (!Schema::hasTable($cacheTable)) {
            Schema::create($cacheTable, function (Blueprint $table) {
                $table->string('key')->primary();
                $table->mediumText('value');
                $table->integer('expiration')->index();
            });
        }

        $lockTable = config('cache.stores.database.lock_table', 'cache_locks_brr_portal');
        if (!Schema::hasTable($lockTable)) {
            Schema::create($lockTable, function (Blueprint $table) {
                $table->string('key')->primary();
                $table->string('owner');
                $table->integer('expiration')->index();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('cache.stores.database.table', 'cache_brr_portal'));
        Schema::dropIfExists(config('cache.stores.database.lock_table', 'cache_locks_brr_portal'));
    }
};
