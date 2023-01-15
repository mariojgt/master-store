<?php

namespace Mariojgt\MasterStore\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Mariojgt\MasterStore\Models\Category;


class CategoryController extends Controller
{

     /**
     * @return [blade view]
     */
    public function index()
    {
        // Build the breadcrumb
        $breadcrumb = [
            [
                'label' => 'Category',
                'url'   => route('master-store.category.index'),
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
            ],
            [
                'label'     => 'Description',
                'key'       => 'description',
                'sortable'  => true,
                'canCreate' => true,
                'canEdit'   => true,
                'type'      => 'text',
            ],
            [
                'label'     => 'Slug',
                'key'       => 'slug',
                'sortable'  => true,
                'canCreate' => true,
                'canEdit'   => true,
                'type'      => 'slug',
                'unique'    => true,
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

        return Inertia::render('BackEnd/Vendor/MasterStore/Category/Index', [
            'title'      => 'Category | Index',
            'table_name' => 'Category',
            'breadcrumb' => $breadcrumb,
            // Required for the generic builder table api
            'endpoint'       => route('admin.api.generic.table'),
            'endpointDelete' => route('admin.api.generic.table.delete'),
            'endpointCreate' => route('admin.api.generic.table.create'),
            'endpointEdit'   => route('admin.api.generic.table.update'),
            // You table columns
            'columns'        => $columns,
            // The model where all those actions will take place
            'model'          => encrypt(Category::class),
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
