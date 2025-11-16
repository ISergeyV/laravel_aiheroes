<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Settings\SiteSettings;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This migration is a "data migration". It doesn't alter the schema but ensures
     * that the initial record for our SiteSettings exists in the database.
     * This prevents "MissingSettings" exceptions on a fresh installation
     * when the settings page is saved for the first time.
     */
    public function up(): void
    {
        // Instantiate the settings class. This will be populated with default values.
        $settings = new SiteSettings();

        // Force a save. This creates the initial record in the `settings` table
        // for the 'site' group with all properties defined in the class.
        $settings->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // On rollback, we can simply let the record be.
        // There's no schema change to revert.
    }
};
