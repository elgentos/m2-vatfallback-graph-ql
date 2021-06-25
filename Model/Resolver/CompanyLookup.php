<?php

declare(strict_types=1);

namespace Elgentos\VatfallbackGraphQl\Model\Resolver;

use Dutchento\Vatfallback\Api\CompanyLookupInterface;
use Dutchento\Vatfallback\Api\Data\CompanyLookupResultInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CompanyLookup implements ResolverInterface
{
    protected CompanyLookupInterface $companyLookup;

    public function __construct(CompanyLookupInterface $companyLookup)
    {
        $this->companyLookup = $companyLookup;
    }

    /**
     * @param Field            $field
     * @param ContextInterface $context
     * @param ResolveInfo      $info
     * @param array|null       $value
     * @param array|null       $args
     *
     * @return CompanyLookupResultInterface
     * @throws GraphQlInputException
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ): CompanyLookupResultInterface {
        if (!isset($args['vatNumber'])) {
            throw new GraphQlInputException(__('Check input params.'));
        }

        return $this->companyLookup->byVatnumber($args['vatNumber']);
    }
}
