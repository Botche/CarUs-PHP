<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use App\Models\Models_car;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings('car', 'cars');

        $this->crud->addFields($this->getFieldsData());
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns

        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFieldsData());
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CarRequest::class);

        // CRUD::setFromDb(); // fields

        $this->crud->set('show.setFromDb', false);
        $this->crud->addFields($this->getFieldsData());

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    // public function index(Request $request)
    // {
    //     $search_term = $request->input('q');
    //     $form = collect($request->input('form'))->pluck('value', 'name');

    //     $options = Models_car::query();

    //     // if no category has been selected, show no options
    //     if (!$form['manufacturer_id']) {
    //         return [];
    //     }

    //     // if a category has been selected, only show articles in that category
    //     if ($form['manufacturer_id']) {
    //         $options = $options->where('manufacturer_id', $form['manufacturer_id']);
    //     }

    //     return $options->paginate(10);
    // }

    private function getFieldsData()
    {
        return [
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text'
            ],
            [
                'name' => 'production_year',
                'label' => 'Production year',
                'type' => 'date',
            ],
            [
                'name' => 'travelled_kilometers',
                'label' => 'Travelled kilometers',
                'type' => 'number',
            ],
            [
                'label' => "Manufacturer",
                'name' => 'manufacturer_id',
                'type' => 'select',
                'entity' => 'manufacturer',
                'model' => "App\Models\Manufacturer", // related model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'attributes' => [
                    'class'       => 'form-control manufacturer',
                  ],
            ],
            [
                'label' => "Model car",
                'name' => 'models_car_id',
                'type' => 'select',
                'entity' => 'models_car',
                'model'     => "App\Models\Models_car", // related model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'attributes' => [
                    'class'       => 'form-control models',
                  ],
            ],
            [
                'label'        => "Car Image",
                'name'         => "image",
                'filename'     => NULL, // set to null if not needed
                'type'         => 'image',
                'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
                'crop'         => true, // set to true to allow cropping, false to disable
                'src'          => NULL, // null to read straight from DB, otherwise set to model accessor function
            ],
        ];
    }
}
