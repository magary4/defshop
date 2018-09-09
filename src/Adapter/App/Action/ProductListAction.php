<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Action;

use DefShop\Adapter\Core\Template;
use DefShop\Application\Port\ProductRepositoryInterface;
use Zend\Diactoros\ServerRequest;

class ProductListAction
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var ServerRequest
     */
    private $request;

    /**
     * ProductListAction constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param ServerRequest $request
     */
    public function __construct(ProductRepositoryInterface $productRepository, ServerRequest $request)
    {
        $this->productRepository = $productRepository;
        $this->request = $request;
    }

    public function __invoke()
    {
        $filter = [];
        $limit = 12;

        $page = $this->request->getQueryParams()["page"] ?? 1;
        $color = $this->request->getQueryParams()["color"] ?? null;

        if ($color) {
            $filter["color"] = $color;
        }

        $result = $this->productRepository->search($filter, $limit * ($page-1), $limit);
        $colors = $this->productRepository->getColors();
        $colorsNormalized = [];

        foreach ($colors as $color) {
            $colorsNormalized[] = $color["color"];
        }

        return Template::instance()->render("list", [
            "products"   => $result->getItems(),
            "totalCount" => $result->getTotal(),
            "limit"      => $limit,
            "colors"     => $colorsNormalized,
            "query"      => $this->request->getQueryParams()
        ]);
    }
}
