<?php

namespace App\Containers\Category\UI\API\Controllers;

use App\Containers\Category\UI\API\Requests\CreateCategoryRequest;
use App\Containers\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Containers\Category\UI\API\Requests\GetAllCategoriesRequest;
use App\Containers\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Containers\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Containers\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Category\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCategory(CreateCategoryRequest $request)
    {
        $category = Apiato::call('Category@CreateCategoryAction', [$request]);

        return $this->created($this->transform($category, CategoryTransformer::class));
    }

    /**
     * @param FindCategoryByIdRequest $request
     * @return array
     */
    public function findCategoryById(FindCategoryByIdRequest $request)
    {
        $category = Apiato::call('Category@FindCategoryByIdAction', [$request]);

        return $this->transform($category, CategoryTransformer::class);
    }

    /**
     * @param GetAllCategoriesRequest $request
     * @return array
     */
    public function getAllCategories(GetAllCategoriesRequest $request)
    {
        $categories = Apiato::call('Category@GetCategoriesAsTreeAction', [$request]);

        //return $this->transform($categories, CategoryTransformer::class);
        return $categories;
    }

    /**
     * @param UpdateCategoryRequest $request
     * @return array
     */
    public function updateCategory(UpdateCategoryRequest $request)
    {
        $category = Apiato::call('Category@UpdateCategoryAction', [$request]);

        return $this->transform($category, CategoryTransformer::class);
    }

    /**
     * @param DeleteCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCategory(DeleteCategoryRequest $request)
    {
        Apiato::call('Category@DeleteCategoryAction', [$request]);

        return $this->noContent();
    }
}
