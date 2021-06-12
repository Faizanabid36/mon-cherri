<?php

use Illuminate\Database\Seeder; 

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            // dashboard
            [
                'name'        => 'Can View Dashboard',
                'slug'        => 'view.dashboard',
                'description' => 'Can view dashboard',
                'model'       => 'Permission',
            ],

            // users permissions
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Users',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Users',
                'slug'        => 'view.deleted.users',
                'description' => 'Can view deleted users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Users',
                'slug'        => 'restore.deleted.users',
                'description' => 'Can restore deleted users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Users Forever',
                'slug'        => 'delete.forever.users',
                'description' => 'Can delete users Forever',
                'model'       => 'Permission',
            ],
            // products permissions
            [
                'name'        => 'Can View Products',
                'slug'        => 'view.products',
                'description' => 'Can view products',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Products',
                'slug'        => 'create.products',
                'description' => 'Can create new products',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Products',
                'slug'        => 'edit.products',
                'description' => 'Can edit products',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Products',
                'slug'        => 'delete.products',
                'description' => 'Can delete products',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Products',
                'slug'        => 'view.deleted.products',
                'description' => 'Can view deleted products',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Products',
                'slug'        => 'restore.deleted.products',
                'description' => 'Can restore deleted products',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Products Forever',
                'slug'        => 'delete.forever.products',
                'description' => 'Can delete products Forever',
                'model'       => 'Permission',
            ],

            // orders permissions
            [
                'name'        => 'Can View Orders',
                'slug'        => 'view.orders',
                'description' => 'Can view orders',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Orders',
                'slug'        => 'edit.orders',
                'description' => 'Can edit orders',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Orders',
                'slug'        => 'delete.orders',
                'description' => 'Can delete orders',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Send Invoice',
                'slug'        => 'send.ordersinvoice',
                'description' => 'Can send invoice to customers',
                'model'       => 'Permission',
            ],

            // customers permissions
            [
                'name'        => 'Can View Customers',
                'slug'        => 'view.customers',
                'description' => 'Can view customers',
                'model'       => 'Permission',
            ],

            // posts permissions
            [
                'name'        => 'Can View Posts',
                'slug'        => 'view.posts',
                'description' => 'Can view posts',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Posts',
                'slug'        => 'create.posts',
                'description' => 'Can create new posts',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Posts',
                'slug'        => 'edit.posts',
                'description' => 'Can edit posts',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Posts',
                'slug'        => 'delete.posts',
                'description' => 'Can delete posts',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Posts',
                'slug'        => 'view.deleted.posts',
                'description' => 'Can view deleted posts',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Posts',
                'slug'        => 'restore.deleted.posts',
                'description' => 'Can restore deleted posts',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Posts Forever',
                'slug'        => 'delete.forever.posts',
                'description' => 'Can delete posts Forever',
                'model'       => 'Permission',
            ],

            // reviews permissions
            [
                'name'        => 'Can View Reviews',
                'slug'        => 'view.reviews',
                'description' => 'Can view reviews',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Reviews',
                'slug'        => 'edit.reviews',
                'description' => 'Can edit reviews',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Reviews',
                'slug'        => 'delete.reviews',
                'description' => 'Can delete reviews',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Reviews',
                'slug'        => 'view.deleted.reviews',
                'description' => 'Can view deleted reviews',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Reviews',
                'slug'        => 'restore.deleted.reviews',
                'description' => 'Can restore deleted reviews',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Reviews Forever',
                'slug'        => 'delete.forever.reviews',
                'description' => 'Can delete reviews Forever',
                'model'       => 'Permission',
            ],
            // categories permissions
            [
                'name'        => 'Can View Categories',
                'slug'        => 'view.categories',
                'description' => 'Can view categories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Categories',
                'slug'        => 'create.categories',
                'description' => 'Can create new categories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Categories',
                'slug'        => 'edit.categories',
                'description' => 'Can edit categories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Categories',
                'slug'        => 'delete.categories',
                'description' => 'Can delete categories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Categories',
                'slug'        => 'view.deleted.categories',
                'description' => 'Can view deleted categories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Categories',
                'slug'        => 'restore.deleted.categories',
                'description' => 'Can restore deleted categories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Categories Forever',
                'slug'        => 'delete.forever.categories',
                'description' => 'Can delete categories Forever',
                'model'       => 'Permission',
            ],


            // subcategories permissions
            [
                'name'        => 'Can View Subcategories',
                'slug'        => 'view.subcategories',
                'description' => 'Can view subcategories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Subcategories',
                'slug'        => 'create.subcategories',
                'description' => 'Can create new subcategories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Subcategories',
                'slug'        => 'edit.subcategories',
                'description' => 'Can edit subcategories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Subcategories',
                'slug'        => 'delete.subcategories',
                'description' => 'Can delete subcategories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Subcategories',
                'slug'        => 'view.deleted.subcategories',
                'description' => 'Can view deleted subcategories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Subcategories',
                'slug'        => 'restore.deleted.subcategories',
                'description' => 'Can restore deleted subcategories',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Subcategories Forever',
                'slug'        => 'delete.forever.subcategories',
                'description' => 'Can delete subcategories Forever',
                'model'       => 'Permission',
            ],

            // brands permissions
            [
                'name'        => 'Can View Brands',
                'slug'        => 'view.brands',
                'description' => 'Can view brands',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Brands',
                'slug'        => 'create.brands',
                'description' => 'Can create new brands',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Brands',
                'slug'        => 'edit.brands',
                'description' => 'Can edit brands',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Brands',
                'slug'        => 'delete.brands',
                'description' => 'Can delete brands',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Brands',
                'slug'        => 'view.deleted.brands',
                'description' => 'Can view deleted brands',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Brands',
                'slug'        => 'restore.deleted.brands',
                'description' => 'Can restore deleted brands',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Brands Forever',
                'slug'        => 'delete.forever.brands',
                'description' => 'Can delete brands Forever',
                'model'       => 'Permission',
            ],

             // sizes permissions
            [
                'name'        => 'Can View Sizes',
                'slug'        => 'view.sizes',
                'description' => 'Can view sizes',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Sizes',
                'slug'        => 'create.sizes',
                'description' => 'Can create new sizes',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Sizes',
                'slug'        => 'edit.sizes',
                'description' => 'Can edit sizes',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Sizes',
                'slug'        => 'delete.sizes',
                'description' => 'Can delete sizes',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Sizes',
                'slug'        => 'view.deleted.sizes',
                'description' => 'Can view deleted sizes',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Sizes',
                'slug'        => 'restore.deleted.sizes',
                'description' => 'Can restore deleted sizes',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Sizes Forever',
                'slug'        => 'delete.forever.sizes',
                'description' => 'Can delete sizes Forever',
                'model'       => 'Permission',
            ],

              // colors permissions
            [
                'name'        => 'Can View Colors',
                'slug'        => 'view.colors',
                'description' => 'Can view colors',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Colors',
                'slug'        => 'create.colors',
                'description' => 'Can create new colors',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Colors',
                'slug'        => 'edit.colors',
                'description' => 'Can edit colors',
                'model'       => 'Permission',
            ],
             // variations permissions
             [
                'name'        => 'Can View Variations',
                'slug'        => 'view.variations',
                'description' => 'Can view variations',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Variations',
                'slug'        => 'create.variations',
                'description' => 'Can create new variations',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Variations',
                'slug'        => 'edit.variations',
                'description' => 'Can edit variations',
                'model'       => 'Permission',
            ],
              // currencies permissions
            [
                'name'        => 'Can View Currencies',
                'slug'        => 'view.currencies',
                'description' => 'Can view Currencies',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Currencies',
                'slug'        => 'create.currencies',
                'description' => 'Can create new Currencies',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Currencies',
                'slug'        => 'edit.currencies',
                'description' => 'Can edit Currencies',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Currencies',
                'slug'        => 'delete.currencies',
                'description' => 'Can delete Currencies',
                'model'       => 'Permission',
            ],
             // countries permissions
            [
                'name'        => 'Can View Countries',
                'slug'        => 'view.countries',
                'description' => 'Can view countries',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Countries',
                'slug'        => 'create.countries',
                'description' => 'Can create new countries',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Countries',
                'slug'        => 'edit.countries',
                'description' => 'Can edit countries',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Countries',
                'slug'        => 'delete.countries',
                'description' => 'Can delete countries',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Countries',
                'slug'        => 'view.deleted.countries',
                'description' => 'Can view deleted countries',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Countries',
                'slug'        => 'restore.deleted.countries',
                'description' => 'Can restore deleted countries',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Countries Forever',
                'slug'        => 'delete.forever.countries',
                'description' => 'Can delete countries Forever',
                'model'       => 'Permission',
            ],

             // states permissions
            [
                'name'        => 'Can View States',
                'slug'        => 'view.states',
                'description' => 'Can view cities',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create States',
                'slug'        => 'create.states',
                'description' => 'Can create new states',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit States',
                'slug'        => 'edit.states',
                'description' => 'Can edit states',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete States',
                'slug'        => 'delete.states',
                'description' => 'Can delete states',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted States',
                'slug'        => 'view.deleted.states',
                'description' => 'Can view deleted states',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted States',
                'slug'        => 'restore.deleted.states',
                'description' => 'Can restore deleted states',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete States Forever',
                'slug'        => 'delete.forever.states',
                'description' => 'Can delete states Forever',
                'model'       => 'Permission',
            ],

              // cities permissions
            [
                'name'        => 'Can View Cities',
                'slug'        => 'view.cities',
                'description' => 'Can view cities',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Cities',
                'slug'        => 'create.cities',
                'description' => 'Can create new cities',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Cities',
                'slug'        => 'edit.cities',
                'description' => 'Can edit cities',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Cities',
                'slug'        => 'delete.cities',
                'description' => 'Can delete cities',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Cities',
                'slug'        => 'view.deleted.cities',
                'description' => 'Can view deleted cities',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Cities',
                'slug'        => 'restore.deleted.cities',
                'description' => 'Can restore deleted cities',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Cities Forever',
                'slug'        => 'delete.forever.cities',
                'description' => 'Can delete cities Forever',
                'model'       => 'Permission',
            ],

              // comments permissions
            [
                'name'        => 'Can View Comments',
                'slug'        => 'view.comments',
                'description' => 'Can view comments',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Comments',
                'slug'        => 'edit.comments',
                'description' => 'Can edit comments',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Comments',
                'slug'        => 'delete.comments',
                'description' => 'Can delete comments',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Comments',
                'slug'        => 'view.deleted.comments',
                'description' => 'Can view deleted comments',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Comments',
                'slug'        => 'restore.deleted.comments',
                'description' => 'Can restore deleted comments',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Comments Forever',
                'slug'        => 'delete.forever.comments',
                'description' => 'Can delete comments Forever',
                'model'       => 'Permission',
            ],
            
              // messages permissions
            [
                'name'        => 'Can View Messages',
                'slug'        => 'view.messages',
                'description' => 'Can view messages',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Messages',
                'slug'        => 'delete.messages',
                'description' => 'Can view messages',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Deleted Messages',
                'slug'        => 'view.deleted.messages',
                'description' => 'Can view deleted Messages',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Restore Deleted Messages',
                'slug'        => 'restore.deleted.messages',
                'description' => 'Can restore deleted Messages',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Messages Forever',
                'slug'        => 'delete.forever.messages',
                'description' => 'Can delete Messages Forever',
                'model'       => 'Permission',
            ],

              // images permissions
            [
                'name'        => 'Can Delete Images',
                'slug'        => 'delete.images',
                'description' => 'Can delete images',
                'model'       => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
