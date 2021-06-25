<?php

declare(strict_types=1);

namespace Elgentos\VatfallbackGraphQl\Model\Resolver;

use Dutchento\Vatfallback\Service\ValidateVatInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class ValidateVat implements ResolverInterface
{

    protected ValidateVatInterface $validateVat;

    /**
     * ValidateVat constructor.
     * @param ValidateVatInterface $validateVat
     */
    public function __construct(ValidateVatInterface $validateVat)
    {
        $this->validateVat = $validateVat;
    }

    /**
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     *
     * @return bool
     * @throws GraphQlInputException
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ): bool {
        if (!isset($args['vat_number']) || !isset($args['country_id'])) {
            throw new GraphQlInputException(__('Check input params.'));
        }

        $validationResult = $this->validateVat->byNumberAndCountry(
            $args['vat_number'],
            $args['country_id']
        );

        return $validationResult['result'];
    }
}
