<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 🔹 Update application_menus
        Schema::table('application_menus', function (Blueprint $table) {
            if (!Schema::hasColumn('application_menus', 'application_id')) {
                $table->foreignId('application_id')->nullable()->constrained('applications')->cascadeOnDelete()->after('id');
            }
            if (!Schema::hasColumn('application_menus', 'feature_id')) {
                $table->foreignId('feature_id')->nullable()->constrained('module_features')->cascadeOnDelete()->after('module_id');
            }
            if (!Schema::hasColumn('application_menus', 'icon')) {
                $table->string('icon')->nullable()->after('name');
            }
            if (!Schema::hasColumn('application_menus', 'url')) {
                $table->string('url')->nullable()->after('icon');
            }
            if (!Schema::hasColumn('application_menus', 'parent_id')) {
                $table->foreignId('parent_id')->nullable()->constrained('application_menus')->cascadeOnDelete()->after('url');
            }
        });

        // 🔹 Update module_feature_action_methods
        Schema::table('module_feature_action_methods', function (Blueprint $table) {
            if (!Schema::hasColumn('module_feature_action_methods', 'slug')) {
                $table->string('slug')->unique()->after('action');
            }
        });
    }

    public function down(): void
    {
        Schema::table('application_menus', function (Blueprint $table) {
            if (Schema::hasColumn('application_menus', 'parent_id')) $table->dropForeign(['parent_id'])->dropColumn('parent_id');
            if (Schema::hasColumn('application_menus', 'url')) $table->dropColumn('url');
            if (Schema::hasColumn('application_menus', 'icon')) $table->dropColumn('icon');
            if (Schema::hasColumn('application_menus', 'feature_id')) $table->dropForeign(['feature_id'])->dropColumn('feature_id');
            if (Schema::hasColumn('application_menus', 'application_id')) $table->dropForeign(['application_id'])->dropColumn('application_id');
        });

        Schema::table('module_feature_action_methods', function (Blueprint $table) {
            if (Schema::hasColumn('module_feature_action_methods', 'slug')) $table->dropColumn('slug');
        });
    }
};
