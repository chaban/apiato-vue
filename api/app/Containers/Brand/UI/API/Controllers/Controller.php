<?php

namespace App\Containers\Brand\UI\API\Controllers;

use App\Containers\Brand\UI\API\Requests\CreateBrandRequest;
use App\Containers\Brand\UI\API\Requests\DeleteBrandRequest;
use App\Containers\Brand\UI\API\Requests\GetAllBrandsRequest;
use App\Containers\Brand\UI\API\Requests\FindBrandByIdRequest;
use App\Containers\Brand\UI\API\Requests\UpdateBrandRequest;
use App\Containers\Brand\UI\API\Transformers\BrandTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Brand\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBrandRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBrand(CreateBrandRequest $request)
    {
        $brand = Apiato::call('Brand@CreateBrandAction', [$request]);

        return $this->created($this->transform($brand, BrandTransformer::class));
    }

    /**
     * @param FindBrandByIdRequest $request
     * @return array
     */
    public function findBrandById(FindBrandByIdRequest $request)
    {
        $brand = Apiato::call('Brand@FindBrandByIdAction', [$request]);

        return $this->transform($brand, BrandTransformer::class);
    }

    /**
     * @param GetAllBrandsRequest $request
     * @return array
     */
    public function getAllBrands(GetAllBrandsRequest $request)
    {
        $brands = Apiato::call('Brand@GetAllBrandsAction', [$request]);

        return $this->transform($brands, BrandTransformer::class);
    }

    /**
     * @param UpdateBrandRequest $request
     * @return array
     */
    public function updateBrand(UpdateBrandRequest $request)
    {
        $brand = Apiato::call('Brand@UpdateBrandAction', [$request]);

        return $this->transform($brand, BrandTransformer::class);
    }

    /**
     * @param DeleteBrandRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBrand(DeleteBrandRequest $request)
    {
        Apiato::call('Brand@DeleteBrandAction', [$request]);

        return $this->noContent();
    }
}
