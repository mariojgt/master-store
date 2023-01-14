<?php

namespace Mariojgt\MasterStore\Database\Seeders;

use Illuminate\Database\Seeder;
use Mariojgt\SkeletonAdmin\Models\Navigation;

class NavigationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create the menu for the backend
        $menuOptions = [
            // Brand page
            [
                'parent_id'  => null,
                'menu_label' => 'brand',
                'route'      => 'master-store.brand.index',
                'icon'       => 'brand',
                'guard'      => 'skeleton_admin',
            ],
            [
                'parent_id'  => null,
                'menu_label' => 'category',
                'route'      => 'master-store.category.index',
                'icon'       => 'category',
                'guard'      => 'skeleton_admin',
            ],
            [
                'parent_id'  => null,
                'menu_label' => 'product',
                'route'      => 'master-store.product.index',
                'icon'       => 'product',
                'guard'      => 'skeleton_admin',
            ]
        ];

        // Loop the menuOptions and create it
        foreach ($menuOptions as $role) {
            // First or create the role
            Navigation::firstOrCreate([
                'parent_id'  => $role['parent_id'],
                'menu_label' => $role['menu_label'],
                'route'      => $role['route'],
                'icon'       => $role['icon'],
                'guard'      => $role['guard'],
            ]);
        }
    }
}
