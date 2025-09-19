<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ads_id')->constrained('ads')->onDelete('cascade'); // lie le commentaire au post
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // lie le commentaire à l'utilisateur
            $table->text('content'); // texte du commentaire
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
