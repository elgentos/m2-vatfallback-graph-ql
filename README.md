# VatfallbackGraphQL

**VatfallbackGraphQL** adds a GraphQl endpoint to the [Dutchento Vatfallback module for Magento 2](https://github.com/Dutchento/m2-vatfallback).

In the Dutchento Vatfallback module it is possible to use the API endpoint to get company data by VAT number
`http://domain.com/rest/V1/vat/companylookup/NL133001477B01`

With this module this can be done by GraphQl:
```graphql
query {
  companyLookup(
    vatNumber: "NL133001477B01"
  ) {
    status, 
    country,
    company_name,
    company_address,
    message
  }
}
```

