<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This method will be called when the `db:seed` Artisan command is executed.
     */
    public function run(): void
    {
        // We use updateOrCreate to avoid creating duplicate entries if the seeder is run multiple times.
        // It checks for a menu item with the given title and updates it, or creates it if it doesn't exist.

        // 1. Create the parent "Services" item first to get its ID.
        $services = MenuItem::updateOrCreate(
            ['title' => 'Services'],
            [
                'url' => '/#services', // The parent item can link to the services section on the homepage.
                'order' => 20,
                'parent_id' => null,
            ]
        );

        // 2. Create top-level menu items.
        MenuItem::updateOrCreate(['title' => 'Home'], ['url' => '/', 'order' => 0, 'parent_id' => null]);
        MenuItem::updateOrCreate(['title' => 'About'], ['url' => '/#about', 'order' => 10, 'parent_id' => null]);
        MenuItem::updateOrCreate(['title' => 'Portfolio'], ['url' => '/#portfolio', 'order' => 30, 'parent_id' => null]);
        MenuItem::updateOrCreate(['title' => 'Testimonials'], ['url' => '/#testimonials', 'order' => 40, 'parent_id' => null]);
        MenuItem::updateOrCreate(['title' => 'Contact'], ['url' => '/#contact', 'order' => 50, 'parent_id' => null]);

        // 3. Create children for the "Services" item using its ID.
        MenuItem::updateOrCreate(['title' => 'All Services'], ['url' => '/#services', 'order' => 0, 'parent_id' => $services->id]);
        MenuItem::updateOrCreate(['title' => 'Flooring'], ['url' => '/orange-county-flooring-handyman', 'order' => 1, 'parent_id' => $services->id]);
        MenuItem::updateOrCreate(['title' => 'Furniture'], ['url' => '/orange-county-furniture-handyman', 'order' => 2, 'parent_id' => $services->id]);
        MenuItem::updateOrCreate(['title' => 'Painting'], ['url' => '/orange-county-painting-handyman', 'order' => 3, 'parent_id' => $services->id]);
        MenuItem::updateOrCreate(['title' => 'Drywall'], ['url' => '/orange-county-drywall-handyman', 'order' => 4, 'parent_id' => $services->id]);
        MenuItem::updateOrCreate(['title' => 'Tile'], ['url' => '/orange-county-tile-handyman', 'order' => 5, 'parent_id' => $services->id]);
    }
}
