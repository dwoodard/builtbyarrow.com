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
        Schema::table('photos', function (Blueprint $table) {
            if (! Schema::hasColumn('photos', 'album_id')) {
                $table->foreignId('album_id')->nullable()->after('category_id')->constrained('albums')->nullOnDelete();
            }
            if (! Schema::hasIndex('photos', 'photos_album_id_index')) {
                $table->index('album_id');
            }
            if (! Schema::hasIndex('photos', 'photos_album_id_foreign')) {
                $table->foreign('album_id')->references('id')->on('albums')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['album_id']);
            $table->dropIndex(['album_id']);
            $table->dropColumn('album_id');
        });
    }
};
