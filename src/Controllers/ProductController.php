<?php

namespace Mariojgt\MasterStore\Controllers;

use Inertia\Inertia;
use Mariojgt\MasterStore\Models\Brand;
use Mariojgt\MasterStore\Models\Category;
use Mariojgt\MasterStore\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
     /**
     * @return [blade view]
     */
    public function index()
    {
        // Build the breadcrumb
        $breadcrumb = [
            [
                'label' => 'Product',
                'url'   => route('master-store.product.index'),
            ]
        ];

        // Table columns
        $columns = [
            [
                'label'     => 'Id',    // Display name
                'key'       => 'id',    // Table column key
                'sortable'  => true,    // Can be use in the filter
                'canCreate' => false,   // Can be use in the create form
                'canEdit'   => false,   // Can be use in the edit form
            ],
            [
                'label'     => 'Name',   // Display name
                'key'       => 'name',   // Table column key
                'sortable'  => true,           // Can be use in the filter
                'canCreate' => true,          // Can be use in the create form
                'canEdit'   => true,           // Can be use in the edit form
                'type'      => 'text',         // Type text,email,password,date,timestamp
                'section'   => 'Product Info', // Section name
            ],
            [
                'label'     => 'Description',
                'key'       => 'description',
                'sortable'  => true,
                'canCreate' => true,
                'canEdit'   => true,
                'type'      => 'text',
                'section'   => 'Product Info', // Section name
            ],
            [
                'label'     => 'Slug',
                'key'       => 'slug',
                'sortable'  => true,
                'canCreate' => true,
                'canEdit'   => true,
                'type'      => 'slug',
                'unique'    => true,
                'section'   => 'Product Info', // Section name
            ],
            [
                'label'     => 'Price',
                'key'       => 'price',
                'sortable'  => false,
                'canCreate' => true,
                'canEdit'   => true,
                'nullable'  => true,
                'type'      => 'number',
                'section'   => 'Product Settings', // Section name
            ],
            [
                'label'     => 'Sale Price',
                'key'       => 'sale_price',
                'sortable'  => false,
                'canCreate' => true,
                'canEdit'   => true,
                'nullable'  => true,
                'type'      => 'number',
                'section'   => 'Product Settings', // Section name
            ],
            [
                'label'     => 'Stock',
                'key'       => 'stock',
                'sortable'  => false,
                'canCreate' => true,
                'canEdit'   => true,
                'nullable'  => true,
                'type'      => 'number',
                'section'   => 'Product Settings', // Section name
            ],
            [
                'label'     => 'Brand',
                'key'       => 'brand_id',
                'sortable'  => false,
                'canCreate' => true,
                'canEdit'   => true,
                'nullable'  => true,
                'type'      => 'model_search',
                'endpoint'  => route('admin.api.generic.table'),
                'columns' => [
                    [
                        'key'       => 'id',
                        'sortable'  => false
                    ],
                    [
                        'key'       => 'name',
                        'sortable'  => true,
                    ],
                ],
                'model'        => encrypt(Brand::class),
                'singleSearch' => true,
            ],
            [
                'label'     => 'Category',
                'key'       => 'category_id',
                'relation'  => 'category',
                'sortable'  => false,
                'canCreate' => true,
                'canEdit'   => true,
                'nullable'  => true,
                'type'      => 'pivot_model',
                'endpoint'  => route('admin.api.generic.table'),
                'columns'   => [
                    [
                        'key'       => 'id',
                        'sortable'  => false
                    ],
                    [
                        'key'       => 'name',
                        'sortable'  => true,
                    ],
                ],
                'model'        => encrypt(Category::class),
                'singleSearch' => false,
            ],
            [
                'label'     => 'Image',
                'key'       => 'image',
                'sortable'  => false,
                'canCreate' => true,
                'canEdit'   => true,
                'nullable'  => true,
                'type'      => 'media',
                'endpoint'  => route('admin.api.media.search'),
            ]
        ];

        return Inertia::render('BackEnd/Vendor/MasterStore/Product/Index', [
            'title'      => 'Product | Index',
            'table_name' => 'Product',
            'breadcrumb' => $breadcrumb,
            // Required for the generic builder table api
            'endpoint'       => route('admin.api.generic.table'),
            'endpointDelete' => route('admin.api.generic.table.delete'),
            'endpointCreate' => route('admin.api.generic.table.create'),
            'endpointEdit'   => route('admin.api.generic.table.update'),
            // You table columns
            'columns'        => $columns,
            // The model where all those actions will take place
            'model'          => encrypt(Product::class),
            // If you want to protect your crud form you can use this below not required
            // The permission name for the crud
            'permission'     => encrypt([
                'guard'         => 'skeleton_admin',
                // You can use permission or role up to you
                'type'          => 'permission',
                // The permission name or role
                'key' => [
                    'store'  => 'create-permission',
                    'update' => 'edit-permission',
                    'delete' => 'delete-permission',
                    'index'  => 'read-permission',
                ],
            ]),
        ]);
    }
}
